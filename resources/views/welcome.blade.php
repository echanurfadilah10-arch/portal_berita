<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Portal Berita Kampus</title>
        <!-- Fonts & Tailwind CSS via Vite -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-slate-50 text-slate-800 antialiased font-sans">
        
        <!-- Header / Navbar -->
        <header class="bg-white border-b border-slate-100 sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
                <a href="{{ url('/') }}" class="text-xl font-bold text-blue-600 tracking-tight">
                    Portal Berita SI
                </a>
                <div>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-4 py-2 bg-slate-100 text-slate-700 font-semibold text-sm rounded-xl hover:bg-slate-200 transition">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-600 text-white font-semibold text-sm rounded-xl hover:bg-blue-700 transition">Log in</a>
                    @endauth
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="max-w-7xl mx-auto px-6 py-12">
            
            <!-- Hero Section -->
            <div class="text-center max-w-2xl mx-auto mb-10">
                <h1 class="text-4xl font-extrabold text-slate-900 tracking-tight mb-4">Informasi & Berita Terkini</h1>
                <p class="text-slate-500 text-base">Temukan berbagai berita, artikel menarik, dan pembaruan seputar teknologi serta kampus.</p>
            </div>

            <!-- Form Pencarian Berita -->
            <div class="max-w-xl mx-auto mb-12">
                <form action="{{ url('/') }}" method="GET" class="flex gap-2">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul berita atau topik menarik..." class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-600 focus:ring focus:ring-blue-100 transition text-sm shadow-sm">
                    <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-xl text-sm shadow-md hover:bg-blue-700 transition">Cari</button>
                </form>
            </div>

            <!-- Grid Berita -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($posts as $post)
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden hover:shadow-md transition flex flex-col">
                        <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-48 object-cover bg-slate-100">
                        <div class="p-6 flex flex-col flex-grow">
                            <div class="mb-3">
                                <span class="px-3 py-1 bg-blue-50 text-blue-600 font-semibold text-xs rounded-full border border-blue-100">
                                    {{ $post->category->name }}
                                </span>
                            </div>
                            <h3 class="text-lg font-bold text-slate-900 mb-2 leading-snug">
                                <a href="{{ url('/posts/' . $post->slug) }}" class="hover:text-blue-600 transition">{{ $post->title }}</a>
                            </h3>
                            <p class="text-slate-500 text-sm mb-4 flex-grow line-clamp-3">
                                {{ $post->content }}
                            </p>
                            <div class="pt-4 border-t border-slate-100 flex justify-between items-center text-xs text-slate-400">
                                <span>{{ $post->created_at->format('d M Y') }}</span>
                                <a href="{{ url('/posts/' . $post->slug) }}" class="font-bold text-blue-600 hover:underline">Baca Selengkapnya &rarr;</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-16 bg-white rounded-2xl border border-slate-100">
                        <p class="text-slate-500 font-medium">Tidak ada berita yang ditemukan dengan kata kunci tersebut.</p>
                    </div>
                @endforelse
            </div>

        </main>

        <!-- Footer -->
        <footer class="bg-white border-t border-slate-100 py-6 text-center text-xs text-slate-400 mt-20">
            &copy; 2026 Portal Berita Kampus. All rights reserved.
        </footer>

    </body>
</html>