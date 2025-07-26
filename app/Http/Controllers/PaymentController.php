<?php

namespace App\Http\Controllers;

use App\Mail\OrderSuccessMail;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    /**
     * Tạo URL redirect tới VNPAY
     */
    public function redirect(Request $request)
    {
        $data           = $request->all();
        $code_cart      = rand(0, 9999);
        $vnp_Url        = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl  = "http://127.0.0.1:8000/payment/callback";
        $vnp_TmnCode    = "767ISQ5Y";
        $vnp_HashSecret = "PDJAUB1AJNEL121C0S244U67P8GRWNGE";

        $inputData = [
            "vnp_Version"    => "2.1.0",
            "vnp_TmnCode"    => $vnp_TmnCode,
            "vnp_Amount"     => $data['total'] * 100,
            "vnp_Command"    => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode"   => "VND",
            "vnp_IpAddr"     => $_SERVER['REMOTE_ADDR'],
            "vnp_Locale"     => "vn",
            "vnp_OrderInfo"  => "Thanh toán đơn hàng test",
            "vnp_OrderType"  => "billpayment",
            "vnp_ReturnUrl"  => $vnp_Returnurl,
            "vnp_TxnRef"     => $code_cart,
            "vnp_BankCode"   => "NCB"
        ];

        // Nếu cần thêm ngân hàng
        if (!empty($data['bank_code'])) {
            $inputData['vnp_BankCode'] = $data['bank_code'];
        }

        // Sắp xếp và tạo query + hash data
        ksort($inputData);
        $query    = "";
        $hashdata = "";
        $i = 0;
        foreach ($inputData as $key => $value) {
            $encodedKey   = urlencode($key);
            $encodedValue = urlencode($value);
            $hashdata    .= ($i++ ? '&' : '') . "{$encodedKey}={$encodedValue}";
            $query       .= "{$encodedKey}={$encodedValue}&";
        }

        // Tạo chữ ký
        $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
        $vnp_Url      .= '?' . $query . 'vnp_SecureHash=' . $vnpSecureHash;

        // Redirect ra ngoài
        return redirect()->away($vnp_Url);
    }

    /**
     * Xử lý callback từ VNPAY, tạo Order, trừ kho, gửi mail
     */
    public function callback(Request $request)
    {
        // 1. Xác thực chữ ký
        $vnpHashSecret = config('services.vnpay.hashsecret');
        $remoteHash    = $request->input('vnp_SecureHash');

        $inputData = $request->except(['vnp_SecureHash', 'vnp_SecureHashType']);
        ksort($inputData);

        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            $encKey  = urlencode($key);
            $encVal  = urlencode($value);
            $hashData .= ($i++ ? '&' : '') . "{$encKey}={$encVal}";
        }

        $localHash = hash_hmac('sha512', $hashData, $vnpHashSecret);
        Log::info('VNPAY Callback Debug', compact('hashData', 'localHash', 'remoteHash'));

        if ($localHash !== $remoteHash) {
            return redirect()->route('cart.index')
                             ->with('error', 'Xác thực chữ ký không hợp lệ.');
        }

        // 2. Kiểm tra kết quả thanh toán
        if ($request->input('vnp_ResponseCode') !== '00') {
            return redirect()->route('cart.index')
                             ->with('error', 'Thanh toán không thành công (Code: '.$request->input('vnp_ResponseCode').')');
        }

        // 3. Thanh toán thành công → tạo Order, OrderItems, trừ kho, gửi mail, xóa cart
        DB::transaction(function () use ($request) {
            $user = Auth::user();
            $cart = Cart::where('user_id', $user->id)->firstOrFail();

            // Tính tổng đơn
            $total = $cart->items->sum(fn($item) => $item->quantity * $item->product->price);

            // Tạo order
            $order = Order::create([
                'user_id'        => $user->id,
                'total'          => $total,
                'status'         => 'Chờ xác nhận',
                'payment_status' => 'Đã thanh toán',
                'payment_ref'    => $request->input('vnp_TxnRef'),
            ]);

            // Tạo order items và trừ kho
            foreach ($cart->items as $item) {
                $order->items()->create([
                    'product_id' => $item->product_id,
                    'quantity'   => $item->quantity,
                    'price'      => $item->product->price,
                ]);

                // Trừ đúng số lượng đã đặt
                $item->product->decrement('stock_quantity', $item->quantity);
            }

            // Gửi email xác nhận
            Mail::to($user->email)->send(new OrderSuccessMail($order));

            // Xóa giỏ hàng
            $cart->items()->delete();
        });

        // 4. Redirect với thông báo
        return redirect()->route('cart.index')
                         ->with('success', 'Thanh toán thành công và đơn hàng đã được lưu!');
    }
}
