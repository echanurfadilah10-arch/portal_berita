<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $featuredPost = Post::with('category')->latest()->first();
        $posts = Post::with('category')->latest()->when($featuredPost, function($query) use ($featuredPost) {
            return $query->where('id', '!=', $featuredPost->id);
        })->get();

        return view('welcome', compact('categories', 'featuredPost', 'posts'));
    }

    public function show($slug)
    {
        $post = Post::with('category')->where('slug', $slug)->firstOrFail();
        $relatedPosts = Post::where('category_id', $post->category_id)->where('id', '!=', $post->id)->take(3)->get();

        return view('posts.show', compact('post', 'relatedPosts'));
    }
}