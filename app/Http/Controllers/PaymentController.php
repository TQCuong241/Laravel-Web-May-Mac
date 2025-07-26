<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB; 

use App\Models\Cart;
use App\Models\Order;

class PaymentController extends Controller
{
public function redirect(Request $request)
  {
    $data = $request->all();
    $code_cart = rand(00, 9999);
    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    $vnp_Returnurl = "http://127.0.0.1:8000/payment/callback";
    $vnp_TmnCode = "767ISQ5Y"; 
    $vnp_HashSecret = "PDJAUB1AJNEL121C0S244U67P8GRWNGE"; 

    $vnp_TxnRef = $code_cart;
    $vnp_OrderInfo = 'Thanh toán đơn hàng test';
    $vnp_OrderType = 'billpayment';
    $vnp_Amount = $data['total'] * 100;
    $vnp_Locale = 'vn';
    $vnp_BankCode = 'NCB';
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

    $inputData = array(
      "vnp_Version" => "2.1.0",
      "vnp_TmnCode" => $vnp_TmnCode,
      "vnp_Amount" => $vnp_Amount,
      "vnp_Command" => "pay",
      "vnp_CreateDate" => date('YmdHis'),
      "vnp_CurrCode" => "VND",
      "vnp_IpAddr" => $vnp_IpAddr,
      "vnp_Locale" => $vnp_Locale,
      "vnp_OrderInfo" => $vnp_OrderInfo,
      "vnp_OrderType" => $vnp_OrderType,
      "vnp_ReturnUrl" => $vnp_Returnurl,
      "vnp_TxnRef" => $vnp_TxnRef,

    );

    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
      $inputData['vnp_BankCode'] = $vnp_BankCode;
    }
    if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
      $inputData['vnp_Bill_State'] = $vnp_Bill_State;
    }

    //var_dump($inputData);
    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
      if ($i == 1) {
        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
      } else {
        $hashdata .= urlencode($key) . "=" . urlencode($value);
        $i = 1;
      }
      $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }

    $vnp_Url = $vnp_Url . "?" . $query;

    if (isset($vnp_HashSecret)) {
      $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
      $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }

    return redirect()->away($vnp_Url);

  }

   public function callback(Request $request)
    {
        // 1. Xác thực chữ ký
        $vnpHashSecret = config('services.vnpay.hashsecret');
        $remoteHash    = $request->input('vnp_SecureHash');

        // Lấy params, bỏ 2 trường hash
        $inputData = $request->except(['vnp_SecureHash', 'vnp_SecureHashType']);
        ksort($inputData);

        // Build raw data giống redirect: urlencode(key)=urlencode(value)&...
        $i = 0;
        $hashData = '';
        foreach ($inputData as $key => $value) {
            $encKey   = urlencode($key);
            $encVal   = urlencode($value);
            $hashData .= ($i++ ? '&' : '') . "{$encKey}={$encVal}";
        }

        // Tính HMAC SHA512
        $localHash = hash_hmac('sha512', $hashData, $vnpHashSecret);

        // Log để debug nếu cần
        Log::info('VNPAY Callback Debug', compact('hashData', 'localHash', 'remoteHash'));

        if ($localHash !== $remoteHash) {
            return redirect()->route('cart.index')
                             ->with('error', 'Xác thực chữ ký không hợp lệ.');
        }

        // 2. Kiểm tra mã phản hồi từ VNPAY
        if ($request->input('vnp_ResponseCode') !== '00') {
            return redirect()->route('cart.index')
                             ->with('error', 'Thanh toán không thành công (Code: '.$request->input('vnp_ResponseCode').')');
        }

        // 3. Thanh toán thành công → tạo Order và OrderItems
        DB::transaction(function () use ($request) {
            $user = Auth::user();

            // Lấy giỏ hàng hiện tại của user
            $cart = Cart::where('user_id', $user->id)->first();
            if (!$cart || $cart->items->isEmpty()) {
                // Không có giỏ hàng hoặc trống
                abort(404, 'Không tìm thấy giỏ hàng');
            }

            // Tính tổng giá trị đơn
            $total = $cart->items->sum(fn($item) => $item->quantity * $item->product->price);

            // Tạo đơn
            $order = Order::create([
                'user_id'        => $user->id,
                'total'          => $total,
                'status'         => 'Chờ xác nhận',
                'payment_status' => 'Đã thanh toán',
                'payment_ref'    => $request->input('vnp_TxnRef'),
            ]);

            // Tạo chi tiết đơn
            foreach ($cart->items as $item) {
                $order->items()->create([
                    'product_id' => $item->product_id,
                    'quantity'   => $item->quantity,
                    'price'      => $item->product->price,
                ]);
            }

            // Xóa giỏ hàng
            $cart->items()->delete();
        });

        // 4. Redirect với thông báo thành công
        return redirect()->route('cart.index')
                         ->with('success', 'Thanh toán thành công và đơn hàng đã được lưu!');
    }

}
