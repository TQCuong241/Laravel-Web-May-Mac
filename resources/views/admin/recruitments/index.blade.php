<x-layouts.admin>
    {{-- Thông báo thành công --}}
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="font-semibold text-lg text-gray-800">
                    Quản lý Tin Tuyển dụng
                </h3>
                <a href="{{ route('admin.recruitments.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Thêm Tin tuyển dụng
                </a>
            </div>

            {{-- Bảng hiển thị danh sách tuyển dụng --}}
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="w-1/12 py-3 px-4 uppercase font-semibold text-sm text-left">ID</th>
                            <th class="w-3/12 py-3 px-4 uppercase font-semibold text-sm text-left">Tiêu đề</th>
                            <th class="w-2/12 py-3 px-4 uppercase font-semibold text-sm text-left">Vị trí</th>
                            <th class="w-2/12 py-3 px-4 uppercase font-semibold text-sm text-left">Địa điểm</th>
                            <th class="w-2/12 py-3 px-4 uppercase font-semibold text-sm text-left">Hạn</th>
                            <th class="w-3/12 py-3 px-4 uppercase font-semibold text-sm text-center">Hành động</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @forelse ($recruitments as $recruitment)
                            <tr class="border-b">
                                <td class="py-3 px-4">{{ $recruitment->id }}</td>
                                <td class="py-3 px-4">{{ $recruitment->title }}</td>
                                <td class="py-3 px-4">{{ $recruitment->position }}</td>
                                <td class="py-3 px-4">{{ $recruitment->location }}</td>
                                <td class="py-3 px-4">{{ \Carbon\Carbon::parse($recruitment->deadline)->format('d/m/Y') }}</td>
                                <td class="py-3 px-4 text-center space-x-2">
                                    {{-- Nút xem ứng viên --}}
                                    <a href="{{ route('admin.recruitments.applications', $recruitment->id) }}"
                                       class="bg-green-500 hover:bg-green-600 text-white text-sm px-3 py-1 rounded">
                                        Ứng viên ({{ $recruitment->applications_count ?? 0 }})
                                    </a>

                                    {{-- Nút sửa --}}
                                    <a href="{{ route('admin.recruitments.edit', $recruitment) }}"
                                       class="text-yellow-500 hover:text-yellow-700 font-bold">Sửa</a>

                                    {{-- Nút xóa --}}
                                    <form action="{{ route('admin.recruitments.destroy', $recruitment) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 font-bold"
                                                onclick="return confirm('Bạn có chắc chắn muốn xóa tin tuyển dụng này không?')">
                                            Xóa
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-6 text-center text-gray-500">Chưa có tin tuyển dụng nào.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.admin>
