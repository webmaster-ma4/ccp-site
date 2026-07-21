@extends('layouts.app')

@section('content')

{{-- PAGE HERO --}}
<section class="page-hero">
    <div class="animate-up">
        <span class="page-hero-eyebrow">{{ __('Organization') }}</span>
        <h1 class="page-hero-title">{{ __('Who We Are') }}</h1>
        <p class="page-hero-subtitle">
            {{ __('Climate Catalyst Prize is dedicated to accelerating the transition to a sustainable, climate-resilient future for the world\'s most vulnerable nations.') }}
        </p>
    </div>
</section>

{{-- BREADCRUMB --}}
<div class="breadcrumb">
    <a href="{{ route('home', ['locale' => $locale]) }}">{{ __('Home') }}</a>
    <span class="breadcrumb-sep">/</span>
    <span>{{ __('Who We Are') }}</span>
</div>

{{-- OUR STORY --}}
<section class="section-py">
    <div class="container-ccp">
        <div class="about-grid">
            <div class="animate-left">
                <span class="eyebrow">{{ __('Our Origin') }}</span>
                <h2 class="section-title">{{ __('Born from a Need for Targeted Action') }}</h2>
                <div style="font-family: 'Inter', sans-serif; font-size: 0.95rem; color: #5E7590; line-height: 1.8;">
                    <p style="margin-bottom: 1.5rem;">
                        {{ __('Established in 2020 by a consortium of climate finance experts and international development practitioners, the Climate Catalyst Prize emerged to address a critical market failure: the systemic underinvestment in climate projects within Least Developed Countries (LDCs).') }}
                    </p>
                    <p>
                        {{ __('While global climate finance has grown exponentially, only a fraction reaches the nations that are most disproportionately affected by climate change and have the least capacity to adapt. We were founded to bridge this gap, serving as an accelerator and a trusted intermediary between LDCs and international capital markets.') }}
                    </p>
                </div>
            </div>
            <div class="animate-right">
                <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 20px 40px rgba(8,28,58,0.1);">
                    <img src="{{ asset('images/about-story.jpg') }}" alt="CCP field work" style="width: 100%; height: auto; display: block;">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- VISION & MISSION --}}
<section class="section-py" style="background: #F6F8FA;">
    <div class="container-ccp">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 3rem;">
            
            <div style="background: #FFFFFF; padding: 3rem; border-radius: 12px; border: 1px solid #E0E6ED;" class="animate-up delay-1">
                <div style="width: 54px; height: 54px; border-radius: 50%; background: rgba(200,160,77,0.1); color: #C8A04D; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
                    <svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </div>
                <h3 style="font-family: 'Cormorant Garamond', serif; font-size: 2rem; color: #081C3A; margin-bottom: 1rem;">{{ __('Our Vision') }}</h3>
                <p style="font-family: 'Inter', sans-serif; font-size: 0.95rem; color: #5E7590; line-height: 1.75;">
                    {{ __('A world where economic development and environmental sustainability are intrinsically linked, and where the most vulnerable nations have equitable access to the resources needed to thrive in a changing climate.') }}
                </p>
            </div>
            
            <div style="background: #FFFFFF; padding: 3rem; border-radius: 12px; border: 1px solid #E0E6ED;" class="animate-up delay-2">
                <div style="width: 54px; height: 54px; border-radius: 50%; background: rgba(8,28,58,0.1); color: #081C3A; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
                    <svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h3 style="font-family: 'Cormorant Garamond', serif; font-size: 2rem; color: #081C3A; margin-bottom: 1rem;">{{ __('Our Mission') }}</h3>
                <p style="font-family: 'Inter', sans-serif; font-size: 0.95rem; color: #5E7590; line-height: 1.75;">
                    {{ __('To catalyze high-impact climate action in LDCs by providing technical assistance, structuring bankable projects, and unlocking international climate finance for adaptation and mitigation initiatives.') }}
                </p>
            </div>
            
        </div>
    </div>
</section>

{{-- TEAM (PLACEHOLDER) --}}
<section class="section-py text-center">
    <div class="container-ccp">
        <span class="eyebrow">{{ __('Leadership') }}</span>
        <h2 class="section-title">{{ __('Our Executive Team') }}</h2>
        <p class="section-lead" style="margin: 0 auto 4rem;">
            {{ __('Guided by a multidisciplinary team of global experts in climate science, finance, and international policy.') }}
        </p>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 2.5rem; text-align: left;">
            @for($i=1; $i<=4; $i++)
            <div class="animate-up delay-{{ $i }}">
                <div style="background: #E0E6ED; aspect-ratio: 1; border-radius: 8px; margin-bottom: 1.5rem; overflow: hidden;">
                    <img src="{{ asset('images/team-'.$i.'.jpg') }}" alt="Team Member" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Inter', sans-serif; font-size: 1.1rem; font-weight: 700; color: #081C3A; margin-bottom: 0.2rem;">Jane Doe</h4>
                <div style="font-family: 'Inter', sans-serif; font-size: 0.8rem; font-weight: 600; color: #C8A04D; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.8rem;">Executive Director</div>
                <p style="font-family: 'Inter', sans-serif; font-size: 0.85rem; color: #5E7590; line-height: 1.6;">20+ years of experience in international climate finance and policy negotiations with the UN.</p>
            </div>
            @endfor
        </div>
    </div>
</section>

@endsection
