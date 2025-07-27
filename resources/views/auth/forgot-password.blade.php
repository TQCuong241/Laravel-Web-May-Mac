<x-guest-layout>
    <div class="min-h-screen bg-gradient-to-br from-gray-900 to-indigo-900 flex items-center justify-center bg-gray-100 px-4">
        <div class="max-w-3xl w-full bg-white rounded-3xl shadow-xl flex flex-col md:flex-row overflow-hidden">
            <!-- Cột trái (ảnh & mô tả) -->
            <div class="hidden md:flex md:w-1/2 bg-indigo-600 text-white flex-col justify-between p-10">
                <div>
                    <h2 class="text-3xl font-bold">Quên mật khẩu?</h2>
                    <p class="mt-4 text-indigo-100">Nhập địa chỉ email để nhận liên kết đặt lại mật khẩu. Đừng lo, ai cũng có lúc quên!</p>
                </div>
                <img src="https://i.pinimg.com/1200x/ff/64/5f/ff645f3e2005e0224ab9d51699af6011.jpg" alt="Reset Password Illustration" class="rounded-lg mt-6 h-60 w-full object-cover">
            </div>

            <!-- Cột phải (form) -->
            <div class="w-full md:w-1/2 p-8 sm:p-10">
                <!-- Logo -->
                <div class="mb-6 text-center">
                    <x-authentication-card-logo />
                </div>

                <!-- Thông báo trạng thái -->
                @session('status')
                    <div class="mb-4 text-center text-sm font-medium text-green-600">
                        {{ $value }}
                    </div>
                @endsession

                <!-- Lỗi xác thực -->
                <x-validation-errors class="mb-4" />

                <!-- Tiêu đề -->
                <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Khôi phục mật khẩu</h2>

                <!-- Form -->
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Địa chỉ email</label>
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                    </div>

                    <!-- Submit -->
                    <button type="submit"
                        class="w-full py-2 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Gửi liên kết đặt lại mật khẩu
                    </button>
                </form>

                <!-- Quay lại -->
                <p class="mt-6 text-center text-sm text-gray-600">
                    Nhớ mật khẩu rồi?
                    <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">Đăng nhập</a>
                </p>

                <!-- Quay về trang chủ -->
                <div class="mt-4 text-center">
                <a href="{{ url('/') }}" class="absolute top-6 left-6 text-white hover:text-indigo-300 transition duration-200 flex items-center">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <span class="text-sm">Trang chủ</span>
                </a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
