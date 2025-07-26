{{-- resources/views/orders/index.blade.php --}}
<x-app-layout>
  <div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold mb-4">Đơn hàng của bạn</h2>

    @if($orders->isEmpty())
      <p>Chưa có đơn hàng nào.</p>
    @else
      <table class="w-full bg-white shadow rounded mb-6">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-4 py-2">#</th>
            <th class="px-4 py-2">Tổng tiền</th>
            <th class="px-4 py-2">Trạng thái</th>
            <th class="px-4 py-2">Thanh toán</th>
            <th class="px-4 py-2">Ngày đặt</th>
            <th class="px-4 py-2">Hành động</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          @foreach($orders as $order)
            <tr>
              <td class="px-4 py-2">{{ $order->id }}</td>
              <td class="px-4 py-2">{{ number_format($order->total,0,',','.') }} đ</td>
              <td class="px-4 py-2">{{ $order->status }}</td>
              <td class="px-4 py-2">{{ $order->payment_status }}</td>
              <td class="px-4 py-2">{{ $order->created_at->format('d/m/Y H:i') }}</td>
              <td class="px-4 py-2">
                <a href="{{ route('orders.show', $order) }}"
                   class="text-blue-600 hover:underline">Xem chi tiết</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

      {{ $orders->links() }}
    @endif
  </div>
</x-app-layout>
