<x-app-layout>
    <div class="max-w-3xl mx-auto px-4 py-6 sm:py-8">
        <!-- Header section -->
        <div class="mb-8">
            <a href="{{ url()->previous() }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Quay lại
            </a>
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">Ứng tuyển: {{ $recruitment->title }}</h1>
            <p class="text-gray-600 mt-2">Vị trí: {{ $recruitment->position }}</p>
        </div>

        <!-- Error messages -->
        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">Có {{ $errors->count() }} lỗi cần sửa trước khi gửi</h3>
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

        <!-- Application form -->
        <form action="{{ route('application.store', $recruitment->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white shadow-sm rounded-lg p-6 sm:p-8">
            @csrf

            <!-- Personal information section -->
            <div>
                <h2 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">Thông tin cá nhân</h2>
                
                <div class="grid grid-cols-1 gap-y-4 gap-x-6 sm:grid-cols-2">
                    <!-- Name field -->
                    <div class="sm:col-span-2">
                        <label for="name" class="block text-sm font-medium text-gray-700">Họ và tên <span class="text-red-500">*</span></label>
                        <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}" required
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Email field -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email <span class="text-red-500">*</span></label>
                        <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}" required
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Phone field -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Số điện thoại <span class="text-red-500">*</span></label>
                        <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" required
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Address field -->
                    <div class="sm:col-span-2">
                        <label for="address" class="block text-sm font-medium text-gray-700">Địa chỉ</label>
                        <input type="text" name="address" id="address" value="{{ old('address') }}"
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>
            </div>

            <!-- Additional information section -->
            <div>
                <h2 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">Thông tin bổ sung</h2>
                
                <!-- Message field -->
                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700">Ghi chú (tuỳ chọn)</label>
                    <textarea id="message" name="message" rows="4" 
                              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('message') }}</textarea>
                </div>

                <!-- CV Upload field -->
                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700">Tải lên CV <span class="text-red-500">*</span></label>
                    <div class="mt-1 flex items-center">
                        <label for="cv_file" class="cursor-pointer">
                            <span class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                Chọn file
                            </span>
                            <input id="cv_file" name="cv_file" type="file" accept=".pdf,.doc,.docx" class="sr-only" required>
                        </label>
                        <span id="file-name" class="ml-4 text-sm text-gray-600">Chưa có file nào được chọn</span>
                    </div>
                    <p class="mt-1 text-xs text-gray-500">Định dạng: PDF, DOC, DOCX (tối đa 2MB)</p>
                </div>
            </div>

            <!-- Submit button -->
            <div class="pt-2">
                <button type="submit" class="w-full sm:w-auto inline-flex justify-center py-3 px-6 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Gửi đơn ứng tuyển
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 -mr-1 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                    </svg>
                </button>
            </div>
        </form>
    </div>

    <script>
        // Show selected file name
        document.getElementById('cv_file').addEventListener('change', function(e) {
            const fileName = e.target.files[0] ? e.target.files[0].name : 'Chưa có file nào được chọn';
            document.getElementById('file-name').textContent = fileName;
        });
    </script>
</x-app-layout>