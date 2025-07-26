{{-- resources/views/orders/index.blade.php --}}
<x-app-layout>
  <div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
      <h2 class="text-3xl font-bold text-gray-800">Lịch sử đơn hàng</h2>
      <div class="bg-blue-100 text-blue-800 px-4 py-2 rounded-full text-sm font-medium">
        Tổng đơn hàng: {{ $orders->count() }}
      </div>
    </div>

    @if($orders->isEmpty())
      <div class="bg-white rounded-lg shadow-sm p-8 text-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
        <h3 class="mt-4 text-lg font-medium text-gray-900">Chưa có đơn hàng nào</h3>
        <p class="mt-1 text-gray-500">Bạn chưa đặt mua sản phẩm nào từ cửa hàng của chúng tôi.</p>
        <div class="mt-6">
          <a href="{{ route('products.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            Mua sắm ngay
          </a>
        </div>
      </div>
    @else
      <div class="bg-white shadow-sm rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mã đơn hàng</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tổng tiền</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Trạng thái</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Thanh toán</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ngày đặt</th>
                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Hành động</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              @foreach($orders as $order)
                <tr class="hover:bg-gray-50 transition-colors duration-150">
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-semibold">{{ number_format($order->total,0,',','.') }} đ</td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                      {{ $order->status === 'completed' ? 'bg-green-100 text-green-800' : '' }}
                      {{ $order->status === 'processing' ? 'bg-yellow-100 text-yellow-800' : '' }}
                      {{ $order->status === 'cancelled' ? 'bg-red-100 text-red-800' : '' }}
                      {{ $order->status === 'shipped' ? 'bg-blue-100 text-blue-800' : '' }}">
                      {{ ucfirst($order->status) }}
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                      {{ $order->payment_status === 'Đã thanh toán' ? 'bg-green-100 text-green-800' : 'bg-orange-100 text-orange-800' }}">
                      {{ $order->payment_status === 'Đã thanh toán' ? 'Đã thanh toán' : 'Chưa thanh toán' }}
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ $order->created_at->format('d/m/Y') }}
                    <span class="text-gray-400">{{ $order->created_at->format('H:i') }}</span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a href="{{ route('orders.show', $order) }}" class="text-blue-600 hover:text-blue-900 mr-4">Chi tiết</a>
                    @if($order->status === 'processing')
                      <a href="#" class="text-red-600 hover:text-red-900">Hủy đơn</a>
                    @endif
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        
        <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
          {{ $orders->links() }}
        </div>
      </div>
    @endif
  </div>
</x-app-layout>