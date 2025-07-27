<x-guest-layout>
    <div class="min-h-screen bg-gray-100 flex items-center justify-center px-4">
        <div class="max-w-md w-full bg-white rounded-3xl shadow-lg p-8 sm:p-10">
            <!-- Logo -->
            <div class="mb-6 text-center">
                <x-authentication-card-logo />
            </div>

            <!-- Tiêu đề -->
            <h2 class="text-2xl font-bold text-gray-800 text-center mb-2">Xác nhận mật khẩu</h2>
            <p class="text-sm text-gray-500 text-center mb-6">
                Đây là khu vực bảo mật. Vui lòng nhập lại mật khẩu để tiếp tục.
            </p>

            <!-- Validation Errors -->
            <x-validation-errors class="mb-4" />

            <!-- Form -->
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <!-- Mật khẩu -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Mật khẩu</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password" autofocus
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                </div>

                <!-- Nút xác nhận -->
                <button type="submit"
                    class="w-full py-2 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Xác nhận
                </button>
            </form>

            <!-- Quay về trang chủ -->
            <div class="mt-6 text-center">
                <a href="{{ url('/') }}" class="text-sm text-gray-500 hover:text-indigo-600 underline transition">
                    ← Quay về trang chủ
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
