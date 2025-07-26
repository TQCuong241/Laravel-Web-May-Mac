<x-layouts.admin>
    <div class="container mx-auto px-4 py-8">
        <!-- Welcome Header -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden p-6 mb-8">
            <div class="flex items-center">
                <div class="p-3 bg-blue-100 rounded-lg mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Chào mừng trở lại, Admin!</h1>
                    <p class="text-gray-600">Quản lý hệ thống của bạn một cách hiệu quả</p>
                </div>
            </div>
        </div>

            <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
      <!-- Users Card -->
      <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-500">
        <p class="text-sm font-medium text-gray-500">Tổng người dùng</p>
        <p class="text-2xl font-semibold text-gray-800">{{ $userCount }}</p>
      </div>

      <!-- Products Card -->
      <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-green-500">
        <p class="text-sm font-medium text-gray-500">Tổng sản phẩm</p>
        <p class="text-2xl font-semibold text-gray-800">{{ $productCount }}</p>
      </div>

      <!-- Orders Card -->
      <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-yellow-500">
        <p class="text-sm font-medium text-gray-500">Đơn hàng trong tháng</p>
        <p class="text-2xl font-semibold text-gray-800">{{ $ordersThisMonth }}</p>
      </div>

      <!-- Revenue Card -->
      <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-purple-500">
        <p class="text-sm font-medium text-gray-500">Doanh thu trong tháng</p>
        <p class="text-2xl font-semibold text-gray-800">
          {{ number_format($revenueThisMonth, 0, ',', '.') }} đ
        </p>
      </div>
    </div>

        <!-- Quick Links -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden p-6 mb-8">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Truy cập nhanh</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <a href="admin/products" class="p-4 border rounded-lg hover:bg-gray-50 transition-colors">
                    <div class="flex items-center">
                        <div class="p-2 bg-blue-100 rounded-lg mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </div>
                        <span class="font-medium">Thêm sản phẩm</span>
                    </div>
                </a>
                <a href="admin/orders" class="p-4 border rounded-lg hover:bg-gray-50 transition-colors">
                    <div class="flex items-center">
                        <div class="p-2 bg-green-100 rounded-lg mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <span class="font-medium">Đơn hàng mới</span>
                    </div>
                </a>
                <a href="admin/users" class="p-4 border rounded-lg hover:bg-gray-50 transition-colors">
                    <div class="flex items-center">
                        <div class="p-2 bg-yellow-100 rounded-lg mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <span class="font-medium">Quản lý người dùng</span>
                    </div>
                </a>
                <a href="#" class="p-4 border rounded-lg hover:bg-gray-50 transition-colors">
                    <div class="flex items-center">
                        <div class="p-2 bg-purple-100 rounded-lg mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <span class="font-medium">Cài đặt hệ thống</span>
                    </div>
                </a>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Hoạt động gần đây</h2>
            <div class="space-y-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0 pt-1">
                        <div class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </div>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-900">Sản phẩm mới được thêm</p>
                        <p class="text-sm text-gray-500">"Áo thun cổ tròn" đã được thêm vào kho lúc 10:30 AM</p>
                        <p class="text-xs text-gray-400 mt-1">2 giờ trước</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="flex-shrink-0 pt-1">
                        <div class="h-8 w-8 rounded-full bg-green-100 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-900">Đơn hàng đã hoàn thành</p>
                        <p class="text-sm text-gray-500">Đơn hàng #ORD-2023-0012 đã được giao thành công</p>
                        <p class="text-xs text-gray-400 mt-1">5 giờ trước</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="flex-shrink-0 pt-1">
                        <div class="h-8 w-8 rounded-full bg-yellow-100 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-900">Đơn hàng đang chờ</p>
                        <p class="text-sm text-gray-500">Đơn hàng #ORD-2023-0013 đang chờ xử lý</p>
                        <p class="text-xs text-gray-400 mt-1">1 ngày trước</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>