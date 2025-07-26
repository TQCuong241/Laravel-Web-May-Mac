{{-- resources/views/orders/show.blade.php --}}
<x-app-layout>
  <div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold mb-4">Chi tiết Đơn hàng #{{ $order->id }}</h2>

    <div class="bg-white rounded-lg shadow p-6 mb-6">
      <div class="grid grid-cols-2 gap-4">
        <div>
          <p><strong>Tổng tiền:</strong> {{ number_format($order->total,0,',','.') }} đ</p>
          <p><strong>Trạng thái đơn:</strong> {{ $order->status }}</p>
        </div>
        <div>
          <p><strong>Thanh toán:</strong> {{ $order->payment_status }}</p>
          <p><strong>Ngày đặt:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
        </div>
      </div>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden mb-6">
      <table class="w-full">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-4 py-2 text-left">Sản phẩm</th>
            <th class="px-4 py-2 text-center">Giá</th>
            <th class="px-4 py-2 text-center">Số lượng</th>
            <th class="px-4 py-2 text-right">Thành tiền</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          @foreach($order->items as $item)
            <tr>
              <td class="px-4 py-2 flex items-center">
                @if($item->product->image)
                  <img src="{{ asset('storage/'.$item->product->image) }}"
                       class="h-12 w-12 object-cover rounded mr-4" alt="">
                @endif
                <div>
                  {{ $item->product->name }}
                  @if(optional($item->product->size)->name)
                    <div class="text-xs text-gray-500">
                      Size: {{ $item->product->size->name }}
                    </div>
                  @endif
                </div>
              </td>
              <td class="px-4 py-2 text-center">{{ number_format($item->price,0,',','.') }} đ</td>
              <td class="px-4 py-2 text-center">{{ $item->quantity }}</td>
              <td class="px-4 py-2 text-right">
                {{ number_format($item->price * $item->quantity,0,',','.') }} đ
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <a href="{{ route('orders.index') }}"
       class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 py-2 px-4 rounded">
      ← Quay về danh sách
    </a>
  </div>
</x-app-layout>
