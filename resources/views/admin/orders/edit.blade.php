<x-layouts.admin>
  <div class="px-6 py-4">
    <h1 class="text-2xl font-bold mb-6">Chỉnh sửa Đơn hàng #{{ $order->id }}</h1>

    @if ($errors->any())
      <div class="mb-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded">
        <ul class="list-disc pl-5">
          @foreach ($errors->all() as $err)
            <li>{{ $err }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('admin.orders.update', $order) }}" method="POST" class="bg-white rounded-lg shadow p-6">
      @csrf @method('PUT')

      <div class="mb-4">
        <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Trạng thái đơn hàng</label>
        <select id="status" name="status"
                class="w-full border-gray-300 rounded focus:ring-indigo-500 focus:border-indigo-500">
          @foreach($statuses as $key => $label)
            <option value="{{ $key }}" {{ $order->status === $key ? 'selected' : '' }}>
              {{ $label }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="mb-6">
        <label for="payment_status" class="block text-sm font-medium text-gray-700 mb-1">Trạng thái thanh toán</label>
        <select id="payment_status" name="payment_status"
                class="w-full border-gray-300 rounded focus:ring-indigo-500 focus:border-indigo-500">
          @foreach($paymentStatuses as $key => $label)
            <option value="{{ $key }}" {{ $order->payment_status === $key ? 'selected' : '' }}>
              {{ $label }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="flex space-x-3">
        <button type="submit"
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded">
          Lưu thay đổi
        </button>
        <a href="{{ route('admin.orders.index') }}"
           class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded">
          Hủy & Quay lại
        </a>
      </div>
    </form>
  </div>
</x-layouts.admin>
