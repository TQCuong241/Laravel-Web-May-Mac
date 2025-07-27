<x-guest-layout>
    <div class="min-h-screen bg-gradient-to-br from-gray-900 to-indigo-900 flex items-center justify-center px-4">
        <div class="max-w-4xl w-full bg-white rounded-3xl shadow-xl flex overflow-hidden">
            <!-- Bên trái (ảnh minh hoạ / chào mừng) -->
            <div class="hidden md:block md:w-1/2 bg-indigo-600 text-white p-10 flex flex-col justify-between">
                <div>
                    <h2 class="text-3xl font-bold">Chào mừng trở lại</h2>
                    <p class="mt-4 text-indigo-100">Đăng nhập để quản lý tài khoản và khám phá cơ hội mới.</p>
                </div>
                <img src="https://i.pinimg.com/736x/f1/4f/cc/f14fccd71986ee0976420d5260402e10.jpg" alt="Minh họa đăng nhập" class="rounded-lg mt-6 h-80 w-full object-cover">
            </div>

            <!-- Bên phải (form đăng nhập) -->
            <div class="w-full md:w-1/2 p-8 sm:p-10">
                <div class="mb-6 text-center">
                    <x-authentication-card-logo />
                </div>

                <x-validation-errors class="mb-4" />

                @session('status')
                    <div class="mb-4 font-medium text-sm text-green-600 text-center">
                        {{ $value }}
                    </div>
                @endsession

                <h2 class="text-2xl font-bold mb-6 text-center">Đăng nhập tài khoản</h2>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Mật khẩu</label>
                        <input id="password" type="password" name="password" required
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                    </div>

                    <div class="flex items-center justify-between mb-6">
                        <label class="flex items-center">
                            <input type="checkbox" name="remember" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                            <span class="ml-2 text-sm text-gray-600">Ghi nhớ đăng nhập</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:underline">
                                Quên mật khẩu?
                            </a>
                        @endif
                    </div>

                    <button type="submit"
                        class="w-full py-2 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Đăng nhập
                    </button>
                </form>

                <p class="mt-6 text-center text-sm text-gray-600">
                    Chưa có tài khoản?
                    <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">Đăng ký ngay</a>
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
