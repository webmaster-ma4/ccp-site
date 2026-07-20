<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\View\View;

class AboutController extends Controller
{
    public function __invoke(?string $locale = null): View
    {
        $locale = in_array($locale, ['en', 'fr'], true) ? $locale : config('app.locale');
        App::setLocale($locale);

        return view('about', [
            'locale' => $locale,
            'title' => __('site.about_title'),
            'description' => __('site.about_text'),
        ]);
    }
}
