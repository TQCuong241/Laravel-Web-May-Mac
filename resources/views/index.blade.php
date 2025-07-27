@vite(['resources/css/index.css', 'resources/js/index.js'])
<x-app-layout>
    <!-- Hero Banner -->
    <section class="hero-banner relative overflow-hidden">
        <div class="container mx-auto flex flex-col lg:flex-row items-center py-16 lg:py-24 px-4">
            <div class="hero-content lg:w-1/2 z-10">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-4 leading-tight">
                    Tinh hoa trong từng đường may
                </h1>
                <p class="text-lg md:text-xl text-gray-600 mb-8 max-w-lg">
                    Khám phá những bộ sưu tập thời trang độc đáo, tôn vinh vẻ đẹp của bạn với phong cách đẳng cấp.
                </p>
                <div class="hero-buttons flex flex-col sm:flex-row gap-4">
                    <a href="#" class="btn-primary px-8 py-3 bg-black text-white rounded-full hover:bg-gray-800 transition duration-300 text-center font-medium">
                        Xem bộ sưu tập
                    </a>
                    <a href="#" class="btn-secondary px-8 py-3 border-2 border-black text-black rounded-full hover:bg-gray-100 transition duration-300 text-center font-medium">
                        Liên hệ tư vấn
                    </a>
                </div>
            </div>
            <div class="hero-image lg:w-1/2 mt-12 lg:mt-0 relative">
                <div class="absolute inset-0 bg-gradient-to-r from-white via-transparent to-transparent z-0 lg:hidden"></div>
                <img src="https://i.pinimg.com/736x/bd/55/24/bd5524f254c1a4785d0414810b5dcd0f.jpg" 
                     alt="Người mẫu trình diễn thời trang"
                     class="w-full h-auto rounded-lg shadow-2xl relative z-10 object-cover">
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="section-header text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Tại sao chọn chúng tôi?
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Những giá trị cốt lõi tạo nên thương hiệu thời trang đẳng cấp
                </p>
            </div>
            
            <div class="features-grid grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="feature-card bg-white p-8 rounded-xl shadow-md hover:shadow-lg transition duration-300">
                    <div class="feature-icon mb-6 text-4xl text-gold-500">
                        <i class="fas fa-medal"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Chất liệu cao cấp</h3>
                    <p class="text-gray-600">
                        Chúng tôi sử dụng 100% chất liệu tự nhiên cao cấp, được nhập khẩu từ các thương hiệu vải hàng đầu thế giới.
                    </p>
                </div>
                
                <div class="feature-card bg-white p-8 rounded-xl shadow-md hover:shadow-lg transition duration-300">
                    <div class="feature-icon mb-6 text-4xl text-gold-500">
                        <i class="fas fa-cut"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Thiết kế độc bản</h3>
                    <p class="text-gray-600">
                        Mỗi thiết kế là một tác phẩm nghệ thuật, được sáng tạo bởi đội ngũ designer từng tốt nghiệp các học viện thời trang danh tiếng.
                    </p>
                </div>
                
                <div class="feature-card bg-white p-8 rounded-xl shadow-md hover:shadow-lg transition duration-300">
                    <div class="feature-icon mb-6 text-4xl text-gold-500">
                        <i class="fas fa-tshirt"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Tinh xảo từng chi tiết</h3>
                    <p class="text-gray-600">
                        Mỗi sản phẩm đều trải qua 72 công đoạn kiểm tra chất lượng để đảm bảo sự hoàn hảo trong từng đường kim mũi chỉ.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Brand Story Section -->
    <section id="profile" class="profile-section py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="section-header text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Hành trình tạo nên giá trị
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Từ những bước đi đầu tiên đến vị thế tiên phong trong ngành thời trang cao cấp
                </p>
            </div>
            
            <div class="profile-content flex flex-col lg:flex-row items-center gap-12">
                <div class="lg:w-1/2">
                    <div class="profile-image relative rounded-xl overflow-hidden shadow-2xl">
                        <img src="https://www.advisewise.com.vn/wp-content/uploads/2020/07/xuong-may-co-dac-diem-gi-khac-voi-nha-may-1-1024x680-min.jpg" 
                             alt="Xưởng may thủ công"
                             class="w-full h-auto object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent flex items-end p-8">
                            <p class="text-white text-lg italic">
                                "Sự tỉ mỉ trong từng chi tiết là triết lý xuyên suốt của chúng tôi"
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="lg:w-1/2">
                    <div class="profile-stats grid grid-cols-2 gap-8">
                        <div class="stat-item text-center p-6 bg-gray-50 rounded-lg">
                            <h3 class="text-4xl font-bold text-gold-600 mb-2">10+</h3>
                            <p class="text-gray-600 font-medium">Năm kinh nghiệm</p>
                        </div>
                        <div class="stat-item text-center p-6 bg-gray-50 rounded-lg">
                            <h3 class="text-4xl font-bold text-gold-600 mb-2">2000+</h3>
                            <p class="text-gray-600 font-medium">Mẫu thiết kế</p>
                        </div>
                        <div class="stat-item text-center p-6 bg-gray-50 rounded-lg">
                            <h3 class="text-4xl font-bold text-gold-600 mb-2">500+</h3>
                            <p class="text-gray-600 font-medium">Khách hàng VIP</p>
                        </div>
                        <div class="stat-item text-center p-6 bg-gray-50 rounded-lg">
                            <h3 class="text-4xl font-bold text-gold-600 mb-2">50+</h3>
                            <p class="text-gray-600 font-medium">Showroom cao cấp</p>
                        </div>
                    </div>
                    
                    <div class="mt-8">
                        <p class="text-gray-700 mb-6">
                            Từ một xưởng may nhỏ năm 2010, chúng tôi đã không ngừng phát triển để trở thành thương hiệu thời trang cao cấp hàng đầu Việt Nam, được giới mộ điệu đánh giá cao cả về chất lượng và phong cách.
                        </p>
                        <a href="#" class="inline-flex items-center text-gold-600 hover:text-gold-800 font-medium">
                            Khám phá câu chuyện của chúng tôi
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Collections Preview -->
    <section id="collections" class="collections-section py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="section-header text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Bộ sưu tập mùa mới
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Khám phá những xu hướng thời trang nổi bật nhất năm 2023
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Collection Item 1 -->
                <div class="collection-card group relative overflow-hidden rounded-xl shadow-md hover:shadow-xl transition duration-300">
                    <img src="https://images.unsplash.com/photo-1539109136881-3be0616acf4b" 
                         alt="Bộ sưu tập Thu Đông 2023"
                         class="w-full h-96 object-cover transition duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex flex-col justify-end p-6">
                        <h3 class="text-2xl font-bold text-white mb-2">Thu Đông 2023</h3>
                        <p class="text-gray-200 mb-4">Tông màu trầm ấm với chất liệu len cao cấp</p>
                        <a href="#" class="text-white font-medium inline-flex items-center">
                            Xem bộ sưu tập
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
                
                <!-- Collection Item 2 -->
                <div class="collection-card group relative overflow-hidden rounded-xl shadow-md hover:shadow-xl transition duration-300">
                    <img src="https://images.unsplash.com/photo-1489987707025-afc232f7ea0f" 
                         alt="Bộ sưu tập Công sở"
                         class="w-full h-96 object-cover transition duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex flex-col justify-end p-6">
                        <h3 class="text-2xl font-bold text-white mb-2">Phong cách công sở</h3>
                        <p class="text-gray-200 mb-4">Thanh lịch - Chuyên nghiệp - Đẳng cấp</p>
                        <a href="#" class="text-white font-medium inline-flex items-center">
                            Xem bộ sưu tập
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
                
                <!-- Collection Item 3 -->
                <div class="collection-card group relative overflow-hidden rounded-xl shadow-md hover:shadow-xl transition duration-300">
                    <img src="https://images.unsplash.com/photo-1551232864-3f0890e580d9" 
                         alt="Bộ sưu tập Dạ hội"
                         class="w-full h-96 object-cover transition duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex flex-col justify-end p-6">
                        <h3 class="text-2xl font-bold text-white mb-2">Dạ hội sang trọng</h3>
                        <p class="text-gray-200 mb-4">Lấp lánh và quyến rũ cho những sự kiện đặc biệt</p>
                        <a href="#" class="text-white font-medium inline-flex items-center">
                            Xem bộ sưu tập
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-12">
                <a href="#" class="inline-flex items-center px-8 py-3 border border-black text-black rounded-full hover:bg-gray-100 transition duration-300 font-medium">
                    Xem tất cả bộ sưu tập
                </a>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="section-header text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Cảm nhận của khách hàng
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Những chia sẻ chân thực từ những người đã trải nghiệm
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="testimonial-card bg-gray-50 p-8 rounded-xl">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 rounded-full overflow-hidden mr-4">
                            <img src="https://scontent.fsgn5-3.fna.fbcdn.net/v/t39.30808-1/340575378_186504854178247_8631538388290746060_n.jpg?stp=dst-jpg_s200x200_tt6&_nc_cat=104&ccb=1-7&_nc_sid=e99d92&_nc_eui2=AeGaeI2uXmnYVsTQh2_0O_CaTz9MXb1DutxPP0xdvUO63O7IQX57EenOq2UI9QtbC3s33zNc_vJnXlYtUU2kvOLN&_nc_ohc=glNiqxVb-IIQ7kNvwHQVre_&_nc_oc=AdnP5X5qeaq2XrPf1l4sr0z8NR1Y9KKnEwYksrMuIpW1owv7vc7tvyxqf-Guj7bwvqw&_nc_zt=24&_nc_ht=scontent.fsgn5-3.fna&_nc_gid=m5_RPFCt3-aljauOLCOaag&oh=00_AfQ_5KYRnPUe_ih2V2TPmN-qd8tyFHmxm1zFa0fGpgtQig&oe=688B471D" alt="Khách hàng Quang Cường" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">Anh Quang Cường</h4>
                            <p class="text-gray-600 text-sm">CEO công nghệ</p>
                        </div>
                    </div>
                    <p class="text-gray-700 italic">
                        "Tôi luôn tin tưởng lựa chọn các sản phẩm của thương hiệu này cho những sự kiện quan trọng. Chất vải tuyệt vời và đường may hoàn hảo!"
                    </p>
                    <div class="mt-4 text-gold-500">
                        ★★★★★
                    </div>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="testimonial-card bg-gray-50 p-8 rounded-xl">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 rounded-full overflow-hidden mr-4">
                            <img src="https://scontent.fsgn5-14.fna.fbcdn.net/v/t39.30808-1/494693221_597499500015032_2344179284504995666_n.jpg?stp=c0.0.1011.1011a_dst-jpg_s200x200_tt6&_nc_cat=106&ccb=1-7&_nc_sid=e99d92&_nc_eui2=AeFybY8CU2L4T0w37iLVDnpO3xXqh2gRKUrfFeqHaBEpSjTmgICObWFim8hpAiWnVA0_Nx5ArD-LQ28nn6jHVl0q&_nc_ohc=atoSMAupuLAQ7kNvwGwna8G&_nc_oc=Adm5scfTQ2_sVPZMAcfy9KOzFWP95nVltkrkrCvarWe6mbCfwMfojuueujD73IZB0Xs&_nc_zt=24&_nc_ht=scontent.fsgn5-14.fna&_nc_gid=UJpuAr7PJHqjF1FDMPYgWw&oh=00_AfQSxkI7cNZn_xTDmLohCi--w1bX1NIiPtdmHQYydK_C5w&oe=688B3C15" alt="Khách hàng Quang Dũng" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">Anh Quang Dũng</h4>
                            <p class="text-gray-600 text-sm">Giám đốc điều hành</p>
                        </div>
                    </div>
                    <p class="text-gray-700 italic">
                        "Những bộ vest may đo ở đây giúp tôi tự tin hơn trong các cuộc đàm phán quan trọng. Sự vừa vặn hoàn hảo không nơi nào có được."
                    </p>
                    <div class="mt-4 text-gold-500">
                        ★★★★★
                    </div>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="testimonial-card bg-gray-50 p-8 rounded-xl">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 rounded-full overflow-hidden mr-4">
                            <img src="https://scontent.fsgn5-12.fna.fbcdn.net/v/t39.30808-6/511014422_1748564132534215_6238498109754566035_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeFleu0qrYhfWCPUm5DhX3r4-1FukCLS71b7UW6QItLvVnmvzqL_roRnaKy4kkGJazqFq_mNqHrgs-ZMgnXAp24a&_nc_ohc=q2jT-6hwOXIQ7kNvwETRTiO&_nc_oc=AdmtjaT8us71cLxI8QfqLbx2Pv_kUO7DEpZWecuKo3h9zKWppShZppKLPKOWYW5eFTk&_nc_zt=23&_nc_ht=scontent.fsgn5-12.fna&_nc_gid=PgATd-coXvJhOFMqkZOD7A&oh=00_AfSD_Gu4js1r9dzEJzNK6CS9gpFH5amTmzBxHoC6dYcfCg&oe=688B52A8" alt="Khách hàng Thùy Dương" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">Chị Thùy Dương</h4>
                            <p class="text-gray-600 text-sm">Nhà thiết kế nội thất</p>
                        </div>
                    </div>
                    <p class="text-gray-700 italic">
                        "Là người làm trong lĩnh vực sáng tạo, tôi đánh giá cao sự độc đáo trong từng thiết kế. Mỗi sản phẩm đều là một tác phẩm nghệ thuật!"
                    </p>
                    <div class="mt-4 text-gold-500">
                        ★★★★★
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<!-- Tailwind CSS for styling -->
<style>
    .text-gold-500 { color: #d4af37; }
    .text-gold-600 { color: #c9a227; }
    .text-gold-800 { color: #a78a2a; }
    .bg-gold-500 { background-color: #d4af37; }
    .border-gold-500 { border-color: #d4af37; }
    
    .hero-banner {
        background: linear-gradient(to right, #ffffff 0%, rgba(255,255,255,0.8) 50%, rgba(255,255,255,0) 100%);
    }
    
    @media (min-width: 1024px) {
        .hero-banner {
            min-height: 80vh;
        }
    }
    
    .collection-card {
        transition: all 0.3s ease;
    }
    
    .collection-card:hover {
        transform: translateY(-5px);
    }
</style>