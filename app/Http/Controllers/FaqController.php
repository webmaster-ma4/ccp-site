<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\View\View;

class FaqController extends Controller
{
    public function __invoke(?string $locale = null): View
    {
        $locale = in_array($locale, ['en', 'fr'], true) ? $locale : config('app.locale');
        App::setLocale($locale);

        $faqs = [
            ['question_key' => 'faq_q1', 'answer_key' => 'faq_a1'],
            ['question_key' => 'faq_q2', 'answer_key' => 'faq_a2'],
            ['question_key' => 'faq_q3', 'answer_key' => 'faq_a3'],
            ['question_key' => 'faq_q4', 'answer_key' => 'faq_a4'],
            ['question_key' => 'faq_q5', 'answer_key' => 'faq_a5'],
            ['question_key' => 'faq_q6', 'answer_key' => 'faq_a6'],
            ['question_key' => 'faq_q7', 'answer_key' => 'faq_a7'],
            ['question_key' => 'faq_q8', 'answer_key' => 'faq_a8'],
        ];

        return view('faq', [
            'locale' => $locale,
            'faqs' => $faqs,
            'title' => __('site.faq_title'),
            'description' => __('site.faq_intro'),
        ]);
    }
}