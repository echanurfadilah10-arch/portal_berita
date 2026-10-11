<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">
            {{ __('Edit Berita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-slate-100 p-8">
                <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Judul Berita</label>
                        <input type="text" name="title" value="{{ old('title', $post->title) }}" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-600 focus:ring focus:ring-blue-100 transition">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Kategori Berita</label>
                        <select name="category_id" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-600 focus:ring focus:ring-blue-100 transition">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">URL Gambar</label>
                        <input type="url" name="image" value="{{ old('image', $post->image) }}" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-600 focus:ring focus:ring-blue-100 transition">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Isi Berita Lengkap</label>
                        <textarea name="content" rows="6" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-600 focus:ring focus:ring-blue-100 transition">{{ old('content', $post->content) }}</textarea>
                    </div>

                    <div class="flex justify-end gap-3 pt-4 border-t border-slate-100">
                        <a href="{{ route('admin.posts.index') }}" class="px-5 py-2.5 bg-slate-100 text-slate-700 font-semibold rounded-xl text-sm hover:bg-slate-200 transition">Batal</a>
                        <button type="submit" class="px-6 py-2.5 bg-blue-600 text-white font-semibold rounded-xl text-sm shadow-md hover:bg-blue-700 transition">Perbarui Berita</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>