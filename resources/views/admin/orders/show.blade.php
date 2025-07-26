<x-layouts.admin>
  <div class="px-6 py-6">
    <!-- Header section -->
    <div class="flex items-center mb-6">
      <a href="{{ route('admin.orders.index') }}" class="mr-4 text-gray-600 hover:text-gray-900">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
      </a>
      <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">Chi tiết Đơn hàng #{{ $order->id }}</h1>
    </div>

    <!-- Order summary card -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden mb-6">
      <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <!-- Customer info -->
          <div class="space-y-3">
            <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Thông tin khách hàng</h3>
            <div class="flex items-start">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-3 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
              </svg>
              <div>
                <p class="font-medium">{{ $order->user->name }}</p>
                <p class="text-gray-600">{{ $order->user->email }}</p>
              </div>
            </div>
            <div class="flex items-start">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-3 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
              <p class="text-gray-600">Ngày tạo: {{ $order->created_at->format('d/m/Y H:i') }}</p>
            </div>
          </div>

          <!-- Order status -->
          <div class="space-y-3">
            <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Trạng thái đơn hàng</h3>
            <div class="flex items-start">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-3 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
              </svg>
              <div>
                <span class="px-2 py-1 text-xs font-semibold rounded-full 
                  {{ $order->status === 'completed' ? 'bg-green-100 text-green-800' : '' }}
                  {{ $order->status === 'processing' ? 'bg-yellow-100 text-yellow-800' : '' }}
                  {{ $order->status === 'cancelled' ? 'bg-red-100 text-red-800' : '' }}
                  {{ $order->status === 'shipped' ? 'bg-blue-100 text-blue-800' : '' }}">
                  {{ ucfirst($order->status) }}
                </span>
              </div>
            </div>
            <div class="flex items-start">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-3 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <div>
                <span class="px-2 py-1 text-xs font-semibold rounded-full 
                  {{ $order->payment_status === 'paid' ? 'bg-green-100 text-green-800' : 'bg-orange-100 text-orange-800' }}">
                  {{ ucfirst($order->payment_status) }}
                </span>
                @if($order->payment_ref)
                  <p class="text-xs text-gray-500 mt-1">Mã: {{ $order->payment_ref }}</p>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Order items -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden mb-6">
      <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-medium text-gray-900">Sản phẩm đã đặt</h3>
      </div>
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sản phẩm</th>
              <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Giá</th>
              <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">SL</th>
              <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Thành tiền</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @foreach($order->items as $item)
            <tr class="hover:bg-gray-50">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  @if($item->product->image)
                    <img src="{{ asset('storage/'.$item->product->image) }}" class="h-12 w-12 object-cover rounded mr-4">
                  @else
                    <div class="h-12 w-12 bg-gray-200 rounded mr-4 flex items-center justify-center">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                      </svg>
                    </div>
                  @endif
                  <div>
                    <div class="font-medium text-gray-900">{{ $item->product->name }}</div>
                    @if(optional($item->product->size)->name)
                      <div class="text-sm text-gray-500">Size: {{ $item->product->size->name }}</div>
                    @endif
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-center text-gray-900">
                {{ number_format($item->price,0,',','.') }} đ
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-center text-gray-900">
                {{ $item->quantity }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-gray-900 font-medium">
                {{ number_format($item->price * $item->quantity,0,',','.') }} đ
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <!-- Order total -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden mb-6">
      <div class="px-6 py-4 flex justify-between items-center">
        <h3 class="text-lg font-medium text-gray-900">Tổng cộng</h3>
        <div class="text-2xl font-bold text-gray-900">
          {{ number_format($order->total,0,',','.') }} đ
        </div>
      </div>
    </div>

    <!-- Back button -->
    <div class="flex justify-end">
      <a href="{{ route('admin.orders.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
        </svg>
        Quay lại danh sách
      </a>
    </div>
  </div>
</x-layouts.admin>