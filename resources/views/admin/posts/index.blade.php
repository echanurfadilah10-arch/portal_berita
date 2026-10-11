<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-slate-800 leading-tight">
                {{ __('Kelola Berita') }}
            </h2>
            <a href="{{ route('admin.posts.create') }}" class="px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-xl shadow hover:bg-blue-700 transition">
                + Tambah Berita Baru
            </a>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 p-4 bg-emerald-100 border border-emerald-200 text-emerald-700 rounded-xl text-sm font-medium">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-slate-100">
                <div class="p-6 text-slate-900 overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-slate-200 text-xs font-bold text-slate-500 uppercase tracking-wider bg-slate-50">
                                <th class="p-4">No</th>
                                <th class="p-4">Gambar</th>
                                <th class="p-4">Judul Berita</th>
                                <th class="p-4">Kategori</th>
                                <th class="p-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-sm">
                            @forelse ($posts as $index => $post)
                                <tr class="hover:bg-slate-50/50 transition">
                                    <td class="p-4 font-medium text-slate-500">{{ $index + 1 }}</td>
                                    <td class="p-4">
                                        <img src="{{ $post->image }}" alt="" class="w-16 h-12 object-cover rounded-lg shadow-sm bg-slate-100">
                                    </td>
                                    <td class="p-4 font-bold text-slate-800 max-w-xs truncate">{{ $post->title }}</td>
                                    <td class="p-4">
                                        <span class="px-3 py-1 bg-blue-50 text-blue-600 font-semibold text-xs rounded-full border border-blue-100">
                                            {{ $post->category->name }}
                                        </span>
                                    </td>
                                    <td class="p-4 text-center space-x-2">
                                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="px-3 py-1.5 bg-amber-500 text-white font-semibold rounded-lg text-xs hover:bg-amber-600 transition">Edit</a>
                                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1.5 bg-rose-600 text-white font-semibold rounded-lg text-xs hover:bg-rose-700 transition">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="p-8 text-center text-slate-500 font-medium">Belum ada berita yang tersedia.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>