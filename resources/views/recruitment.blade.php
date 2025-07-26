<x-app-layout>
    <div class="max-w-6xl mx-auto px-4 sm:px-6 py-6 sm:py-8">
        <!-- Tiêu đề -->
        <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-6">Tin tuyển dụng</h1>

        @if ($recruitments->isEmpty())
            <!-- Khi không có tin tuyển dụng -->
            <div class="bg-white rounded-lg p-6 shadow-sm text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <p class="mt-4 text-gray-600">Hiện chưa có tin tuyển dụng nào.</p>
            </div>
        @else
            <!-- Danh sách tin tuyển dụng -->
            <div class="space-y-4 sm:space-y-6">
                @foreach ($recruitments as $item)
                <div class="border border-gray-200 rounded-lg p-4 sm:p-6 shadow-sm bg-white">
                    <!-- Thông tin chính -->
                    <div class="mb-4">
                        <h2 class="text-lg sm:text-xl font-semibold text-blue-700 mb-1">{{ $item->title }}</h2>
                        <p class="text-gray-800 font-medium">{{ $item->position }}</p>
                    </div>

                    <!-- Chi tiết công việc -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 sm:gap-4 text-sm sm:text-base">
                        <div class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="text-gray-700">{{ $item->location }}</span>
                        </div>

                        <div class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-gray-700">{{ number_format($item->salary) }} VNĐ</span>
                        </div>

                        <div class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span class="text-gray-700">Hạn: {{ \Carbon\Carbon::parse($item->deadline)->format('d/m/Y') }}</span>
                        </div>
                    </div>

                    <!-- Mô tả ngắn -->
                    <div class="mt-4 text-gray-600 text-sm sm:text-base">
                        <p>{{ Str::limit($item->description, 150) }}</p>
                    </div>

                    <!-- Nút ứng tuyển -->
                    <div class="mt-6">
                        @auth
                            <a href="{{ route('application.create', $item->id) }}"
                               class="inline-block w-full sm:w-auto text-center bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded transition-colors">
                                Ứng tuyển
                            </a>
                        @else
                            <p class="text-sm text-gray-500">
                                <a href="{{ route('login') }}" class="text-blue-600 underline">Đăng nhập</a> để ứng tuyển
                            </p>
                        @endauth
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Phân trang - Sửa lại phần này -->
            @if($recruitments instanceof \Illuminate\Pagination\AbstractPaginator && $recruitments->hasPages())
                <div class="mt-8">
                    {{ $recruitments->links() }}
                </div>
            @endif
        @endif
    </div>
</x-app-layout>