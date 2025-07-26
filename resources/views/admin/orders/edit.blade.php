<x-layouts.admin>
  <div class="px-6 py-6">
    <!-- Header section -->
    <div class="flex items-center mb-6">
      <a href="{{ route('admin.orders.index') }}" class="mr-4 text-gray-600 hover:text-gray-900">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
      </a>
      <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">Chỉnh sửa Đơn hàng #{{ $order->id }}</h1>
    </div>

    <!-- Error messages -->
    @if ($errors->any())
      <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded">
        <div class="flex">
          <div class="flex-shrink-0">
            <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
            </svg>
          </div>
          <div class="ml-3">
            <h3 class="text-sm font-medium text-red-800">Có {{ $errors->count() }} lỗi cần sửa</h3>
            <div class="mt-2 text-sm text-red-700">
              <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $err)
                  <li>{{ $err }}</li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    @endif

    <!-- Order edit form -->
    <div class="bg-white shadow-xl rounded-lg overflow-hidden">
      <form action="{{ route('admin.orders.update', $order) }}" method="POST" class="p-6 sm:p-8">
        @csrf @method('PUT')

        <!-- Order status -->
        <div class="mb-6">
          <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Trạng thái đơn hàng</label>
          <select id="status" name="status" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            @foreach($statuses as $key => $label)
              <option value="{{ $key }}" {{ $order->status === $key ? 'selected' : '' }} class="py-2">
                {{ $label }}
              </option>
            @endforeach
          </select>
        </div>

        <!-- Payment status -->
        <div class="mb-8">
          <label for="payment_status" class="block text-sm font-medium text-gray-700 mb-2">Trạng thái thanh toán</label>
          <select id="payment_status" name="payment_status" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            @foreach($paymentStatuses as $key => $label)
              <option value="{{ $key }}" {{ $order->payment_status === $key ? 'selected' : '' }} class="py-2">
                {{ $label }}
              </option>
            @endforeach
          </select>
        </div>

        <!-- Form actions -->
        <div class="flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-3">
          <a href="{{ route('admin.orders.index') }}" class="inline-flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            Hủy
          </a>
          <button type="submit" class="inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            Lưu thay đổi
          </button>
        </div>
      </form>
    </div>
  </div>
</x-layouts.admin>