<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\View\View;

class ServicesController extends Controller
{
    public function __invoke(?string $locale = null): View
    {
        $locale = in_array($locale, ['en', 'fr'], true) ? $locale : config('app.locale');
        App::setLocale($locale);

        $services = [
            [
                'title_key' => 'service_1_title',
                'text_key' => 'service_1_text',
                'image_class' => 'image-sunrise',
            ],
            [
                'title_key' => 'service_2_title',
                'text_key' => 'service_2_text',
                'image_class' => 'image-forest',
            ],
            [
                'title_key' => 'service_3_title',
                'text_key' => 'service_3_text',
                'image_class' => 'image-city',
            ],
            [
                'title_key' => 'service_4_title',
                'text_key' => 'service_4_text',
                'image_class' => 'image-sunrise',
            ],
            [
                'title_key' => 'service_5_title',
                'text_key' => 'service_5_text',
                'image_class' => 'image-forest',
            ],
            [
                'title_key' => 'service_6_title',
                'text_key' => 'service_6_text',
                'image_class' => 'image-city',
            ],
        ];

        return view('services', [
            'locale' => $locale,
            'services' => $services,
            'title' => __('site.services_title'),
            'description' => __('site.services_intro'),
        ]);
    }
}