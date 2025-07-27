<x-guest-layout>
    <div class="min-h-screen bg-gradient-to-br from-gray-900 to-indigo-900 flex items-center justify-center px-4">
        <div class="max-w-md w-full bg-white rounded-3xl shadow-lg p-8 sm:p-10">
            <!-- Logo -->
            <div class="mb-6 text-center">
                <x-authentication-card-logo />
            </div>

            <!-- Tiêu đề -->
            <h2 class="text-2xl font-bold text-gray-800 text-center mb-2">Đặt lại mật khẩu</h2>
            <p class="text-sm text-gray-500 text-center mb-6">
                Nhập mật khẩu mới của bạn để hoàn tất việc đặt lại.
            </p>

            <!-- Validation Errors -->
            <x-validation-errors class="mb-4" />

            <!-- Form -->
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <!-- Token ẩn -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" type="email" name="email" :value="old('email', $request->email)" required autofocus
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                </div>

                <!-- Mật khẩu mới -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Mật khẩu mới</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                </div>

                <!-- Xác nhận mật khẩu -->
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Xác nhận mật khẩu</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                </div>

                <!-- Nút xác nhận -->
                <button type="submit"
                    class="w-full py-2 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Đặt lại mật khẩu
                </button>
            </form>

            <!-- Quay về trang chủ -->
            <div class="mt-6 text-center">
                <a href="{{ url('/') }}" class="absolute top-6 left-6 text-white hover:text-indigo-300 transition duration-200 flex items-center">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <span class="text-sm">Trang chủ</span>
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
