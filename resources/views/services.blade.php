@extends('layouts.app')

@section('content')

{{-- PAGE HERO --}}
<section class="page-hero">
    <div class="animate-up">
        <span class="page-hero-eyebrow">{{ __('Services for a Just Transition') }}</span>
        <h1 class="page-hero-title">{{ __('What We Do') }}</h1>
        <p class="page-hero-subtitle">
            {{ __('We support NGOs, municipalities, and governments in Least Developed Countries to build climate resilience, grow low-carbon economies, and access climate finance.') }}
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
        <span class="eyebrow">{{ __('Our Expertise') }}</span>
        <h2 class="section-title">{{ __('Services for a Just Transition') }}</h2>
        <p class="section-lead" style="margin: 0 auto 4rem;">
            {{ __('From adaptation planning to carbon market access and climate finance, we provide 6 core areas of catalytic support for LDCs.') }}
        </p>
    </div>
</section>

{{-- SERVICE 1: CLIMATE RESILIENCE & ADAPTATION --}}
<section id="resilience" class="section-py" style="background: #F6F8FA; border-top: 1px solid #E0E6ED; border-bottom: 1px solid #E0E6ED;">
    <div class="container-ccp">
        <div class="about-grid" style="align-items: center;">
            <div class="animate-left">
                <div style="width: 64px; height: 64px; border-radius: 12px; background: rgba(200,160,77,0.1); color: #C8A04D; display: flex; align-items: center; justify-content: center; margin-bottom: 2rem;">
                    <svg width="32" height="32" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </div>
                <h3 style="font-family: 'Cormorant Garamond', serif; font-size: 2.25rem; color: #081C3A; margin-bottom: 1rem; font-weight: 700;">{{ __('Climate Resilience & Adaptation') }}</h3>
                <p style="font-family: 'Inter', sans-serif; font-size: 0.95rem; color: #5E7590; line-height: 1.8; margin-bottom: 1.5rem;">
                    {{ __('We help municipalities and communities design adaptation plans, early warning systems, and infrastructure that stands up to climate change.') }}
                </p>
                <ul style="list-style: none; padding: 0; margin: 0; font-family: 'Inter', sans-serif; font-size: 0.9rem; color: #162235;">
                    <li style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
                        <svg width="20" height="20" fill="none" stroke="#C8A04D" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        {{ __('Planning and projects for cities, farms, and communities facing climate shocks') }}
                    </li>
                    <li style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
                        <svg width="20" height="20" fill="none" stroke="#C8A04D" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        {{ __('Early warning systems and hazard risk reduction') }}
                    </li>
                    <li style="display: flex; align-items: center; gap: 0.75rem;">
                        <svg width="20" height="20" fill="none" stroke="#C8A04D" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        {{ __('Climate-resilient infrastructure design and community protection') }}
                    </li>
                </ul>
            </div>
            <div class="animate-right text-center">
                <img src="{{ asset('images/service-2.jpg') }}" alt="Climate Resilience" style="border-radius: 12px; box-shadow: 0 16px 40px rgba(8,28,58,0.1); width: 100%; max-width: 500px; margin: 0 auto;">
            </div>
        </div>
    </div>
</section>

{{-- SERVICE 2: AGRICULTURE & FOOD SYSTEMS --}}
<section id="agriculture" class="section-py">
    <div class="container-ccp">
        <div class="about-grid" style="align-items: center;">
            <div class="animate-left text-center order-2-mobile">
                <img src="{{ asset('images/service-3.jpg') }}" alt="Agriculture & Food Systems" style="border-radius: 12px; box-shadow: 0 16px 40px rgba(8,28,58,0.1); width: 100%; max-width: 500px; margin: 0 auto;">
            </div>
            <div class="animate-right order-1-mobile">
                <div style="width: 64px; height: 64px; border-radius: 12px; background: rgba(8,28,58,0.1); color: #081C3A; display: flex; align-items: center; justify-content: center; margin-bottom: 2rem;">
                    <svg width="32" height="32" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" /></svg>
                </div>
                <h3 style="font-family: 'Cormorant Garamond', serif; font-size: 2.25rem; color: #081C3A; margin-bottom: 1rem; font-weight: 700;">{{ __('Agriculture & Food Systems') }}</h3>
                <p style="font-family: 'Inter', sans-serif; font-size: 0.95rem; color: #5E7590; line-height: 1.8; margin-bottom: 1.5rem;">
                    {{ __('From climate-smart farming to water security, we support LDC agriculture to become more productive, resilient, and low-emission.') }}
                </p>
                <ul style="list-style: none; padding: 0; margin: 0; font-family: 'Inter', sans-serif; font-size: 0.9rem; color: #162235;">
                    <li style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
                        <svg width="20" height="20" fill="none" stroke="#C8A04D" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        {{ __('Climate-smart farming techniques and resilient crops') }}
                    </li>
                    <li style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
                        <svg width="20" height="20" fill="none" stroke="#C8A04D" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        {{ __('Water security and sustainable irrigation solutions') }}
                    </li>
                    <li style="display: flex; align-items: center; gap: 0.75rem;">
                        <svg width="20" height="20" fill="none" stroke="#C8A04D" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        {{ __('Food systems transformation and supply chain resilience') }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- SERVICE 3: LOW CARBON ECONOMY DEVELOPMENT --}}
<section id="low-carbon" class="section-py" style="background: #F6F8FA; border-top: 1px solid #E0E6ED; border-bottom: 1px solid #E0E6ED;">
    <div class="container-ccp">
        <div class="about-grid" style="align-items: center;">
            <div class="animate-left">
                <div style="width: 64px; height: 64px; border-radius: 12px; background: #081C3A; color: #C8A04D; display: flex; align-items: center; justify-content: center; margin-bottom: 2rem;">
                    <svg width="32" height="32" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                </div>
                <h3 style="font-family: 'Cormorant Garamond', serif; font-size: 2.25rem; color: #081C3A; margin-bottom: 1rem; font-weight: 700;">{{ __('Low Carbon Economy Development') }}</h3>
                <p style="font-family: 'Inter', sans-serif; font-size: 0.95rem; color: #5E7590; line-height: 1.8; margin-bottom: 1.5rem;">
                    {{ __('We assist governments and NGOs to build roadmaps for renewable energy, energy efficiency, and green jobs that drive inclusive growth.') }}
                </p>
                <ul style="list-style: none; padding: 0; margin: 0; font-family: 'Inter', sans-serif; font-size: 0.9rem; color: #162235;">
                    <li style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
                        <svg width="20" height="20" fill="none" stroke="#C8A04D" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        {{ __('Renewable energy transition roadmaps for clean power') }}
                    </li>
                    <li style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
                        <svg width="20" height="20" fill="none" stroke="#C8A04D" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        {{ __('Green jobs creation and industrial decarbonization pathways') }}
                    </li>
                    <li style="display: flex; align-items: center; gap: 0.75rem;">
                        <svg width="20" height="20" fill="none" stroke="#C8A04D" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        {{ __('Energy efficiency policies and low-carbon infrastructure') }}
                    </li>
                </ul>
            </div>
            <div class="animate-right text-center">
                <img src="{{ asset('images/service-1.jpg') }}" alt="Low Carbon Economy" style="border-radius: 12px; box-shadow: 0 16px 40px rgba(8,28,58,0.1); width: 100%; max-width: 500px; margin: 0 auto;">
            </div>
        </div>
    </div>
</section>

{{-- SERVICE 4: CARBON CREDITS & CARBON TRADE --}}
<section id="carbon-markets" class="section-py">
    <div class="container-ccp">
        <div class="about-grid" style="align-items: center;">
            <div class="animate-left text-center order-2-mobile">
                <img src="{{ asset('images/project-2.jpg') }}" alt="Carbon Credits" style="border-radius: 12px; box-shadow: 0 16px 40px rgba(8,28,58,0.1); width: 100%; max-width: 500px; margin: 0 auto;">
            </div>
            <div class="animate-right order-1-mobile">
                <div style="width: 64px; height: 64px; border-radius: 12px; background: rgba(200,160,77,0.1); color: #C8A04D; display: flex; align-items: center; justify-content: center; margin-bottom: 2rem;">
                    <svg width="32" height="32" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" /></svg>
                </div>
                <h3 style="font-family: 'Cormorant Garamond', serif; font-size: 2.25rem; color: #081C3A; margin-bottom: 1rem; font-weight: 700;">{{ __('Carbon Credits & Carbon Trade') }}</h3>
                <p style="font-family: 'Inter', sans-serif; font-size: 0.95rem; color: #5E7590; line-height: 1.8; margin-bottom: 1.5rem;">
                    {{ __('End-to-end support: project identification, methodology, validation, MRV, and access to voluntary and compliance carbon markets.') }}
                </p>
                <ul style="list-style: none; padding: 0; margin: 0; font-family: 'Inter', sans-serif; font-size: 0.9rem; color: #162235;">
                    <li style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
                        <svg width="20" height="20" fill="none" stroke="#C8A04D" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        {{ __('Carbon credit project identification and methodology development') }}
                    </li>
                    <li style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
                        <svg width="20" height="20" fill="none" stroke="#C8A04D" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        {{ __('Validation, verification, and MRV framework setup') }}
                    </li>
                    <li style="display: flex; align-items: center; gap: 0.75rem;">
                        <svg width="20" height="20" fill="none" stroke="#C8A04D" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        {{ __('Access to voluntary and compliance carbon trading markets') }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- SERVICE 5: TECHNICAL ASSISTANCE --}}
<section id="technical-assistance" class="section-py" style="background: #F6F8FA; border-top: 1px solid #E0E6ED; border-bottom: 1px solid #E0E6ED;">
    <div class="container-ccp">
        <div class="about-grid" style="align-items: center;">
            <div class="animate-left">
                <div style="width: 64px; height: 64px; border-radius: 12px; background: rgba(8,28,58,0.1); color: #081C3A; display: flex; align-items: center; justify-content: center; margin-bottom: 2rem;">
                    <svg width="32" height="32" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                </div>
                <h3 style="font-family: 'Cormorant Garamond', serif; font-size: 2.25rem; color: #081C3A; margin-bottom: 1rem; font-weight: 700;">{{ __('Technical Assistance') }}</h3>
                <p style="font-family: 'Inter', sans-serif; font-size: 0.95rem; color: #5E7590; line-height: 1.8; margin-bottom: 1.5rem;">
                    {{ __('Project design, feasibility studies, policy alignment, monitoring and reporting. We build local capacity to deliver and scale.') }}
                </p>
                <ul style="list-style: none; padding: 0; margin: 0; font-family: 'Inter', sans-serif; font-size: 0.9rem; color: #162235;">
                    <li style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
                        <svg width="20" height="20" fill="none" stroke="#C8A04D" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        {{ __('Feasibility studies and bankable project design') }}
                    </li>
                    <li style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
                        <svg width="20" height="20" fill="none" stroke="#C8A04D" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        {{ __('Policy alignment and regulatory compliance support') }}
                    </li>
                    <li style="display: flex; align-items: center; gap: 0.75rem;">
                        <svg width="20" height="20" fill="none" stroke="#C8A04D" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        {{ __('Local institutional capacity building and skill transfer') }}
                    </li>
                </ul>
            </div>
            <div class="animate-right text-center">
                <img src="{{ asset('images/about-story.jpg') }}" alt="Technical Assistance" style="border-radius: 12px; box-shadow: 0 16px 40px rgba(8,28,58,0.1); width: 100%; max-width: 500px; margin: 0 auto;">
            </div>
        </div>
    </div>
</section>

{{-- SERVICE 6: FUNDRAISING & RESOURCE MOBILIZATION --}}
<section id="funding-finance" class="section-py" style="background: #081C3A; color: #FFFFFF;">
    <div class="container-ccp">
        <div class="about-grid" style="align-items: center;">
            <div class="animate-left text-center order-2-mobile">
                <img src="{{ asset('images/project-1.jpg') }}" alt="Funding & Resource Mobilization" style="border-radius: 12px; box-shadow: 0 16px 40px rgba(0,0,0,0.3); width: 100%; max-width: 500px; margin: 0 auto;">
            </div>
            <div class="animate-right order-1-mobile">
                <div style="width: 64px; height: 64px; border-radius: 12px; background: rgba(255,255,255,0.05); color: #C8A04D; display: flex; align-items: center; justify-content: center; margin-bottom: 2rem; border: 1px solid rgba(200,160,77,0.3);">
                    <svg width="32" height="32" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </div>
                <h3 style="font-family: 'Cormorant Garamond', serif; font-size: 2.25rem; color: #FFFFFF; margin-bottom: 1rem; font-weight: 700;">{{ __('Funding & Resource Mobilization') }}</h3>
                <p style="font-family: 'Inter', sans-serif; font-size: 0.95rem; color: rgba(255,255,255,0.7); line-height: 1.8; margin-bottom: 1.5rem;">
                    {{ __('We connect organizations in LDCs to GCF, GEF, Adaptation Fund, bilateral donors, and private investors. From concept note to full proposal.') }}
                </p>
                <ul style="list-style: none; padding: 0; margin: 0; font-family: 'Inter', sans-serif; font-size: 0.9rem; color: #FFFFFF;">
                    <li style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
                        <svg width="20" height="20" fill="none" stroke="#C8A04D" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        {{ __('Concept note and full proposal development for climate funds') }}
                    </li>
                    <li style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
                        <svg width="20" height="20" fill="none" stroke="#C8A04D" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        {{ __('Direct connections to GCF, GEF, Adaptation Fund, and bilateral donors') }}
                    </li>
                    <li style="display: flex; align-items: center; gap: 0.75rem;">
                        <svg width="20" height="20" fill="none" stroke="#C8A04D" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        {{ __('Private impact investor matching and blended finance structuring') }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- CALL TO ACTION --}}
<section class="section-py text-center">
    <div class="container-ccp">
        <h2 class="section-title">{{ __('Ready to Partner With Us?') }}</h2>
        <p class="section-lead" style="margin: 0 auto 2.5rem;">
            {{ __('If you are an organization in an LDC working on climate, resilience, agriculture, or carbon markets — we can help.') }}
        </p>
        <a href="{{ route('apply', ['locale' => $locale]) }}" class="btn btn-gold btn-lg">
            {{ __('Apply for Support') }}
        </a>
    </div>
</section>

@endsection

