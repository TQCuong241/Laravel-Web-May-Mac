<x-layouts.admin>
    <h2 class="text-2xl font-semibold mb-6">Chỉnh sửa tin tuyển dụng</h2>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.recruitments.update', $recruitment->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium">Tiêu đề</label>
            <input type="text" name="title" value="{{ old('title', $recruitment->title) }}" class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block font-medium">Mô tả</label>
            <textarea name="description" class="w-full border rounded px-3 py-2" rows="5">{{ old('description', $recruitment->description) }}</textarea>
        </div>

        <div>
            <label class="block font-medium">Vị trí</label>
            <input type="text" name="position" value="{{ old('position', $recruitment->position) }}" class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block font-medium">Địa điểm</label>
            <input type="text" name="location" value="{{ old('location', $recruitment->location) }}" class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block font-medium">Lương (VNĐ)</label>
            <input type="number" name="salary" value="{{ old('salary', $recruitment->salary) }}" class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block font-medium">Hạn ứng tuyển</label>
            <input type="date" name="deadline" value="{{ old('deadline', \Carbon\Carbon::parse($recruitment->deadline)->format('Y-m-d')) }}">
        </div>

        <div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Cập nhật tin tuyển dụng
            </button>
            <a href="{{ route('admin.recruitments.index') }}" class="ml-4 text-gray-600 hover:underline">Quay lại</a>
        </div>
    </form>
</x-layouts.admin>
