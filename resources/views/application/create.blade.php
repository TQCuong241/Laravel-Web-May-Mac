<x-app-layout>
    <div class="max-w-3xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Ứng tuyển: {{ $recruitment->title }}</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('application.store', $recruitment->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="block font-medium">Họ và tên</label>
                <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" required class="w-full border px-3 py-2 rounded">
            </div>

            <div>
                <label class="block font-medium">Email</label>
                <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" required class="w-full border px-3 py-2 rounded">
            </div>

            <div>
                <label class="block font-medium">Số điện thoại</label>
                <input type="text" name="phone" value="{{ old('phone') }}" required class="w-full border px-3 py-2 rounded">
            </div>

            <div>
                <label class="block font-medium">Địa chỉ</label>
                <input type="text" name="address" value="{{ old('address') }}" class="w-full border px-3 py-2 rounded">
            </div>

            <div>
                <label class="block font-medium">Ghi chú (tuỳ chọn)</label>
                <textarea name="message" rows="4" class="w-full border px-3 py-2 rounded">{{ old('message') }}</textarea>
            </div>

            <div>
                <label class="block font-medium">Tải lên CV (.pdf, .doc, .docx, tối đa 2MB)</label>
                <input type="file" name="cv_file" accept=".pdf,.doc,.docx" class="w-full">
            </div>

            <div>
                <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    Gửi đơn ứng tuyển
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
