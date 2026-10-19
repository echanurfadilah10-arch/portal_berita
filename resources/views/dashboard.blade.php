<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard Berita') }}
            </h2>
            <a href="{{ route('admin.posts.index') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm rounded-lg transition shadow-sm">
                + Kelola Berita
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Banner Selamat Datang -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-blue-600">
                <h3 class="text-lg font-bold text-gray-900">Selamat datang kembali, {{ Auth::user()->name }}! 👋</h3>
                <p class="text-gray-600 text-sm mt-1">Berikut adalah daftar berita yang telah diterbitkan di portal berita Anda.</p>
            </div>

            <!-- Daftar Berita di Dashboard -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h4 class="text-md font-bold text-gray-800">Daftar Berita Terkini (Total: {{ $posts->count() }})</h4>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($posts as $post)
                        <div class="border border-gray-100 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition bg-white flex flex-col">
                            <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-40 object-cover bg-gray-100">
                            <div class="p-4 flex flex-col flex-grow">
                                <div class="mb-2">
                                    <span class="px-2.5 py-0.5 bg-blue-50 text-blue-600 font-medium text-xs rounded-full border border-blue-100">
                                        {{ $post->category->name }}
                                    </span>
                                </div>
                                <h5 class="font-bold text-gray-900 text-base mb-2 line-clamp-2 leading-snug">
                                    {{ $post->title }}
                                </h5>
                                <p class="text-gray-500 text-xs flex-grow line-clamp-2 mb-4">
                                    {{ $post->content }}
                                </p>
                                <div class="pt-3 border-t border-gray-100 flex justify-between items-center text-xs text-gray-400">
                                    <span>{{ $post->created_at->format('d M Y') }}</span>
                                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="text-blue-600 font-semibold hover:underline">
                                        Edit Berita &rarr;
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-3 text-center py-8 text-gray-500">
                            Belum ada berita yang diunggah. <a href="{{ route('admin.posts.create') }}" class="text-blue-600 underline">Tambah Berita Pertama</a>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</x-app-layout>