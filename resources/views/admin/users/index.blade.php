<x-layouts.admin>
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-md rounded p-6">
        <div class="mb-4 flex justify-between items-center">
            <h2 class="text-xl font-semibold">Quản lý Người dùng</h2>
        </div>

        <table class="min-w-full bg-white">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-4 text-left">ID</th>
                    <th class="py-2 px-4 text-left">Tên</th>
                    <th class="py-2 px-4 text-left">Email</th>
                    <th class="py-2 px-4 text-center">Admin</th>
                    <th class="py-2 px-4 text-center">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr class="border-b">
                        <td class="py-2 px-4">{{ $user->id }}</td>
                        <td class="py-2 px-4">{{ $user->name }}</td>
                        <td class="py-2 px-4">{{ $user->email }}</td>
                        <td class="py-2 px-4 text-center">
                            {{ $user->role == 1 ? '✅' : '❌' }}

                        </td>
                        <td class="py-2 px-4 text-center">
                            @if ($user->role != 1)
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="text-yellow-500 font-bold mr-2">Sửa</a>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline-block">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Bạn có chắc muốn xóa?')" class="text-red-600 font-bold">Xóa</button>
                                </form>
                            @else
                                <span class="text-gray-400 italic">Không thao tác</span>
                            @endif
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500">Chưa có người dùng nào.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.admin>
