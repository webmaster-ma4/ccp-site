<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\View\View;

class FaqController extends Controller
{
    public function __invoke(?string $locale = null): View
    {
        $locale = in_array($locale, ['en', 'fr'], true) ? $locale : config('app.locale');

        $faqs = [
            ['question' => __('What is the Climate Catalyst Prize?'), 'answer' => __('CCP is an international NGO dedicated to supporting Least Developed Countries to build climate resilience, transition to low-carbon economies, and access climate finance and carbon markets.')],
            ['question' => __('Who do you work with?'), 'answer' => __('We partner with LDC national governments, municipalities, NGOs, community organizations, and development partners to design and deliver climate projects.')],
            ['question' => __('What services does CCP provide?'), 'answer' => __('We provide 6 core areas: Climate Resilience & Adaptation, Sustainable Agriculture & Water Security, Low Carbon Economy development, Carbon Credits development and trade, Technical Assistance for project design and MRV, and Fundraising and access to climate finance.')],
            ['question' => __('Do you only work in LDCs?'), 'answer' => __('Yes. Our mandate is focused exclusively on Least Developed Countries as defined by the United Nations. This is where support is needed most.')],
            ['question' => __('How does CCP help with carbon credits?'), 'answer' => __('We support the full lifecycle: project identification, methodology selection, validation, MRV setup, and market access. Our goal is to help LDCs generate revenue from their climate action.')],
            ['question' => __('How can my organization partner with CCP?'), 'answer' => __('If you are an NGO, government, or community group in an LDC working on climate, adaptation, or sustainability, reach out to us. We offer technical assistance and help connect you to funding.')],
            ['question' => __('How is CCP funded?'), 'answer' => __('CCP is funded through grants, philanthropic donations, project fees, and partnerships with development agencies and the private sector.')],
            ['question' => __('Where are you based?'), 'answer' => __('CCP is registered in the USA and operates globally with a focus on projects in LDCs across Africa, Asia, Latin America, Caribbean and the Pacific.')],
        ];

        return view('faq', [
            'locale' => $locale,
            'faqs' => $faqs,
            'title' => __('Frequently Asked Questions'),
            'description' => __('Everything you need to know about the Climate Catalyst Prize and how we work.'),
        ]);
    }
}