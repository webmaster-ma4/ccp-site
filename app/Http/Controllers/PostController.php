<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\App;
use Illuminate\View\View;

class PostController extends Controller
{
    public function show(string $locale, string $slug): View
    {
        $locale = in_array($locale, ['en', 'fr'], true) ? $locale : config('app.locale');

        $post = Post::where('slug', $slug)->firstOrFail();

        return view('post', [
            'locale' => $locale,
            'post' => $post,
            'title' => $post->title . ' | ' . __('Climate Catalyst Prize'),
            'description' => $post->excerpt,
        ]);
    }
}