<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Halaman Utama (Frontend Portal Berita + Fitur Pencarian)
Route::get('/', function (Request $request) {
    $query = Post::with('category');
    
    // Jika user melakukan pencarian
    if ($request->has('search') && $request->search != '') {
        $query->where('title', 'like', '%' . $request->search . '%');
    }
    
    $posts = $query->latest()->get();
    return view('welcome', compact('posts'));
});

// Halaman Detail Berita (Frontend)
Route::get('/posts/{post:slug}', function (Post $post) {
    return view('posts.show', compact('post'));
});

// Route Bawaan Laravel Breeze (Dashboard User)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route Profil Pengguna
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route Khusus Admin untuk Mengelola Berita (CRUD)
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('posts', AdminPostController::class);
});

require __DIR__.'/auth.php';