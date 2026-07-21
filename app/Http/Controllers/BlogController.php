<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\App;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function __invoke(?string $locale = null, ?string $categorySlug = null): View
    {
        $locale = in_array($locale, ['en', 'fr'], true) ? $locale : config('app.locale');

        $query = Post::query()
            ->whereNotNull('published_at')
            ->orderByDesc('published_at');

        $category = null;
        if ($categorySlug) {
            $category = Category::where('slug', $categorySlug)->firstOrFail();
            $query->where('category_id', $category->id);
        }

        $posts = $query->get();

        return view('blog', [
            'locale' => $locale,
            'posts' => $posts,
            'categories' => Category::all(),
            'currentCategory' => $category,
        ]);
    }
}
