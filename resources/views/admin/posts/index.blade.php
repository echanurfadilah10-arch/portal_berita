<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kelola Berita') }}
            </h2>
            <div class="flex gap-2">
                <a href="{{ route('admin.posts.cetak-pdf') }}" target="_blank" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold text-sm rounded-lg transition shadow-sm flex items-center gap-1">
                    🖨️ Cetak PDF
                </a>
                <a href="{{ route('admin.categories.index') }}" class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white font-semibold text-sm rounded-lg transition shadow-sm">
                    Kelola Kategori
                </a>
                <a href="{{ route('admin.posts.create') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm rounded-lg transition shadow-sm">
                    + Tambah Berita Baru
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-200 text-green-700 rounded-lg text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-gray-200 text-gray-500 text-sm uppercase">
                            <th class="py-3 px-4">No</th>
                            <th class="py-3 px-4">Gambar</th>
                            <th class="py-3 px-4">Judul Berita</th>
                            <th class="py-3 px-4">Kategori</th>
                            <th class="py-3 px-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($posts as $index => $post)
                            <tr class="hover:bg-gray-50 text-sm text-gray-700">
                                <td class="py-3 px-4 font-medium">{{ $index + 1 }}</td>
                                <td class="py-3 px-4">
                                    <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-16 h-12 object-cover rounded shadow-sm">
                                </td>
                                <td class="py-3 px-4 font-bold text-gray-900">{{ $post->title }}</td>
                                <td class="py-3 px-4">
                                    <span class="px-2.5 py-0.5 bg-blue-50 text-blue-600 font-medium text-xs rounded-full border border-blue-100">
                                        {{ $post->category->name ?? 'Tanpa Kategori' }}
                                    </span>
                                </td>
                                <td class="py-3 px-4 text-center">
                                    <div class="flex justify-center items-center gap-2">
                                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded text-xs">Edit</a>
                                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus berita ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded text-xs">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-6 text-gray-500">Belum ada berita.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>