{{-- resources/views/orders/show.blade.php --}}
<x-app-layout>
  <div class="container mx-auto px-4 py-8">
    <div class="flex items-center mb-6">
      <a href="{{ route('orders.index') }}" class="mr-4 text-gray-600 hover:text-gray-900">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
      </a>
      <h2 class="text-3xl font-bold text-gray-800">Chi tiết đơn hàng #{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</h2>
    </div>

    <!-- Order Summary Card -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
      <div class="p-6">
        <div class="flex flex-col md:flex-row md:justify-between md:items-center">
          <div class="mb-4 md:mb-0">
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Thông tin đơn hàng</h3>
            <div class="flex items-center space-x-4">
              <span class="px-3 py-1 text-sm font-semibold rounded-full 
                {{ $order->status === 'completed' ? 'bg-green-100 text-green-800' : '' }}
                {{ $order->status === 'processing' ? 'bg-yellow-100 text-yellow-800' : '' }}
                {{ $order->status === 'cancelled' ? 'bg-red-100 text-red-800' : '' }}
                {{ $order->status === 'shipped' ? 'bg-blue-100 text-blue-800' : '' }}">
                {{ ucfirst($order->status) }}
              </span>
              <span class="px-3 py-1 text-sm font-semibold rounded-full 
                {{ $order->payment_status === 'Đã thanh toán' ? 'bg-green-100 text-green-800' : 'bg-orange-100 text-orange-800' }}">
                {{ $order->payment_status === 'Đã thanh toán' ? 'Đã thanh toán' : 'Chưa thanh toán' }}
              </span>
            </div>
          </div>
          <div class="text-right">
            <p class="text-sm text-gray-500">Ngày đặt hàng</p>
            <p class="text-lg font-semibold text-gray-800">{{ $order->created_at->format('d/m/Y H:i') }}</p>
          </div>
        </div>

        <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
          <div class="bg-gray-50 p-4 rounded-lg">
            <h4 class="text-sm font-medium text-gray-500 mb-1">Tổng tiền</h4>
            <p class="text-xl font-bold text-gray-900">{{ number_format($order->total,0,',','.') }} đ</p>
          </div>
          <div class="bg-gray-50 p-4 rounded-lg">
            <h4 class="text-sm font-medium text-gray-500 mb-1">Phương thức thanh toán</h4>
            <p class="text-lg font-medium text-gray-800">{{ $order->payment_method ?? 'VNPAY' }}</p>
          </div>
          <div class="bg-gray-50 p-4 rounded-lg">
            <h4 class="text-sm font-medium text-gray-500 mb-1">Số sản phẩm</h4>
            <p class="text-lg font-medium text-gray-800">{{ $order->items->count() }} sản phẩm</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Order Items -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
      <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-semibold text-gray-700">Sản phẩm đã đặt</h3>
      </div>
      <div class="divide-y divide-gray-200">
        @foreach($order->items as $item)
        <div class="p-6 hover:bg-gray-50 transition-colors duration-150">
          <div class="flex flex-col md:flex-row md:items-center">
            <div class="flex-shrink-0 mb-4 md:mb-0 md:mr-6">
              @if($item->product->image)
                <img src="{{ asset('storage/'.$item->product->image) }}" 
                     class="h-20 w-20 object-cover rounded-lg" alt="{{ $item->product->name }}">
              @else
                <div class="h-20 w-20 bg-gray-200 rounded-lg flex items-center justify-center text-gray-500">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                  </svg>
                </div>
              @endif
            </div>
            <div class="flex-1">
              <div class="flex flex-col md:flex-row md:justify-between">
                <div class="mb-2 md:mb-0">
                  <h4 class="text-lg font-medium text-gray-800">{{ $item->product->name }}</h4>
                  @if(optional($item->product->size)->name)
                    <p class="text-sm text-gray-500 mt-1">Size: {{ $item->product->size->name }}</p>
                  @endif
                </div>
                <div class="text-lg font-semibold text-gray-900">{{ number_format($item->price,0,',','.') }} đ</div>
              </div>
              <div class="flex items-center justify-between mt-4">
                <div class="flex items-center border border-gray-200 rounded-lg px-3 py-1">
                  <span class="text-gray-700">Số lượng: {{ $item->quantity }}</span>
                </div>
                <div class="text-lg font-bold text-blue-600">
                  {{ number_format($item->price * $item->quantity,0,',','.') }} đ
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
        <div class="flex justify-end">
          <div class="text-right">
            <p class="text-sm text-gray-600">Tổng cộng</p>
            <p class="text-2xl font-bold text-gray-900">{{ number_format($order->total,0,',','.') }} đ</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Customer Actions -->
    <div class="flex flex-col sm:flex-row justify-between items-center bg-white rounded-xl shadow-md p-6">
      <div class="mb-4 sm:mb-0">
        <h4 class="text-lg font-medium text-gray-800 mb-2">Cần hỗ trợ?</h4>
        <p class="text-gray-600">Liên hệ chúng tôi nếu bạn có bất kỳ câu hỏi nào về đơn hàng của bạn.</p>
      </div>
      <div class="flex space-x-3">
        <a href="{{ route('orders.index') }}" 
           class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
          <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
          </svg>
          Xem tất cả đơn hàng
        </a>
        @if($order->status === 'processing')
        <button class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
          <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
          </svg>
          Hủy đơn hàng
        </button>
        @endif
      </div>
    </div>
  </div>
</x-app-layout>