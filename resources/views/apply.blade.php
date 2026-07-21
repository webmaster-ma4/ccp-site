@extends('layouts.app')

@section('content')

{{-- PAGE HERO --}}
<section class="page-hero">
    <div class="animate-up">
        <span class="page-hero-eyebrow">{{ __('Apply') }}</span>
        <h1 class="page-hero-title">{{ __('Project Funding Portal') }}</h1>
        <p class="page-hero-subtitle">
            {{ __('Submit your climate initiative for technical assistance, structuring, and capital matching.') }}
        </p>
    </div>
</section>

{{-- BREADCRUMB --}}
<div class="breadcrumb">
    <a href="{{ route('home', ['locale' => $locale]) }}">{{ __('Home') }}</a>
    <span class="breadcrumb-sep">/</span>
    <span>{{ __('Apply for Funding') }}</span>
</div>

<section class="section-py" style="background: #F6F8FA;">
    <div class="container-ccp">
        
        <div style="max-width: 800px; margin: 0 auto; background: #FFFFFF; border-radius: 12px; border: 1px solid #E0E6ED; box-shadow: 0 16px 40px rgba(8,28,58,0.06); padding: 3.5rem;">
            <div class="text-center" style="margin-bottom: 3rem;">
                <h2 class="section-title" style="font-size: 2rem; margin-bottom: 1rem;">{{ __('Initial Screening Application') }}</h2>
                <p style="font-family: 'Inter', sans-serif; font-size: 0.95rem; color: #5E7590; line-height: 1.6;">
                    {{ __('Please provide a high-level overview of your project. Our technical committee reviews all submissions within 14 business days.') }}
                </p>
            </div>

            <form action="#" method="POST">
                
                {{-- STEP 1: ORGANIZATION --}}
                <div style="margin-bottom: 2.5rem;">
                    <h4 style="font-family: 'Inter', sans-serif; font-size: 0.8rem; font-weight: 800; color: #C8A04D; text-transform: uppercase; letter-spacing: 0.1em; border-bottom: 1px solid #EEF1F5; padding-bottom: 0.5rem; margin-bottom: 1.5rem;">
                        {{ __('1. Organization Details') }}
                    </h4>
                    
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                        <div class="form-group" style="margin-bottom: 0;">
                            <label class="form-label" for="org_name">{{ __('Organization Name') }}</label>
                            <input type="text" id="org_name" name="org_name" class="form-input" required>
                        </div>
                        <div class="form-group" style="margin-bottom: 0;">
                            <label class="form-label" for="org_type">{{ __('Type of Entity') }}</label>
                            <select id="org_type" name="org_type" class="form-select" required>
                                <option value="">{{ __('Select type...') }}</option>
                                <option value="government">{{ __('Government Agency / Ministry') }}</option>
                                <option value="private">{{ __('Private Sector Company') }}</option>
                                <option value="ngo">{{ __('NGO / Non-Profit') }}</option>
                            </select>
                        </div>
                    </div>
                    
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                        <div class="form-group" style="margin-bottom: 0;">
                            <label class="form-label" for="contact_name">{{ __('Primary Contact Name') }}</label>
                            <input type="text" id="contact_name" name="contact_name" class="form-input" required>
                        </div>
                        <div class="form-group" style="margin-bottom: 0;">
                            <label class="form-label" for="contact_email">{{ __('Official Email') }}</label>
                            <input type="email" id="contact_email" name="contact_email" class="form-input" required>
                        </div>
                    </div>
                </div>

                {{-- STEP 2: PROJECT --}}
                <div style="margin-bottom: 2.5rem;">
                    <h4 style="font-family: 'Inter', sans-serif; font-size: 0.8rem; font-weight: 800; color: #C8A04D; text-transform: uppercase; letter-spacing: 0.1em; border-bottom: 1px solid #EEF1F5; padding-bottom: 0.5rem; margin-bottom: 1.5rem;">
                        {{ __('2. Project Overview') }}
                    </h4>
                    
                    <div class="form-group">
                        <label class="form-label" for="project_title">{{ __('Project Title') }}</label>
                        <input type="text" id="project_title" name="project_title" class="form-input" required>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                        <div class="form-group" style="margin-bottom: 0;">
                            <label class="form-label" for="country">{{ __('Target Country (LDC)') }}</label>
                            <select id="country" name="country" class="form-select" required>
                                <option value="">{{ __('Select LDC...') }}</option>
                                <option value="sn">Senegal</option>
                                <option value="rw">Rwanda</option>
                                <option value="bd">Bangladesh</option>
                                <option value="mg">Madagascar</option>
                                <option value="other">{{ __('Other LDC') }}</option>
                            </select>
                        </div>
                        <div class="form-group" style="margin-bottom: 0;">
                            <label class="form-label" for="sector">{{ __('Primary Sector') }}</label>
                            <select id="sector" name="sector" class="form-select" required>
                                <option value="">{{ __('Select sector...') }}</option>
                                <option value="energy">{{ __('Renewable Energy / Energy Access') }}</option>
                                <option value="agriculture">{{ __('Sustainable Agriculture / Forestry') }}</option>
                                <option value="infrastructure">{{ __('Resilient Infrastructure / Water') }}</option>
                                <option value="carbon">{{ __('Carbon Market Development') }}</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="funding">{{ __('Estimated Funding Required (USD)') }}</label>
                        <select id="funding" name="funding" class="form-select" required>
                            <option value="">{{ __('Select range...') }}</option>
                            <option value="under-1m">{{ __('Under $1 Million') }}</option>
                            <option value="1m-5m">{{ __('$1M - $5M') }}</option>
                            <option value="5m-15m">{{ __('$5M - $15M') }}</option>
                            <option value="over-15m">{{ __('Over $15 Million') }}</option>
                        </select>
                    </div>
                    
                    <div class="form-group" style="margin-bottom: 0;">
                        <label class="form-label" for="description">{{ __('Executive Summary (Max 500 words)') }}</label>
                        <textarea id="description" name="description" class="form-textarea" placeholder="{{ __('Describe the problem, proposed solution, and expected climate impact...') }}" required></textarea>
                    </div>
                </div>

                {{-- SUBMIT --}}
                <div style="background: rgba(200,160,77,0.05); padding: 1.5rem; border-radius: 8px; border: 1px solid rgba(200,160,77,0.2); margin-bottom: 2.5rem; font-family: 'Inter', sans-serif; font-size: 0.85rem; color: #5E7590; line-height: 1.6;">
                    <strong>{{ __('Note:') }}</strong> {{ __('If your project passes the initial screening, you will be invited to submit a full technical proposal along with financial models and ESG frameworks.') }}
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-gold btn-lg w-full" style="width: 100%; justify-content: center;">
                        {{ __('Submit Project for Screening') }}
                    </button>
                </div>
                
            </form>
        </div>

    </div>
</section>

@endsection
