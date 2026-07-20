<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(?string $locale = null): View
    {
        $locale = in_array($locale, ['en', 'fr'], true) ? $locale : config('app.locale');

        App::setLocale($locale);

        return view('home', [
            'locale' => $locale,
            'title' => __('site.meta_title'),
            'description' => __('site.meta_description'),
        ]);
    }
}
