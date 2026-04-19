<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::with(['category', 'author'])
            ->where('status', 'published')
            ->orderBy('published_at', 'desc');

        if ($request->has('category')) {
            $category = PostCategory::where('slug', $request->category)->firstOrFail();
            $query->where('category_id', $category->id);
        }

        $posts = $query->paginate(9);
        $categories = PostCategory::withCount('posts')->get();

        return view('posts.index', compact('posts', 'categories'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)
            ->with(['category', 'author'])
            ->where('status', 'published')
            ->firstOrFail();

        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->where('status', 'published')
            ->with(['category', 'author'])
            ->limit(3)
            ->get();

        return view('posts.show', compact('post', 'relatedPosts'));
    }
}
