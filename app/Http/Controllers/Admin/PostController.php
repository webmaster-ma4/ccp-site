<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        return view('admin.posts.index', [
            'posts' => Post::latest('published_at')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.posts.create', [
            'categories' => Category::all(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:posts'],
            'excerpt' => ['required', 'string'],
            'content' => ['required', 'string'],
            'published_at' => ['nullable', 'date'],
            'category_id' => ['nullable', 'exists:categories,id'],
        ]);

        Post::create($data);

        return redirect()->route('admin.posts.index');
    }

    public function edit(Post $post): View
    {
        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => Category::all(),
        ]);
    }

    public function update(Request $request, Post $post): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:posts,slug,' . $post->id],
            'excerpt' => ['required', 'string'],
            'content' => ['required', 'string'],
            'published_at' => ['nullable', 'date'],
            'category_id' => ['nullable', 'exists:categories,id'],
        ]);

        $post->update($data);

        return redirect()->route('admin.posts.index');
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
