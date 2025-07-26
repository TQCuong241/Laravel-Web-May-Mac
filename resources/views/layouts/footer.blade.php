<footer class="bg-gray-900 text-white pt-12 pb-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Brand Info -->
            <div class="md:col-span-2">
                <div class="flex items-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gold-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span class="text-2xl font-bold">{{ config('app.name', 'Laravel') }}</span>
                </div>
                <p class="text-gray-400 mb-4">
                    Tinh hoa thời trang Việt - Vẻ đẹp được chắt lọc từ sự tinh tế và đam mê.
                </p>
                <div class="flex space-x-4">
                    <a href="https://www.facebook.com/cuong24102003/" class="text-gray-400 hover:text-white transition">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://www.youtube.com/@tqc241" class="text-gray-400 hover:text-white transition">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-semibold mb-4 text-gold-500">Liên kết nhanh</h3>
                <ul class="space-y-2">
                    <li><a href="/" class="text-gray-400 hover:text-white transition">Trang chủ</a></li>
                    <!-- <li><a href="/collections" class="text-gray-400 hover:text-white transition">Bộ sưu tập</a></li>
                    <li><a href="/ve-chung-toi" class="text-gray-400 hover:text-white transition">Về chúng tôi</a></li>
                    <li><a href="/blog" class="text-gray-400 hover:text-white transition">Tạp chí thời trang</a></li>
                    <li><a href="/lien-he" class="text-gray-400 hover:text-white transition">Liên hệ</a></li> -->
                </ul>
            </div>

            <!-- Customer Service -->
            <div>
                <h3 class="text-lg font-semibold mb-4 text-gold-500">Hỗ trợ khách hàng</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Chính sách đổi trả</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Hướng dẫn mua hàng</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Chính sách bảo mật</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Điều khoản dịch vụ</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Câu hỏi thường gặp</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h3 class="text-lg font-semibold mb-4 text-gold-500">Liên hệ</h3>
                <address class="not-italic text-gray-400 space-y-2">
                    <div class="flex items-start">
                        <i class="fas fa-map-marker-alt mt-1 mr-2 text-gold-500"></i>
                        <p>Bình Dương</p>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-phone-alt mr-2 text-gold-500"></i>
                        <a href="tel:+84812345678" class="hover:text-white transition">0964 098 593</a>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-envelope mr-2 text-gold-500"></i>
                        <a href="mailto:info@thuonghieu.com" class="hover:text-white transition">tqc241@gmail.com</a>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-clock mr-2 text-gold-500"></i>
                        <p>9:00 - 21:00 (T2 - CN)</p>
                    </div>
                </address>
            </div>
        </div>

        <div class="border-t border-gray-800 mt-8 pt-8 flex flex-col md:flex-row justify-between items-center">
            <p class="text-gray-500 text-sm mb-4 md:mb-0">
                &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. Mọi quyền được bảo lưu.
            </p>
        </div>
    </div>
</footer>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<!-- Custom styles -->
<style>
    .text-gold-500 { color: #d4af37; }
</style>