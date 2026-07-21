<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\View\View;

class ServicesController extends Controller
{
    public function __invoke(?string $locale = null): View
    {
        $locale = in_array($locale, ['en', 'fr'], true) ? $locale : config('app.locale');

        $services = [
            [
                'title' => __('Climate Resilience & Adaptation'),
                'text' => __('We help municipalities and communities design adaptation plans, early warning systems, and infrastructure that stands up to climate change. Our approach combines local knowledge with global best practices to build lasting resilience.'),
                'image_class' => 'image-sunrise',
            ],
            [
                'title' => __('Agriculture & Food Systems'),
                'text' => __('From climate-smart farming to water security, we support LDC agriculture to become more productive, resilient, and low-emission. We work with farmers, cooperatives, and government agencies to transform food systems.'),
                'image_class' => 'image-forest',
            ],
            [
                'title' => __('Low Carbon Economy Development'),
                'text' => __('We assist governments and NGOs to build roadmaps for renewable energy, energy efficiency, and green jobs that drive inclusive growth. Our support includes policy alignment, feasibility studies, and implementation planning.'),
                'image_class' => 'image-city',
            ],
            [
                'title' => __('Carbon Credits & Carbon Trade'),
                'text' => __('End-to-end support: project identification, methodology selection, validation, MRV setup, and access to voluntary and compliance carbon markets. We help LDCs generate revenue from their climate action.'),
                'image_class' => 'image-sunrise',
            ],
            [
                'title' => __('Technical Assistance'),
                'text' => __('Project design, feasibility studies, policy alignment, monitoring and reporting. We build local capacity to deliver and scale climate projects effectively and sustainably.'),
                'image_class' => 'image-forest',
            ],
            [
                'title' => __('Funding & Resource Mobilization'),
                'text' => __('We connect organizations in LDCs to GCF, GEF, Adaptation Fund, bilateral donors, and private investors. From concept note to full proposal — we guide you through every step.'),
                'image_class' => 'image-city',
            ],
        ];

        return view('services', [
            'locale' => $locale,
            'services' => $services,
            'title' => __('Services for a Just Transition'),
            'description' => __('We provide end-to-end support across six core areas to help LDCs build climate resilience and access climate finance.'),
        ]);
    }
}