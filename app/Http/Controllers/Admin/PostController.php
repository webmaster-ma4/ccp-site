<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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

    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,webp,svg', 'max:5120'],
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('uploads/posts');
            
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            
            $file->move($destinationPath, $filename);
            
            return response()->json([
                'url' => asset('uploads/posts/' . $filename),
                'success' => true,
            ]);
        }

        return response()->json(['error' => 'No image uploaded.'], 400);
    }
}
