<x-layouts.admin>
    <div class="bg-white p-6 rounded-lg shadow-xl">
        <h3 class="text-lg font-semibold mb-6">Thêm Sản phẩm mới</h3>
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" id="productForm">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Tên sản phẩm --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Tên sản phẩm <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name') }}" 
                           class="w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                    @error('name')<small class="text-red-500">{{ $message }}</small>@enderror
                </div>

                {{-- Loại sản phẩm --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Loại sản phẩm <span class="text-red-500">*</span></label>
                    <select name="category_id" class="w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="">-- Chọn loại --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')<small class="text-red-500">{{ $message }}</small>@enderror
                </div>

                {{-- Size sản phẩm --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Size <span class="text-red-500">*</span></label>
                    <select name="size_id" class="w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="">-- Chọn size --</option>
                        @foreach($sizes as $size)
                            <option value="{{ $size->id }}" {{ old('size_id') == $size->id ? 'selected' : '' }}>
                                {{ $size->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('size_id')<small class="text-red-500">{{ $message }}</small>@enderror
                </div>

                {{-- Giá --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Giá <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <input type="text" id="price_display" name="price_display" 
                               value="{{ old('price') ? number_format(old('price'), 0, ',', '.') : '' }}"
                               class="w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                               oninput="formatPrice(this)">
                        <input type="hidden" id="price" name="price" value="{{ old('price') }}">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <span class="text-gray-500 text-sm">VNĐ</span>
                        </div>
                    </div>
                    @error('price')<small class="text-red-500">{{ $message }}</small>@enderror
                </div>

                {{-- Số lượng --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Số lượng tồn kho <span class="text-red-500">*</span></label>
                    <input type="number" name="stock_quantity" value="{{ old('stock_quantity') }}" 
                           class="w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                    @error('stock_quantity')<small class="text-red-500">{{ $message }}</small>@enderror
                </div>

                {{-- Ảnh sản phẩm --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Ảnh sản phẩm</label>
                    <input type="file" name="image" 
                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    @error('image')<small class="text-red-500">{{ $message }}</small>@enderror
                </div>

                {{-- Mô tả --}}
                <div class="md:col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-700">Mô tả</label>
                    <textarea name="description" rows="4" 
                              class="w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">{{ old('description') }}</textarea>
                    @error('description')<small class="text-red-500">{{ $message }}</small>@enderror
                </div>
            </div>
            <div class="mt-6 flex justify-end space-x-3">
                <a href="{{ route('admin.products.index') }}" 
                   class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                   Hủy
                </a>
                <button type="submit" 
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        Lưu
                </button>
            </div>
        </form>
    </div>

    <script>
        function formatPrice(input) {
            // Lấy giá trị và loại bỏ tất cả ký tự không phải số
            let value = input.value.replace(/[^\d]/g, '');
            
            // Định dạng với dấu phân cách hàng nghìn
            if (value.length > 0) {
                value = parseInt(value, 10).toLocaleString('vi-VN');
            }
            
            // Gán giá trị đã định dạng trở lại input
            input.value = value;
            
            // Cập nhật giá trị raw (không có dấu phân cách) vào input ẩn
            document.getElementById('price').value = value.replace(/[^\d]/g, '');
        }

        // Xử lý khi form submit
        document.getElementById('productForm').addEventListener('submit', function(e) {
            const priceInput = document.getElementById('price_display');
            priceInput.value = priceInput.value.replace(/[^\d]/g, '');
        });
    </script>
</x-layouts.admin>