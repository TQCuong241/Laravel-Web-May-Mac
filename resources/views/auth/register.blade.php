<x-guest-layout>
    <div class="min-h-screen bg-gradient-to-br from-gray-900 to-indigo-900 flex items-center justify-center px-4 py-12">
        <!-- Background particles -->
        <div class="fixed inset-0 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-gray-900/90 to-indigo-900/90"></div>
            <div class="particles"></div>
        </div>

        <div class="max-w-5xl w-full bg-white/5 backdrop-blur-lg rounded-3xl shadow-2xl border border-white/10 flex flex-col md:flex-row overflow-hidden relative z-10 transform transition-all duration-500 hover:shadow-indigo-500/20">
            <!-- Nút quay lại trang chủ mobile -->
            <a href="{{ url('/') }}" class="md:hidden absolute top-4 left-4 text-white hover:text-indigo-300 transition duration-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>

            <!-- Cột trái: Ảnh & giới thiệu -->
            <div class="hidden md:flex md:w-2/5 bg-gradient-to-br from-indigo-600 to-purple-600 text-white p-10 flex-col justify-between relative overflow-hidden">
                <!-- Hiệu ứng ánh sáng -->
                <div class="absolute inset-0 bg-gradient-to-br from-white/5 to-transparent"></div>
                
                <!-- Nút quay lại trang chủ desktop -->
                <a href="{{ url('/') }}" class="absolute top-6 left-6 text-white hover:text-indigo-300 transition duration-200 flex items-center">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <span class="text-sm">Trang chủ</span>
                </a>
                
                <div class="relative z-10 mt-8">
                    <div class="flex items-center mb-8 justify-center">
                        <!-- Logo của bạn ở cột trái -->
                        <div class="logo-container animate-float">
                            <img src="{{ asset('images/logo.png') }}" alt="Your Logo" class="w-12 h-12 object-contain">
                        </div>
                        <h2 class="ml-3 text-2xl font-bold tracking-tight">Cường<span class="text-indigo-200">Dũng</span></h2>
                    </div>
                    
                    <h3 class="text-3xl font-bold leading-tight text-center">Khám phá thế giới<br>nhân sự chuyên nghiệp</h3>
                    <p class="mt-4 text-indigo-100/80 text-center">Tham gia cùng hơn 10,000 doanh nghiệp đã sử dụng nền tảng của chúng tôi</p>
                </div>

                <div class="relative z-10">
                    <div class="flex space-x-4 items-center mb-6">
                        <div class="w-12 h-12 rounded-xl bg-white/10 backdrop-blur-sm flex items-center justify-center border border-white/20">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold">Quản lý hợp đồng</h4>
                            <p class="text-sm text-indigo-100/70">Tự động hóa quy trình nhân sự</p>
                        </div>
                    </div>
                    
                    <div class="flex space-x-4 items-center">
                        <div class="w-12 h-12 rounded-xl bg-white/10 backdrop-blur-sm flex items-center justify-center border border-white/20">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold">Chấm công thông minh</h4>
                            <p class="text-sm text-indigo-100/70">Tính lương chính xác đến từng phút</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cột phải: Form đăng ký -->
            <div class="w-full md:w-3/5 p-8 sm:p-10 bg-white rounded-r-3xl">
                <!-- Logo của bạn -->
                <div class="mb-8 text-center relative">
                    <!-- Nút quay lại mobile (alternative position) -->
                    <a href="{{ url('/') }}" class="md:hidden absolute left-0 top-1 text-gray-600 hover:text-indigo-600 transition duration-200 flex items-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                    </a>
                    
                    <div class="inline-flex items-center justify-center">
                        <div class="logo-container animate-float">
                            <img src="{{ asset('images/logo.png') }}" alt="Your Logo" class="w-12 h-12 object-contain">
                        </div>
                        <h2 class="ml-3 text-2xl font-bold text-gray-900">Cường<span class="text-indigo-600">Dũng</span></h2>
                    </div>
                    <p class="mt-2 text-gray-500">Tạo tài khoản để bắt đầu trải nghiệm</p>
                </div>

                <!-- Validation Errors -->
                <x-validation-errors class="mb-4" />

                <!-- Form -->
                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <!-- Họ tên -->
                    <div>
                        <div class="relative">
                            <input id="name" type="text" name="name" :value="old('name')" required autofocus
                                class="peer block w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 placeholder-transparent"
                                placeholder="Nguyễn Văn A" />
                            <span class="absolute left-4 -top-2.5 px-1 bg-white text-xs text-gray-500 transition-all duration-200 peer-placeholder-shown:top-3 peer-placeholder-shown:text-sm peer-placeholder-shown:text-gray-400 peer-focus:-top-2.5 peer-focus:text-xs peer-focus:text-gray-500">
                                Họ và tên
                            </span>
                        </div>
                    </div>

                    <!-- Email -->
                    <div>
                        <div class="relative">
                            <input id="email" type="email" name="email" :value="old('email')" required
                                class="peer block w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 placeholder-transparent"
                                placeholder="email@congty.com" />
                            <span class="absolute left-4 -top-2.5 px-1 bg-white text-xs text-gray-500 transition-all duration-200 peer-placeholder-shown:top-3 peer-placeholder-shown:text-sm peer-placeholder-shown:text-gray-400 peer-focus:-top-2.5 peer-focus:text-xs peer-focus:text-gray-500">
                                Email
                            </span>
                        </div>
                    </div>

                    <!-- Mật khẩu -->
                    <div>
                        <div class="relative">
                            <input id="password" type="password" name="password" required autocomplete="new-password"
                                class="peer block w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 placeholder-transparent"
                                placeholder="••••••••" />
                            <span class="absolute left-4 -top-2.5 px-1 bg-white text-xs text-gray-500 transition-all duration-200 peer-placeholder-shown:top-3 peer-placeholder-shown:text-sm peer-placeholder-shown:text-gray-400 peer-focus:-top-2.5 peer-focus:text-xs peer-focus:text-gray-500">
                                Mật khẩu
                            </span>
                            <button type="button" class="absolute right-3 top-3 text-gray-400 hover:text-gray-500" onclick="togglePassword('password')">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Xác nhận mật khẩu -->
                    <div>
                        <div class="relative">
                            <input id="password_confirmation" type="password" name="password_confirmation" required
                                class="peer block w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 placeholder-transparent"
                                placeholder="••••••••" />
                            <span class="absolute left-4 -top-2.5 px-1 bg-white text-xs text-gray-500 transition-all duration-200 peer-placeholder-shown:top-3 peer-placeholder-shown:text-sm peer-placeholder-shown:text-gray-400 peer-focus:-top-2.5 peer-focus:text-xs peer-focus:text-gray-500">
                                Xác nhận mật khẩu
                            </span>
                            <button type="button" class="absolute right-3 top-3 text-gray-400 hover:text-gray-500" onclick="togglePassword('password_confirmation')">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Điều khoản & chính sách -->
                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="terms" name="terms" type="checkbox" 
                                       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded transition duration-150" required>
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="terms" class="font-medium text-gray-700">Tôi đồng ý với
                                    <a target="_blank" href="{{ route('terms.show') }}" class="text-indigo-600 hover:text-indigo-800 transition duration-150">Điều khoản dịch vụ</a>
                                    và
                                    <a target="_blank" href="{{ route('policy.show') }}" class="text-indigo-600 hover:text-indigo-800 transition duration-150">Chính sách bảo mật</a>
                                </label>
                            </div>
                        </div>
                    @endif

                    <!-- Đăng ký -->
                    <div class="flex items-center justify-between pt-2">
                        <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-indigo-600 transition duration-150">
                            Đã có tài khoản? <span class="font-medium">Đăng nhập</span>
                        </a>

                        <button type="submit"
                                class="relative overflow-hidden group py-3 px-6 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-medium rounded-xl shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-300 transform hover:-translate-y-0.5">
                            <span class="relative z-10">Đăng ký ngay</span>
                            <span class="absolute inset-0 bg-gradient-to-r from-indigo-700 to-purple-700 opacity-0 group-hover:opacity-100 transition duration-300"></span>
                        </button>
                    </div>
                </form>

                <!-- Social Login -->
                <div class="mt-8">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white text-gray-500">
                                Hoặc đăng ký bằng
                            </span>
                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-2 gap-3">
                        <a href="#" class="w-full inline-flex justify-center items-center py-2 px-4 border border-gray-300 rounded-xl shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-200">
                            <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12.152 6.896c-.948 0-2.415-1.078-3.96-1.04-2.04.027-3.91 1.183-4.961 3.014-2.117 3.675-.546 9.103 1.519 12.09 1.013 1.454 2.208 3.09 3.792 3.039 1.52-.065 2.09-.987 3.935-.987 1.831 0 2.35.987 3.96.948 1.637-.026 2.676-1.48 3.676-2.948 1.156-1.688 1.636-3.325 1.662-3.415-.039-.013-3.182-1.221-3.22-4.857-.026-3.04 2.48-4.494 2.597-4.559-1.429-2.09-3.623-2.324-4.39-2.376-2-.156-3.675 1.09-4.61 1.09zM15.53 3.83c.843-1.012 1.4-2.427 1.245-3.83-1.207.052-2.662.805-3.532 1.818-.78.896-1.454 2.338-1.273 3.714 1.338.104 2.715-.688 3.559-1.701"/>
                            </svg>
                            Apple
                        </a>
                        <a href="#" class="w-full inline-flex justify-center items-center py-2 px-4 border border-gray-300 rounded-xl shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-200">
                            <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12.545 10.239v3.821h5.445c-.712 2.315-2.647 3.972-5.445 3.972-3.332 0-6.033-2.701-6.033-6.032s2.701-6.032 6.033-6.032c1.498 0 2.866.549 3.921 1.453l2.814-2.814C17.503 2.988 15.139 2 12.545 2 7.021 2 2.543 6.477 2.543 12s4.478 10 10.002 10c8.396 0 10.249-7.85 9.426-11.748l-9.426-.013z"/>
                            </svg>
                            Google
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        
        .logo-container {
            transition: all 0.3s ease;
        }
        
        .logo-container:hover {
            transform: rotate(15deg) scale(1.1);
        }
    </style>

    <script>
        function togglePassword(id) {
            const input = document.getElementById(id);
            if (input.type === 'password') {
                input.type = 'text';
            } else {
                input.type = 'password';
            }
        }
    </script>
</x-guest-layout>