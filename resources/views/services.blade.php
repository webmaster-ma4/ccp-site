@extends('layouts.app')

@section('content')

{{-- PAGE HERO --}}
<section class="page-hero">
    <div class="animate-up">
        <span class="page-hero-eyebrow">{{ __('Expertise') }}</span>
        <h1 class="page-hero-title">{{ __('What We Do') }}</h1>
        <p class="page-hero-subtitle">
            {{ __('From project inception to capital matching and implementation, we provide comprehensive support for climate initiatives in LDCs.') }}
        </p>
    </div>
</section>

{{-- BREADCRUMB --}}
<div class="breadcrumb">
    <a href="{{ route('home', ['locale' => $locale]) }}">{{ __('Home') }}</a>
    <span class="breadcrumb-sep">/</span>
    <span>{{ __('What We Do') }}</span>
</div>

{{-- CORE SERVICES INTRO --}}
<section class="section-py text-center">
    <div class="container-ccp">
        <span class="eyebrow">{{ __('Our Approach') }}</span>
        <h2 class="section-title">{{ __('End-to-End Climate Solutions') }}</h2>
        <p class="section-lead" style="margin: 0 auto 4rem;">
            {{ __('We partner with governments and local organizations to structure, finance, and deploy projects that build resilience and drive sustainable growth.') }}
        </p>
    </div>
</section>

{{-- SERVICE 1: CARBON MARKETS --}}
<section id="carbon-markets" class="section-py" style="background: #F6F8FA; border-top: 1px solid #E0E6ED; border-bottom: 1px solid #E0E6ED;">
    <div class="container-ccp">
        <div class="about-grid" style="align-items: center;">
            <div class="animate-left">
                <div style="width: 64px; height: 64px; border-radius: 12px; background: #081C3A; color: #C8A04D; display: flex; align-items: center; justify-content: center; margin-bottom: 2rem;">
                    <svg width="32" height="32" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" /></svg>
                </div>
                <h3 style="font-family: 'Cormorant Garamond', serif; font-size: 2.25rem; color: #081C3A; margin-bottom: 1rem; font-weight: 700;">{{ __('Carbon Market Access & Article 6') }}</h3>
                <p style="font-family: 'Inter', sans-serif; font-size: 0.95rem; color: #5E7590; line-height: 1.8; margin-bottom: 1.5rem;">
                    {{ __('Navigating the complexities of international carbon markets can be prohibitive for LDCs. We provide the technical expertise required to develop robust carbon methodologies, establish baselines, and verify emissions reductions.') }}
                </p>
                <ul style="list-style: none; padding: 0; margin: 0; font-family: 'Inter', sans-serif; font-size: 0.9rem; color: #162235;">
                    <li style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
                        <svg width="20" height="20" fill="none" stroke="#C8A04D" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        {{ __('Methodology development and baseline setting') }}
                    </li>
                    <li style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
                        <svg width="20" height="20" fill="none" stroke="#C8A04D" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        {{ __('Article 6 bilateral agreement structuring') }}
                    </li>
                    <li style="display: flex; align-items: center; gap: 0.75rem;">
                        <svg width="20" height="20" fill="none" stroke="#C8A04D" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        {{ __('Voluntary carbon market (VCM) integration') }}
                    </li>
                </ul>
            </div>
            <div class="animate-right text-center">
                <img src="{{ asset('images/service-1.jpg') }}" alt="Carbon Markets" style="border-radius: 12px; box-shadow: 0 16px 40px rgba(8,28,58,0.1); width: 100%; max-width: 500px; margin: 0 auto;">
            </div>
        </div>
    </div>
</section>

{{-- SERVICE 2: ADAPTATION --}}
<section id="adaptation" class="section-py">
    <div class="container-ccp">
        <div class="about-grid" style="align-items: center;">
            <div class="animate-left text-center order-2-mobile">
                <img src="{{ asset('images/service-2.jpg') }}" alt="Adaptation" style="border-radius: 12px; box-shadow: 0 16px 40px rgba(8,28,58,0.1); width: 100%; max-width: 500px; margin: 0 auto;">
            </div>
            <div class="animate-right order-1-mobile">
                <div style="width: 64px; height: 64px; border-radius: 12px; background: rgba(200,160,77,0.1); color: #C8A04D; display: flex; align-items: center; justify-content: center; margin-bottom: 2rem;">
                    <svg width="32" height="32" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </div>
                <h3 style="font-family: 'Cormorant Garamond', serif; font-size: 2.25rem; color: #081C3A; margin-bottom: 1rem; font-weight: 700;">{{ __('Adaptation & Resilience') }}</h3>
                <p style="font-family: 'Inter', sans-serif; font-size: 0.95rem; color: #5E7590; line-height: 1.8; margin-bottom: 1.5rem;">
                    {{ __('For LDCs, climate change is a present reality, not a future threat. We focus heavily on structuring adaptation projects that protect communities, infrastructure, and ecosystems from extreme weather events and slow-onset changes.') }}
                </p>
                <ul style="list-style: none; padding: 0; margin: 0; font-family: 'Inter', sans-serif; font-size: 0.9rem; color: #162235;">
                    <li style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
                        <svg width="20" height="20" fill="none" stroke="#C8A04D" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        {{ __('Climate-resilient infrastructure design') }}
                    </li>
                    <li style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
                        <svg width="20" height="20" fill="none" stroke="#C8A04D" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        {{ __('Water resource management & security') }}
                    </li>
                    <li style="display: flex; align-items: center; gap: 0.75rem;">
                        <svg width="20" height="20" fill="none" stroke="#C8A04D" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        {{ __('Early warning systems and disaster risk reduction') }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- SERVICE 3: AGRICULTURE --}}
<section id="agriculture" class="section-py" style="background: #081C3A; color: #FFFFFF;">
    <div class="container-ccp">
        <div class="about-grid" style="align-items: center;">
            <div class="animate-left">
                <div style="width: 64px; height: 64px; border-radius: 12px; background: rgba(255,255,255,0.05); color: #C8A04D; display: flex; align-items: center; justify-content: center; margin-bottom: 2rem; border: 1px solid rgba(200,160,77,0.3);">
                    <svg width="32" height="32" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" /></svg>
                </div>
                <h3 style="font-family: 'Cormorant Garamond', serif; font-size: 2.25rem; color: #FFFFFF; margin-bottom: 1rem; font-weight: 700;">{{ __('Sustainable Agriculture') }}</h3>
                <p style="font-family: 'Inter', sans-serif; font-size: 0.95rem; color: rgba(255,255,255,0.7); line-height: 1.8; margin-bottom: 1.5rem;">
                    {{ __('Agriculture is the economic backbone of many LDCs. We support regenerative farming practices that enhance food security, improve farmer livelihoods, and serve as powerful carbon sinks.') }}
                </p>
                <ul style="list-style: none; padding: 0; margin: 0; font-family: 'Inter', sans-serif; font-size: 0.9rem; color: #FFFFFF;">
                    <li style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
                        <svg width="20" height="20" fill="none" stroke="#C8A04D" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        {{ __('Regenerative farming & agroforestry') }}
                    </li>
                    <li style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
                        <svg width="20" height="20" fill="none" stroke="#C8A04D" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        {{ __('Soil carbon sequestration programs') }}
                    </li>
                    <li style="display: flex; align-items: center; gap: 0.75rem;">
                        <svg width="20" height="20" fill="none" stroke="#C8A04D" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        {{ __('Climate-smart supply chains') }}
                    </li>
                </ul>
            </div>
            <div class="animate-right text-center">
                <img src="{{ asset('images/service-3.jpg') }}" alt="Sustainable Agriculture" style="border-radius: 12px; box-shadow: 0 16px 40px rgba(0,0,0,0.3); width: 100%; max-width: 500px; margin: 0 auto;">
            </div>
        </div>
    </div>
</section>

{{-- CALL TO ACTION --}}
<section class="section-py text-center">
    <div class="container-ccp">
        <h2 class="section-title">{{ __('Ready to Partner With Us?') }}</h2>
        <p class="section-lead" style="margin: 0 auto 2.5rem;">
            {{ __('If you have a climate project that requires technical assistance or funding structuring, we want to hear from you.') }}
        </p>
        <a href="{{ route('apply', ['locale' => $locale]) }}" class="btn btn-gold btn-lg">
            {{ __('Apply for Support') }}
        </a>
    </div>
</section>

@endsection
