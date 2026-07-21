<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\View\View;

class AboutController extends Controller
{
    public function __invoke(?string $locale = null): View
    {
        $locale = in_array($locale, ['en', 'fr'], true) ? $locale : config('app.locale');

        return view('about', [
            'locale' => $locale,
            'title' => __('The Story of Climate Catalyst Prize'),
            'description' => __('The Climate Catalyst Prize was founded on a simple belief: the countries facing the greatest climate risks should have the greatest access to solutions, finance, and technical support.'),
        ]);
    }
}