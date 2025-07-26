<x-layouts.admin>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold text-gray-800">Thêm tin tuyển dụng mới</h2>
            <a href="{{ route('admin.recruitments.index') }}" class="flex items-center text-blue-600 hover:text-blue-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Quay lại danh sách
            </a>
        </div>

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">Có {{ $errors->count() }} lỗi cần sửa:</h3>
                        <div class="mt-2 text-sm text-red-700">
                            <ul class="list-disc pl-5 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('admin.recruitments.store') }}" method="POST" class="bg-white shadow rounded-lg p-6">
            @csrf

            <div class="space-y-6">
                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Tiêu đề <span class="text-red-500">*</span></label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" 
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Mô tả công việc <span class="text-red-500">*</span></label>
                    <textarea id="description" name="description" rows="5"
                              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('description') }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Position -->
                    <div>
                        <label for="position" class="block text-sm font-medium text-gray-700">Vị trí <span class="text-red-500">*</span></label>
                        <input type="text" id="position" name="position" value="{{ old('position') }}"
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Location -->
                    <div>
                        <label for="location" class="block text-sm font-medium text-gray-700">Địa điểm làm việc <span class="text-red-500">*</span></label>
                        <input type="text" id="location" name="location" value="{{ old('location') }}"
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Salary -->
                    <div>
                        <label for="salary" class="block text-sm font-medium text-gray-700">Mức lương (VNĐ)</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="text" id="salary" name="salary_display" 
                                   value="{{ old('salary') ? number_format(old('salary'), 0, ',', '.') : '' }}"
                                   class="block w-full pr-12 border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                   oninput="formatSalary(this)">
                            <input type="hidden" id="salary_raw" name="salary" value="{{ old('salary') }}">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <span class="text-gray-500 text-sm">VNĐ</span>
                            </div>
                        </div>
                    </div>

                    <!-- Deadline -->
                    <div>
                        <label for="deadline" class="block text-sm font-medium text-gray-700">Hạn nộp hồ sơ</label>
                        <input type="date" id="deadline" name="deadline" value="{{ old('deadline') }}"
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex justify-end pt-6 border-t border-gray-200">
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        Lưu tin tuyển dụng
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function formatSalary(input) {
            // Lấy giá trị và loại bỏ tất cả ký tự không phải số
            let value = input.value.replace(/[^\d]/g, '');
            
            // Định dạng với dấu phân cách hàng nghìn
            if (value.length > 0) {
                value = parseInt(value, 10).toLocaleString('vi-VN');
            }
            
            // Gán giá trị đã định dạng trở lại input
            input.value = value;
            
            // Cập nhật giá trị raw (không có dấu phân cách) vào input ẩn
            document.getElementById('salary_raw').value = value.replace(/[^\d]/g, '');
        }

        // Xử lý khi form submit
        document.querySelector('form').addEventListener('submit', function(e) {
            const salaryInput = document.getElementById('salary');
            salaryInput.value = salaryInput.value.replace(/[^\d]/g, '');
        });
    </script>
</x-layouts.admin>