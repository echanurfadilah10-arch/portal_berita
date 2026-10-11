<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} - NEWS Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased">

    <!-- Navbar -->
    <header class="bg-white/85 backdrop-blur-md border-b border-slate-200/80 sticky top-0 z-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <a href="/" class="flex items-center gap-3">
                    <span class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-extrabold text-xl px-3 py-1.5 rounded-xl shadow-lg shadow-blue-500/20">NEWS</span>
                    <span class="text-2xl font-black tracking-tight text-slate-900">PORTAL</span>
                </a>
                <a href="/" class="text-sm font-semibold text-blue-600 hover:text-blue-700 flex items-center gap-1.5 bg-blue-50 px-4 py-2 rounded-xl transition">
                    &larr; Kembali ke Beranda
                </a>
            </div>
        </div>
    </header>

    <!-- Main Article -->
    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <article class="bg-white rounded-3xl shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden p-8 sm:p-12">
            
            <!-- Category & Date -->
            <div class="flex items-center gap-3 mb-6">
                <span class="px-3.5 py-1 bg-blue-50 text-blue-600 font-bold text-xs rounded-full uppercase tracking-wider border border-blue-100">
                    {{ $post->category->name }}
                </span>
                <span class="text-sm text-slate-400 font-medium">•</span>
                <span class="text-sm text-slate-500 font-medium">{{ $post->created_at->format('d M Y, H:i') }} WIB</span>
            </div>

            <!-- Title -->
            <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 leading-tight mb-6">
                {{ $post->title }}
            </h1>

            <!-- Author info -->
            <div class="flex items-center gap-3 pb-8 mb-8 border-b border-slate-100">
                <div class="w-10 h-10 rounded-full bg-blue-600 text-white font-bold flex items-center justify-center text-sm shadow-md shadow-blue-500/20">
                    R
                </div>
                <div>
                    <h4 class="text-sm font-bold text-slate-900">Tim Redaksi Utama</h4>
                    <p class="text-xs text-slate-500">Jurnalis Portal Berita</p>
                </div>
            </div>

            <!-- Featured Image -->
            @if($post->image)
            <div class="mb-10 rounded-2xl overflow-hidden shadow-lg h-[380px] sm:h-[460px] bg-slate-100">
                <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
            </div>
            @endif

            <!-- Content -->
            <div class="prose max-w-none text-slate-700 text-base sm:text-lg leading-relaxed space-y-6">
                <p>{{ $post->content }}</p>
            </div>
        </article>
    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-400 mt-20 py-12 border-t border-slate-800 text-center">
        <p class="text-sm font-medium">&copy; {{ date('Y') }} NEWS Portal. Hak Cipta Dilindungi Undang-Undang.</p>
    </footer>
</body>
</html>