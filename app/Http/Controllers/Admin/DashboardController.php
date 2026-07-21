<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\EligibleCountry;
use App\Models\Post;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.dashboard', [
            'postsCount' => Post::count(),
            'categoriesCount' => Category::count(),
            'countriesCount' => EligibleCountry::count(),
            'activeCountriesCount' => EligibleCountry::where('is_active', true)->count(),
            'recentPosts' => Post::latest()->take(5)->get(),
        ]);
    }
}
