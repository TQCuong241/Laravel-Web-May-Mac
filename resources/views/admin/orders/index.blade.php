<x-layouts.admin>
  <div class="px-6 py-4">
    <h1 class="text-2xl font-bold mb-4">Quản lý Đơn hàng</h1>

    @if(session('success'))
      <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <table class="w-full bg-white shadow rounded">
      <thead class="bg-gray-50">
        <tr>
          <th class="px-4 py-2">#</th>
          <th class="px-4 py-2">Khách hàng</th>
          <th class="px-4 py-2">Tổng tiền</th>
          <th class="px-4 py-2">Trạng thái</th>
          <th class="px-4 py-2">Thanh toán</th>
          <th class="px-4 py-2">Ngày tạo</th>
          <th class="px-4 py-2">Hành động</th>
        </tr>
      </thead>
      <tbody>
        @foreach($orders as $order)
        <tr class="border-t">
          <td class="px-4 py-2">{{ $order->id }}</td>
          <td class="px-4 py-2">{{ $order->user->name }}</td>
          <td class="px-4 py-2">{{ number_format($order->total,0,',','.') }} đ</td>
          <td class="px-4 py-2">{{ ucfirst($order->status) }}</td>
          <td class="px-4 py-2">{{ ucfirst($order->payment_status) }}</td>
          <td class="px-4 py-2">{{ $order->created_at->format('d/m/Y H:i') }}</td>
          <td class="px-4 py-2 space-x-2">
            <a href="{{ route('admin.orders.show', $order) }}" class="text-blue-600 hover:underline">Xem</a>
            <a href="{{ route('admin.orders.edit', $order) }}" class="text-yellow-600 hover:underline">Sửa</a>
            <form action="{{ route('admin.orders.destroy', $order) }}" method="POST" class="inline">
              @csrf @method('DELETE')
              <button onclick="return confirm('Xóa đơn #{{ $order->id }}?')" class="text-red-600 hover:underline">Xóa</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <div class="mt-4">
      {{ $orders->links() }}
    </div>
  </div>
</x-layouts.admin>
