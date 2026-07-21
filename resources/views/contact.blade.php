@extends('layouts.app')

@section('content')

{{-- PAGE HERO --}}
<section class="page-hero">
    <div class="animate-up">
        <span class="page-hero-eyebrow">{{ __('Get in Touch') }}</span>
        <h1 class="page-hero-title">{{ __('Contact Us') }}</h1>
        <p class="page-hero-subtitle">
            {{ __('Whether you are a potential partner, a media representative, or interested in our work, we look forward to hearing from you.') }}
        </p>
    </div>
</section>

{{-- BREADCRUMB --}}
<div class="breadcrumb">
    <a href="{{ route('home', ['locale' => $locale]) }}">{{ __('Home') }}</a>
    <span class="breadcrumb-sep">/</span>
    <span>{{ __('Contact Us') }}</span>
</div>

<section class="section-py">
    <div class="container-ccp">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 4rem;">
            
            {{-- Contact Form --}}
            <div class="animate-left">
                <h2 class="section-title" style="font-size: 2rem; margin-bottom: 1.5rem;">{{ __('Send a Message') }}</h2>
                <div style="background: #FFFFFF; padding: 2.5rem; border-radius: 12px; border: 1px solid #E0E6ED; box-shadow: 0 10px 30px rgba(8,28,58,0.05);">
                    @if(session('success'))
                        <div style="background: #ECFDF5; color: #059669; padding: 1rem 1.25rem; border-radius: 8px; border: 1px solid #10B981; font-family: 'Inter', sans-serif; font-size: 0.9rem; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.75rem;">
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('contact.send', ['locale' => $locale]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="name">{{ __('Full Name') }} <span style="color:#C8A04D;">*</span></label>
                            <input type="text" id="name" name="name" class="form-input" value="{{ old('name') }}" required>
                            @error('name')<p style="color:#DC2626; font-size:0.75rem; margin-top:0.25rem;">{{ $message }}</p>@enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="organization">{{ __('Organization') }} <span style="color:#C8A04D;">*</span></label>
                            <input type="text" id="organization" name="organization" class="form-input" value="{{ old('organization') }}" required>
                            @error('organization')<p style="color:#DC2626; font-size:0.75rem; margin-top:0.25rem;">{{ $message }}</p>@enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email">{{ __('Email Address') }} <span style="color:#C8A04D;">*</span></label>
                            <input type="email" id="email" name="email" class="form-input" value="{{ old('email') }}" required>
                            @error('email')<p style="color:#DC2626; font-size:0.75rem; margin-top:0.25rem;">{{ $message }}</p>@enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="phone">{{ __('Phone (Optional)') }}</label>
                            <input type="tel" id="phone" name="phone" class="form-input" value="{{ old('phone') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="country">{{ __('Country') }} <span style="color:#C8A04D;">*</span></label>
                            <input type="text" id="country" name="country" class="form-input" value="{{ old('country') }}" required>
                            @error('country')<p style="color:#DC2626; font-size:0.75rem; margin-top:0.25rem;">{{ $message }}</p>@enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="message">{{ __('Your Message') }} <span style="color:#C8A04D;">*</span></label>
                            <textarea id="message" name="message" class="form-textarea" required>{{ old('message') }}</textarea>
                            @error('message')<p style="color:#DC2626; font-size:0.75rem; margin-top:0.25rem;">{{ $message }}</p>@enderror
                        </div>
                        <button type="submit" class="btn btn-navy w-full" style="width: 100%; justify-content: center;">
                            {{ __('Send Message') }}
                        </button>
                    </form>
                </div>
            </div>
            
            {{-- Contact Info --}}
            <div class="animate-right">
                <h2 class="section-title" style="font-size: 2rem; margin-bottom: 1.5rem;">{{ __('Global Presence') }}</h2>
                
                <div style="margin-bottom: 2.5rem; background: #F6F8FA; padding: 2rem; border-radius: 12px; border: 1px solid #E0E6ED;">
                    <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1rem;">
                        <div style="width: 40px; height: 40px; border-radius: 50%; background: rgba(200,160,77,0.15); color: #C8A04D; display: flex; align-items: center; justify-content: center;">
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <h4 style="font-family: 'Inter', sans-serif; font-size: 1.1rem; font-weight: 700; color: #081C3A; margin: 0;">{{ __('Registered & Working Globally') }}</h4>
                    </div>
                    <p style="font-family: 'Inter', sans-serif; font-size: 0.95rem; color: #5E7590; line-height: 1.7; margin-bottom: 1.25rem;">
                        {{ __('The Climate Catalyst Prize is registered in the USA and operates globally with a focus on projects in Least Developed Countries across Africa, Asia, Latin America, the Caribbean, and the Pacific.') }}
                    </p>
                    <div style="display: flex; align-items: center; gap: 0.75rem; font-family: 'Inter', sans-serif; font-size: 0.95rem; color: #162235;">
                        <svg width="18" height="18" fill="none" stroke="#C8A04D" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <a href="mailto:contact@climatecatalystprize.org" style="color: #081C3A; font-weight: 600;">contact@climatecatalystprize.org</a>
                    </div>
                </div>

                <div style="padding: 2rem; background: #081C3A; border-radius: 12px; color: #FFFFFF;">
                    <h4 style="font-family: 'Inter', sans-serif; font-size: 1.1rem; font-weight: 700; margin-bottom: 0.5rem; color: #C8A04D;">{{ __('Partner With Us') }}</h4>
                    <p style="font-family: 'Inter', sans-serif; font-size: 0.88rem; color: rgba(255,255,255,0.75); line-height: 1.6; margin-bottom: 1.5rem;">
                        {{ __('If you are an organization in an LDC working on climate, resilience, agriculture, or carbon markets — we can help. Let’s build projects that deliver adaptation, mitigation, and sustainable development.') }}
                    </p>
                    <a href="{{ route('apply', ['locale' => $locale]) }}" class="btn btn-gold btn-sm">
                        {{ __('Apply for Support') }}
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection

