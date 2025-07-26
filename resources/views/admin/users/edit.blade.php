<x-layouts.admin>
    <h2 class="text-xl font-semibold mb-4">Chỉnh sửa người dùng</h2>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-4">
        @csrf @method('PUT')

        <div>
            <label class="block font-medium">Tên</label>
            <input name="name" value="{{ old('name', $user->name) }}" class="w-full border px-3 py-2 rounded">
        </div>

        <div>
            <label class="block font-medium">Email</label>
            <input name="email" type="email" value="{{ old('email', $user->email) }}" class="w-full border px-3 py-2 rounded">
        </div>

        <div class="flex items-center">
            <input type="checkbox" name="is_admin" id="is_admin" {{ $user->is_admin ? 'checked' : '' }} class="mr-2">
            <label for="is_admin">Là admin?</label>
        </div>

        <div>
            <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Cập nhật</button>
            <a href="{{ route('admin.users.index') }}" class="ml-4 text-gray-600 hover:underline">Quay lại</a>
        </div>
    </form>
</x-layouts.admin>
