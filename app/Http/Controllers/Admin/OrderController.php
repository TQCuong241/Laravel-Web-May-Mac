<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Hiển thị danh sách đơn hàng
     */
    public function index()
    {
        $orders = Order::with('user')
                       ->orderBy('created_at', 'desc')
                       ->paginate(15);

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Xem chi tiết một đơn hàng
     */
    public function show($id)
    {
        $order = Order::with(['user', 'items.product.size'])
                      ->findOrFail($id);

        return view('admin.orders.show', compact('order'));
    }

    /**
     * Form chỉnh sửa trạng thái đơn hàng
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);

        // Các trạng thái đơn (key và label đều tiếng Việt)
        $statuses = [
            'Chờ xử lý'  => 'Chờ xử lý',
            'Đang xử lý' => 'Đang xử lý',
            'Đang giao'  => 'Đang giao',
            'Đã giao'    => 'Đã giao',
            'Đã hủy'     => 'Đã hủy',
        ];

        // Các trạng thái thanh toán
        $paymentStatuses = [
            'Chưa thanh toán'       => 'Chưa thanh toán',
            'Đã thanh toán'         => 'Đã thanh toán',
            'Thanh toán thất bại'   => 'Thanh toán thất bại',
        ];

        return view('admin.orders.edit', compact('order', 'statuses', 'paymentStatuses'));
    }

    /**
     * Cập nhật trạng thái đơn và thanh toán
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        // Validate đầu vào phải là một trong các giá trị tiếng Việt
        $request->validate([
            'status'         => 'required|in:Chờ xử lý,Đang xử lý,Đang giao,Đã giao,Đã hủy',
            'payment_status' => 'required|in:Chưa thanh toán,Đã thanh toán,Thanh toán thất bại',
        ]);

        $order->update([
            'status'         => $request->input('status'),
            'payment_status' => $request->input('payment_status'),
        ]);

        return redirect()->route('admin.orders.index')
                         ->with('success', 'Cập nhật đơn hàng thành công.');
    }

    /**
     * Xóa đơn hàng cùng các mục bên trong
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->items()->delete();
        $order->delete();

        return redirect()->route('admin.orders.index')
                         ->with('success', 'Xóa đơn hàng thành công.');
    }
}
