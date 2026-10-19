<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Halaman Utama (Frontend Portal Berita + Fitur Pencarian)
Route::get('/', function (Request $request) {
    $query = Post::with('category');
    
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

// Route Dashboard User / Admin
Route::get('/dashboard', function () {
    $posts = Post::with('category')->latest()->get();
    return view('dashboard', compact('posts'));
})->middleware(['auth', 'verified'])->name('dashboard');

// Route Profil Pengguna
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route Khusus Admin untuk Mengelola Berita & Kategori (CRUD + Cetak PDF)
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('posts/cetak-pdf', [AdminPostController::class, 'cetakPdf'])->name('posts.cetak-pdf');
    Route::resource('posts', AdminPostController::class);
    Route::resource('categories', AdminCategoryController::class);
});

require __DIR__.'/auth.php';