<x-layouts.admin>
  <div class="px-6 py-4">
    <h1 class="text-2xl font-bold mb-6">Chi tiết Đơn hàng #{{ $order->id }}</h1>

    <div class="bg-white rounded-lg shadow p-6 mb-6">
      <div class="grid grid-cols-2 gap-4">
        <div>
          <p><strong>Khách hàng:</strong> {{ $order->user->name }} ({{ $order->user->email }})</p>
          <p><strong>Ngày tạo:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
        </div>
        <div>
          <p><strong>Trạng thái đơn:</strong> {{ ucfirst($order->status) }}</p>
          <p><strong>Thanh toán:</strong> {{ ucfirst($order->payment_status) }}</p>
          <p><strong>Mã giao dịch:</strong> {{ $order->payment_ref }}</p>
        </div>
      </div>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden mb-6">
      <table class="w-full">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sản phẩm</th>
            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Giá</th>
            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Số lượng</th>
            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Thành tiền</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          @foreach($order->items as $item)
          <tr>
            <td class="px-6 py-4 flex items-center">
              @if($item->product->image)
                <img src="{{ asset('storage/'.$item->product->image) }}" class="h-12 w-12 object-cover rounded mr-4">
              @endif
              <div>
                <div class="font-medium">{{ $item->product->name }}</div>
                @if(optional($item->product->size)->name)
                  <div class="text-xs text-gray-500">Size: {{ $item->product->size->name }}</div>
                @endif
              </div>
            </td>
            <td class="px-6 py-4 text-center">{{ number_format($item->price,0,',','.') }} đ</td>
            <td class="px-6 py-4 text-center">{{ $item->quantity }}</td>
            <td class="px-6 py-4 text-right">{{ number_format($item->price * $item->quantity,0,',','.') }} đ</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="bg-white rounded-lg shadow p-6 flex justify-end">
      <div class="text-lg font-bold">
        Tổng cộng: {{ number_format($order->total,0,',','.') }} đ
      </div>
    </div>

    <div class="mt-6">
      <a href="{{ route('admin.orders.index') }}"
         class="bg-gray-200 hover:bg-gray-300 text-gray-800 py-2 px-4 rounded">
        ← Quay lại danh sách
      </a>
    </div>
  </div>
</x-layouts.admin>
