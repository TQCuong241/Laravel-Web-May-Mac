<x-app-layout>
    <div class="max-w-6xl mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Tin tuyển dụng</h1>

        @if ($recruitments->isEmpty())
            <p class="text-gray-500">Hiện chưa có tin tuyển dụng nào.</p>
        @else
            <div class="space-y-6">
                @foreach ($recruitments as $item)
                    <div class="border border-gray-200 rounded-lg p-4 shadow-sm">
                        <h2 class="text-lg font-semibold text-blue-700">{{ $item->title }}</h2>
                        <p class="text-gray-700 mb-1"><strong>Vị trí:</strong> {{ $item->position }}</p>
                        <p class="text-gray-700 mb-1"><strong>Địa điểm:</strong> {{ $item->location }}</p>
                        <p class="text-gray-700 mb-1"><strong>Lương:</strong> {{ number_format($item->salary) }} VNĐ</p>
                        <p class="text-gray-600 text-sm"><strong>Hạn ứng tuyển:</strong> {{ \Carbon\Carbon::parse($item->deadline)->format('d/m/Y') }}</p>
                        <p class="mt-2 text-gray-800">{{ $item->description }}</p>

                        {{-- Nút ứng tuyển --}}
                        @auth
                            <div class="mt-4">
                                <a href="{{ route('application.create', $item->id) }}"
                                   class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                                    Ứng tuyển
                                </a>
                            </div>
                        @else
                            <p class="text-sm text-gray-500 mt-2">
                                * <a href="{{ route('login') }}" class="text-blue-600 underline">Đăng nhập</a> để ứng tuyển.
                            </p>
                        @endauth
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
