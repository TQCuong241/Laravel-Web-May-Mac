<x-layouts.admin>
    <h2 class="text-xl font-semibold mb-6">Danh sách ứng viên cho: <span class="text-blue-700">{{ $recruitment->title }}</span></h2>

    <a href="{{ route('admin.recruitments.index') }}" class="mb-4 inline-block text-sm text-blue-600 hover:underline">
        ← Quay lại danh sách tin tuyển dụng
    </a>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg p-4">
        <table class="min-w-full">
            <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
                <tr>
                    <th class="py-3 px-4 text-left">Họ tên</th>
                    <th class="py-3 px-4 text-left">Email</th>
                    <th class="py-3 px-4 text-left">SĐT</th>
                    <th class="py-3 px-4 text-left">Địa chỉ</th>
                    <th class="py-3 px-4 text-left">Ghi chú</th>
                    <th class="py-3 px-4 text-left">CV</th>
                    <th class="py-3 px-4 text-center">Trạng thái</th>
                </tr>
            </thead>
            <tbody class="text-gray-800 text-sm">
                @forelse ($recruitment->applications as $app)
                    <tr class="border-b hover:bg-gray-50 transition">
                        <td class="py-2 px-4 font-medium">{{ $app->name }}</td>
                        <td class="py-2 px-4">{{ $app->email }}</td>
                        <td class="py-2 px-4">{{ $app->phone }}</td>
                        <td class="py-2 px-4">{{ $app->address }}</td>
                        <td class="py-2 px-4 text-sm text-gray-600">{{ $app->message }}</td>
                        <td class="py-2 px-4">
                            @if ($app->cv_file)
                                <a href="{{ asset('storage/' . $app->cv_file) }}" target="_blank"
                                   class="inline-block bg-blue-100 text-blue-700 px-3 py-1 rounded text-xs hover:underline">
                                    📄 Xem CV
                                </a>
                            @else
                                <span class="text-gray-400 italic text-sm">Chưa có</span>
                            @endif
                        </td>
                        <td class="py-2 px-4 text-center">
                            <form action="{{ route('admin.applications.toggleContacted', $app->id) }}" method="POST">
                                @csrf @method('PATCH')
                                <button type="submit"
                                    class="px-3 py-1 rounded text-xs font-semibold
                                        {{ $app->contacted
                                            ? 'bg-green-100 text-green-700 hover:bg-green-200'
                                            : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                                    {{ $app->contacted ? '✓ Đã liên hệ' : 'Chưa liên hệ' }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-6 text-gray-500 italic">Chưa có ứng viên nào ứng tuyển.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.admin>
