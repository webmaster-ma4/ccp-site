@extends('layouts.app')

@section('content')

{{-- PAGE HERO --}}
<section class="page-hero">
    <div class="animate-up">
        <span class="page-hero-eyebrow">{{ __('About CCP') }}</span>
        <h1 class="page-hero-title">{{ __('Who We Are') }}</h1>
        <p class="page-hero-subtitle">
            {{ __('The Climate Catalyst Prize is a global NGO dedicated to turning climate ambition into action in the world’s most vulnerable countries. We provide technical expertise, funding pathways, and catalytic programs that help LDCs adapt, grow, and lead in the low-carbon transition.') }}
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
                <span class="eyebrow">{{ __('Our Genesis') }}</span>
                <h2 class="section-title">{{ __('The Story of Climate Catalyst Prize') }}</h2>
                <div style="font-family: 'Inter', sans-serif; font-size: 0.95rem; color: #5E7590; line-height: 1.8;">
                    <p style="margin-bottom: 1.25rem;">
                        {{ __('The Climate Catalyst Prize was founded on a simple belief: the countries facing the greatest climate risks should have the greatest access to solutions, finance, and technical support.') }}
                    </p>
                    <p style="margin-bottom: 1.25rem;">
                        {{ __('We focus on Least Developed Countries — where climate change hits first and hardest, but where innovation and resilience also run deepest. CCP works as a bridge between LDC governments, local NGOs, municipalities, and global climate finance.') }}
                    </p>
                    <p style="margin-bottom: 1.25rem; font-weight: 600; color: #081C3A;">
                        {{ __('We don’t just write reports. We catalyze. That means turning plans into funded projects. Turning farms into climate-smart systems. Turning carbon potential into real revenue. Turning adaptation ideas into infrastructure that protects lives.') }}
                    </p>
                    <p>
                        {{ __('From water security and sustainable agriculture to carbon markets and low-carbon energy, we provide the technical assistance, partnerships, and funding pathways needed to transform climate ambition into measurable impact.') }}
                    </p>
                </div>
            </div>
            <div class="animate-right">
                <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 20px 40px rgba(8,28,58,0.1); margin-bottom: 1.5rem;">
                    <img src="{{ asset('images/about-story.jpg') }}" alt="CCP field work" style="width: 100%; height: auto; display: block;">
                </div>
                <div style="padding: 1.5rem; background: #081C3A; color: #FFFFFF; border-radius: 12px; border-left: 4px solid #C8A04D;">
                    <div style="font-family: 'Cormorant Garamond', serif; font-size: 1.35rem; font-style: italic; color: #C8A04D; margin-bottom: 0.5rem;">
                        {{ __('Our Promise') }}
                    </div>
                    <p style="font-family: 'Inter', sans-serif; font-size: 0.95rem; margin: 0; color: rgba(255,255,255,0.9);">
                        {{ __('Practical support, delivered with and for LDCs.') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- MISSION & PURPOSE --}}
<section class="section-py" style="background: #F6F8FA;">
    <div class="container-ccp">
        <div style="max-width: 900px; margin: 0 auto; background: #FFFFFF; padding: 3.5rem; border-radius: 16px; border: 1px solid #E0E6ED; box-shadow: 0 10px 30px rgba(8,28,58,0.04);" class="animate-up">
            <div style="width: 60px; height: 60px; border-radius: 50%; background: rgba(200,160,77,0.1); color: #C8A04D; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                <svg width="30" height="30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            </div>
            <span class="eyebrow" style="display: block; text-align: center;">{{ __('Our Mission') }}</span>
            <h3 style="font-family: 'Cormorant Garamond', serif; font-size: 2.5rem; color: #081C3A; text-align: center; margin-bottom: 1.5rem; font-weight: 700;">
                {{ __('Catalyzing Climate Solutions. Transforming Futures.') }}
            </h3>
            <p style="font-family: 'Inter', sans-serif; font-size: 1.1rem; color: #5E7590; text-align: center; line-height: 1.8; margin: 0;">
                {{ __('To catalyze climate solutions in LDCs by providing the tools, finance, and partnerships needed to transform futures.') }}
            </p>
        </div>
    </div>
</section>

{{-- OUR APPROACH (4 STEPS) --}}
<section class="section-py">
    <div class="container-ccp">
        <div class="text-center" style="margin-bottom: 3.5rem;">
            <span class="eyebrow">{{ __('Methodology') }}</span>
            <h2 class="section-title">{{ __('Our Approach') }}</h2>
            <p class="section-lead" style="margin: 0 auto;">
                {{ __('The Climate Catalyst Prize exists because LDCs need more than pledges — they need partners, tools, and capital.') }}
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 1.5rem;">
            
            {{-- Pillar 1 --}}
            <div style="background: #FFFFFF; padding: 2rem; border-radius: 12px; border: 1px solid #E0E6ED; position: relative;" class="animate-up delay-1">
                <div style="font-family: 'Cormorant Garamond', serif; font-size: 2.5rem; font-weight: 700; color: #C8A04D; margin-bottom: 0.5rem;">01</div>
                <h4 style="font-family: 'Inter', sans-serif; font-size: 1.2rem; font-weight: 700; color: #081C3A; margin-bottom: 0.5rem;">{{ __('Catalyze') }}</h4>
                <p style="font-family: 'Inter', sans-serif; font-size: 0.9rem; color: #5E7590; line-height: 1.6; margin: 0;">
                    {{ __('Identify high-impact opportunities in vulnerable communities and sectors.') }}
                </p>
            </div>

            {{-- Pillar 2 --}}
            <div style="background: #FFFFFF; padding: 2rem; border-radius: 12px; border: 1px solid #E0E6ED; position: relative;" class="animate-up delay-2">
                <div style="font-family: 'Cormorant Garamond', serif; font-size: 2.5rem; font-weight: 700; color: #C8A04D; margin-bottom: 0.5rem;">02</div>
                <h4 style="font-family: 'Inter', sans-serif; font-size: 1.2rem; font-weight: 700; color: #081C3A; margin-bottom: 0.5rem;">{{ __('Support') }}</h4>
                <p style="font-family: 'Inter', sans-serif; font-size: 0.9rem; color: #5E7590; line-height: 1.6; margin: 0;">
                    {{ __('Provide technical assistance, feasibility studies, MRV, and capacity building.') }}
                </p>
            </div>

            {{-- Pillar 3 --}}
            <div style="background: #FFFFFF; padding: 2rem; border-radius: 12px; border: 1px solid #E0E6ED; position: relative;" class="animate-up delay-3">
                <div style="font-family: 'Cormorant Garamond', serif; font-size: 2.5rem; font-weight: 700; color: #C8A04D; margin-bottom: 0.5rem;">03</div>
                <h4 style="font-family: 'Inter', sans-serif; font-size: 1.2rem; font-weight: 700; color: #081C3A; margin-bottom: 0.5rem;">{{ __('Finance') }}</h4>
                <p style="font-family: 'Inter', sans-serif; font-size: 0.9rem; color: #5E7590; line-height: 1.6; margin: 0;">
                    {{ __('Unlock international climate funds (GCF, GEF), grants, and carbon revenue.') }}
                </p>
            </div>

            {{-- Pillar 4 --}}
            <div style="background: #FFFFFF; padding: 2rem; border-radius: 12px; border: 1px solid #E0E6ED; position: relative;" class="animate-up delay-4">
                <div style="font-family: 'Cormorant Garamond', serif; font-size: 2.5rem; font-weight: 700; color: #C8A04D; margin-bottom: 0.5rem;">04</div>
                <h4 style="font-family: 'Inter', sans-serif; font-size: 1.2rem; font-weight: 700; color: #081C3A; margin-bottom: 0.5rem;">{{ __('Scale') }}</h4>
                <p style="font-family: 'Inter', sans-serif; font-size: 0.9rem; color: #5E7590; line-height: 1.6; margin: 0;">
                    {{ __('Replicate successful models across countries and regions for maximum resilience.') }}
                </p>
            </div>

        </div>
    </div>
</section>

{{-- WHO WE WORK WITH --}}
<section class="section-py" style="background: #F6F8FA;">
    <div class="container-ccp">
        <div class="text-center" style="margin-bottom: 3.5rem;">
            <span class="eyebrow">{{ __('Partnership') }}</span>
            <h2 class="section-title">{{ __('Who We Work With') }}</h2>
            <p class="section-lead" style="margin: 0 auto;">
                {{ __('We work directly with key stakeholders across Least Developed Countries to turn climate plans into funded, measurable projects.') }}
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem;">
            
            <div style="background: #FFFFFF; padding: 1.75rem; border-radius: 10px; border: 1px solid #E0E6ED; display: flex; align-items: center; gap: 1.25rem;">
                <div style="width: 48px; height: 48px; border-radius: 8px; background: rgba(8,28,58,0.06); color: #081C3A; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                </div>
                <div>
                    <h4 style="font-family: 'Inter', sans-serif; font-size: 1rem; font-weight: 700; color: #081C3A; margin: 0 0 0.25rem;">{{ __('NGOs & Community Groups') }}</h4>
                    <span style="font-size: 0.82rem; color: #5E7590;">{{ __('Local non-governmental & community organizations') }}</span>
                </div>
            </div>

            <div style="background: #FFFFFF; padding: 1.75rem; border-radius: 10px; border: 1px solid #E0E6ED; display: flex; align-items: center; gap: 1.25rem;">
                <div style="width: 48px; height: 48px; border-radius: 8px; background: rgba(8,28,58,0.06); color: #081C3A; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <div>
                    <h4 style="font-family: 'Inter', sans-serif; font-size: 1rem; font-weight: 700; color: #081C3A; margin: 0 0 0.25rem;">{{ __('Municipalities & City Networks') }}</h4>
                    <span style="font-size: 0.82rem; color: #5E7590;">{{ __('Urban centers & local governments building resilience') }}</span>
                </div>
            </div>

            <div style="background: #FFFFFF; padding: 1.75rem; border-radius: 10px; border: 1px solid #E0E6ED; display: flex; align-items: center; gap: 1.25rem;">
                <div style="width: 48px; height: 48px; border-radius: 8px; background: rgba(8,28,58,0.06); color: #081C3A; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"/></svg>
                </div>
                <div>
                    <h4 style="font-family: 'Inter', sans-serif; font-size: 1rem; font-weight: 700; color: #081C3A; margin: 0 0 0.25rem;">{{ __('National Governments in LDCs') }}</h4>
                    <span style="font-size: 0.82rem; color: #5E7590;">{{ __('National ministries & environmental agencies') }}</span>
                </div>
            </div>

            <div style="background: #FFFFFF; padding: 1.75rem; border-radius: 10px; border: 1px solid #E0E6ED; display: flex; align-items: center; gap: 1.25rem;">
                <div style="width: 48px; height: 48px; border-radius: 8px; background: rgba(8,28,58,0.06); color: #081C3A; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <div>
                    <h4 style="font-family: 'Inter', sans-serif; font-size: 1rem; font-weight: 700; color: #081C3A; margin: 0 0 0.25rem;">{{ __('Development Partners & Private Sector') }}</h4>
                    <span style="font-size: 0.82rem; color: #5E7590;">{{ __('Multilateral agencies & impact investors') }}</span>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- LEADERSHIP & CORE TEAM --}}
<section class="section-py">
    <div class="container-ccp">
        <div class="text-center" style="margin-bottom: 3.5rem;">
            <span class="eyebrow">{{ __('Leadership') }}</span>
            <h2 class="section-title">{{ __('Our Executive Team & Experts') }}</h2>
            <p class="section-lead" style="margin: 0 auto;">
                {{ __('Guided by global leaders in climate finance, carbon markets, environmental policy, and LDC resilience.') }}
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 2rem;">
            
            {{-- Member 1 --}}
            <div style="background: #FFFFFF; border-radius: 12px; border: 1px solid #E0E6ED; overflow: hidden; box-shadow: 0 10px 25px rgba(8,28,58,0.03);" class="animate-up delay-1">
                <div style="aspect-ratio: 4/3; overflow: hidden; background: #081C3A;">
                    <img src="{{ asset('images/team-1.jpg') }}" alt="Dr. Amina Sow" style="width: 100%; height: 100%; object-fit: cover; object-position: top center;">
                </div>
                <div style="padding: 1.5rem;">
                    <h4 style="font-family: 'Inter', sans-serif; font-size: 1.15rem; font-weight: 700; color: #081C3A; margin: 0 0 0.25rem;">Dr. Amina Sow</h4>
                    <div style="font-family: 'Inter', sans-serif; font-size: 0.8rem; font-weight: 600; color: #C8A04D; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.75rem;">
                        {{ __('Executive Director & Co-Founder') }}
                    </div>
                    <p style="font-family: 'Inter', sans-serif; font-size: 0.85rem; color: #5E7590; line-height: 1.6; margin: 0;">
                        {{ __('20+ years of experience leading international climate finance, UN climate negotiations, and resilience programs in Africa and Asia-Pacific.') }}
                    </p>
                </div>
            </div>

            {{-- Member 2 --}}
            <div style="background: #FFFFFF; border-radius: 12px; border: 1px solid #E0E6ED; overflow: hidden; box-shadow: 0 10px 25px rgba(8,28,58,0.03);" class="animate-up delay-2">
                <div style="aspect-ratio: 4/3; overflow: hidden; background: #081C3A;">
                    <img src="{{ asset('images/team-2.jpg') }}" alt="Marcus Vance" style="width: 100%; height: 100%; object-fit: cover; object-position: top center;">
                </div>
                <div style="padding: 1.5rem;">
                    <h4 style="font-family: 'Inter', sans-serif; font-size: 1.15rem; font-weight: 700; color: #081C3A; margin: 0 0 0.25rem;">Marcus Vance</h4>
                    <div style="font-family: 'Inter', sans-serif; font-size: 0.8rem; font-weight: 600; color: #C8A04D; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.75rem;">
                        {{ __('Head of Climate Finance & Carbon Markets') }}
                    </div>
                    <p style="font-family: 'Inter', sans-serif; font-size: 0.85rem; color: #5E7590; line-height: 1.6; margin: 0;">
                        {{ __('Expert in Article 6 bilateral agreements, voluntary carbon markets, and structuring blended finance packages for LDC initiatives.') }}
                    </p>
                </div>
            </div>

            {{-- Member 3 --}}
            <div style="background: #FFFFFF; border-radius: 12px; border: 1px solid #E0E6ED; overflow: hidden; box-shadow: 0 10px 25px rgba(8,28,58,0.03);" class="animate-up delay-3">
                <div style="aspect-ratio: 4/3; overflow: hidden; background: #081C3A;">
                    <img src="{{ asset('images/team-3.jpg') }}" alt="Dr. Sophia Chen" style="width: 100%; height: 100%; object-fit: cover; object-position: top center;">
                </div>
                <div style="padding: 1.5rem;">
                    <h4 style="font-family: 'Inter', sans-serif; font-size: 1.15rem; font-weight: 700; color: #081C3A; margin: 0 0 0.25rem;">Dr. Sophia Chen</h4>
                    <div style="font-family: 'Inter', sans-serif; font-size: 0.8rem; font-weight: 600; color: #C8A04D; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.75rem;">
                        {{ __('Director of Technical Assistance & MRV') }}
                    </div>
                    <p style="font-family: 'Inter', sans-serif; font-size: 0.85rem; color: #5E7590; line-height: 1.6; margin: 0;">
                        {{ __('Specialist in climate-smart agriculture, baseline methodology setup, environmental monitoring, and project feasibility design.') }}
                    </p>
                </div>
            </div>

            {{-- Member 4 --}}
            <div style="background: #FFFFFF; border-radius: 12px; border: 1px solid #E0E6ED; overflow: hidden; box-shadow: 0 10px 25px rgba(8,28,58,0.03);" class="animate-up delay-4">
                <div style="aspect-ratio: 4/3; overflow: hidden; background: #081C3A;">
                    <img src="{{ asset('images/team-4.jpg') }}" alt="Kwesi Mensah" style="width: 100%; height: 100%; object-fit: cover; object-position: top center;">
                </div>
                <div style="padding: 1.5rem;">
                    <h4 style="font-family: 'Inter', sans-serif; font-size: 1.15rem; font-weight: 700; color: #081C3A; margin: 0 0 0.25rem;">Kwesi Mensah</h4>
                    <div style="font-family: 'Inter', sans-serif; font-size: 0.8rem; font-weight: 600; color: #C8A04D; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.75rem;">
                        {{ __('Regional Director - LDC Partnerships') }}
                    </div>
                    <p style="font-family: 'Inter', sans-serif; font-size: 0.85rem; color: #5E7590; line-height: 1.6; margin: 0;">
                        {{ __('Over 15 years driving community-based climate adaptation, municipal resilience planning, and partnerships across 30+ LDCs.') }}
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- PARTNER WITH US CTA --}}
<section class="section-py text-center" style="background: #081C3A; color: #FFFFFF;">
    <div class="container-ccp">
        <span class="eyebrow" style="color: #C8A04D;">{{ __('Partner With Us') }}</span>
        <h2 class="section-title" style="color: #FFFFFF; max-width: 800px; margin: 0 auto 1.5rem;">
            {{ __('Let’s build projects that deliver adaptation, mitigation, and sustainable development.') }}
        </h2>
        <p class="section-lead" style="color: rgba(255,255,255,0.7); max-width: 700px; margin: 0 auto 2.5rem;">
            {{ __('If you are an organization in an LDC working on climate, resilience, agriculture, or carbon markets — we can help.') }}
        </p>
        <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
            <a href="{{ route('contact', ['locale' => $locale]) }}" class="btn btn-gold btn-lg">
                {{ __('Partner With Us') }}
            </a>
            <a href="{{ route('apply', ['locale' => $locale]) }}" class="btn btn-outline-white btn-lg">
                {{ __('Apply for Support') }}
            </a>
        </div>
    </div>
</section>

@endsection

