<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(?string $locale = null): View
    {
        $locale = in_array($locale, ['en', 'fr'], true) ? $locale : config('app.locale');

        // Fetch 3 most recent published posts
        $recentPosts = \App\Models\Post::with('category')
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        return view('home', [
            'locale' => $locale,
            'title' => __('Climate Catalyst Prize | Catalyzing Climate Solutions in LDCs'),
            'description' => __('Climate Catalyst Prize is a global NGO helping Least Developed Countries build climate resilience, grow low-carbon economies, and access climate finance.'),
            'recentPosts' => $recentPosts,
        ]);
    }
}