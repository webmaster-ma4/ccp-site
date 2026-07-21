<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\EligibleCountryController;
use App\Http\Controllers\EligibleCountryController as PublicEligibleCountryController;
use App\Http\Controllers\ServicesController;
use App\Http\Middleware\AuthenticateAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/switch-language/{locale}', function (string $locale) {
    if (!in_array($locale, ['en', 'fr'])) {
        $locale = config('app.fallback_locale');
    }
    return redirect()->route('home.locale', ['locale' => $locale]);
})->name('locale.switch');

Route::get('/', function (\Illuminate\Http\Request $request) {
    // If a locale session exists, honour it
    if (session()->has('locale') && in_array(session('locale'), ['en', 'fr'])) {
        return redirect()->route('home.locale', ['locale' => session('locale')]);
    }
    // Detect from browser Accept-Language header
    $preferred = substr($request->server('HTTP_ACCEPT_LANGUAGE', 'en'), 0, 2);
    $locale = ($preferred === 'fr') ? 'fr' : 'en';
    return redirect()->route('home.locale', ['locale' => $locale]);
})->name('home');
Route::get('/{locale}', [HomeController::class, '__invoke'])->whereIn('locale', ['en', 'fr'])->name('home.locale');
Route::get('/{locale}/about', [AboutController::class, '__invoke'])->whereIn('locale', ['en', 'fr'])->name('about');
Route::get('/{locale}/services', [ServicesController::class, '__invoke'])->whereIn('locale', ['en', 'fr'])->name('services');
Route::get('/{locale}/faq', [FaqController::class, '__invoke'])->whereIn('locale', ['en', 'fr'])->name('faq');
Route::get('/{locale}/contact', [ContactController::class, '__invoke'])->whereIn('locale', ['en', 'fr'])->name('contact');
Route::post('/{locale}/contact', [ContactController::class, 'send'])->whereIn('locale', ['en', 'fr'])->name('contact.send');
Route::get('/{locale}/apply', [App\Http\Controllers\ApplyController::class, '__invoke'])->whereIn('locale', ['en', 'fr'])->name('apply');
Route::post('/{locale}/apply', [App\Http\Controllers\ApplyController::class, 'store'])->whereIn('locale', ['en', 'fr'])->name('apply.store');
Route::get('/{locale}/map', [App\Http\Controllers\EligibleCountryController::class, 'map'])->whereIn('locale', ['en', 'fr'])->name('map');
Route::get('/{locale}/blog', [BlogController::class, '__invoke'])->whereIn('locale', ['en', 'fr'])->name('blog');
Route::get('/{locale}/blog/category/{categorySlug}', [BlogController::class, '__invoke'])->whereIn('locale', ['en', 'fr'])->name('blog.category');
Route::get('/{locale}/blog/{slug}', [PostController::class, 'show'])->whereIn('locale', ['en', 'fr'])->name('post');
Route::get('/api/eligible-countries', [PublicEligibleCountryController::class, 'index'])->name('api.eligible-countries');

Route::get('/sitemap.xml', function () {
    $localeUrls = [
        ['loc' => url('/'), 'lastmod' => now()->toDateString()],
        ['loc' => url('/fr'), 'lastmod' => now()->toDateString()],
        ['loc' => url('/en/about'), 'lastmod' => now()->toDateString()],
        ['loc' => url('/fr/about'), 'lastmod' => now()->toDateString()],
        ['loc' => url('/en/services'), 'lastmod' => now()->toDateString()],
        ['loc' => url('/fr/services'), 'lastmod' => now()->toDateString()],
        ['loc' => url('/en/faq'), 'lastmod' => now()->toDateString()],
        ['loc' => url('/fr/faq'), 'lastmod' => now()->toDateString()],
        ['loc' => url('/en/contact'), 'lastmod' => now()->toDateString()],
        ['loc' => url('/fr/contact'), 'lastmod' => now()->toDateString()],
        ['loc' => url('/en/blog'), 'lastmod' => now()->toDateString()],
        ['loc' => url('/fr/blog'), 'lastmod' => now()->toDateString()],
    ];

    $posts = App\Models\Post::query()->whereNotNull('published_at')->get();
    foreach ($posts as $post) {
        $localeUrls[] = [
            'loc' => url('/en/blog/' . $post->slug),
            'lastmod' => optional($post->published_at)->toDateString(),
        ];
        $localeUrls[] = [
            'loc' => url('/fr/blog/' . $post->slug),
            'lastmod' => optional($post->published_at)->toDateString(),
        ];
    }

    return response(view('sitemap', ['urls' => $localeUrls]), 200, ['Content-Type' => 'application/xml']);
})->name('sitemap');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware([AuthenticateAdmin::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::get('/posts', [AdminPostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [AdminPostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [AdminPostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [AdminPostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [AdminPostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [AdminPostController::class, 'destroy'])->name('posts.destroy');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

    Route::get('/eligible-countries', [EligibleCountryController::class, 'index'])->name('eligible-countries.index');
    Route::post('/eligible-countries', [EligibleCountryController::class, 'store'])->name('eligible-countries.store');
    Route::get('/eligible-countries/{eligibleCountry}/edit', [EligibleCountryController::class, 'edit'])->name('eligible-countries.edit');
    Route::put('/eligible-countries/{eligibleCountry}', [EligibleCountryController::class, 'update'])->name('eligible-countries.update');
    Route::delete('/eligible-countries/{eligibleCountry}', [EligibleCountryController::class, 'destroy'])->name('eligible-countries.destroy');
});
