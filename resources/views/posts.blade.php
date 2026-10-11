<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Berita Laravel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-8">Portal Berita Terbaru</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse ($posts as $post)
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <span class="text-sm text-blue-600 font-semibold uppercase">{{ $post->category->name }}</span>
                    <h2 class="text-xl font-bold mt-2 mb-3">{{ $post->title }}</h2>
                    <p class="text-gray-600">{{ Str::limit($post->content, 100) }}</p>
                </div>
            @empty
                <p class="text-center text-gray-500 col-span-2">Belum ada berita yang tersedia.</p>
            @endforelse
        </div>
    </div>
</body>
</html>