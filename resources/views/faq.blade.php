@extends('layouts.app')

@section('content')

{{-- PAGE HERO --}}
<section class="page-hero">
    <div class="animate-up">
        <span class="page-hero-eyebrow">{{ __('Resources') }}</span>
        <h1 class="page-hero-title">{{ __('Frequently Asked Questions') }}</h1>
        <p class="page-hero-subtitle">
            {{ __('Find answers about our funding criteria, application process, and technical assistance programs.') }}
        </p>
    </div>
</section>

{{-- BREADCRUMB --}}
<div class="breadcrumb">
    <a href="{{ route('home', ['locale' => $locale]) }}">{{ __('Home') }}</a>
    <span class="breadcrumb-sep">/</span>
    <span>{{ __('FAQ') }}</span>
</div>

<section class="section-py" style="background: #FFFFFF;">
    <div class="container-ccp">
        
        <div style="max-width: 800px; margin: 0 auto;">
            
            <h3 style="font-family: 'Cormorant Garamond', serif; font-size: 2rem; color: #081C3A; margin-bottom: 2rem;">{{ __('Funding & Eligibility') }}</h3>
            
            <div style="border-top: 1px solid #EEF1F5;">
                
                {{-- FAQ 1 --}}
                <div class="faq-item">
                    <div class="faq-question">
                        <span class="faq-question-text">{{ __('Which countries are eligible for CCP support?') }}</span>
                        <div class="faq-icon"><svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg></div>
                    </div>
                    <div class="faq-answer">
                        {{ __('We exclusively support projects located within the 46 countries currently classified as Least Developed Countries (LDCs) by the United Nations. Our mandate is to direct climate finance to the most vulnerable nations with the least capacity to adapt.') }}
                    </div>
                </div>
                
                {{-- FAQ 2 --}}
                <div class="faq-item">
                    <div class="faq-question">
                        <span class="faq-question-text">{{ __('What types of organizations can apply?') }}</span>
                        <div class="faq-icon"><svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg></div>
                    </div>
                    <div class="faq-answer">
                        {{ __('We accept applications from national and sub-national government agencies in LDCs, private sector project developers, and established non-governmental organizations (NGOs) that have a proven track record of project execution in the target country.') }}
                    </div>
                </div>
                
                {{-- FAQ 3 --}}
                <div class="faq-item">
                    <div class="faq-question">
                        <span class="faq-question-text">{{ __('What is the typical funding size for a CCP project?') }}</span>
                        <div class="faq-icon"><svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg></div>
                    </div>
                    <div class="faq-answer">
                        {{ __('While we do provide early-stage grants for project preparation (typically $50k - $250k), our primary role is structuring larger projects for international capital matching. These structured projects generally range from $5 Million to $50 Million in total capital requirements.') }}
                    </div>
                </div>

            </div>
            
            <h3 style="font-family: 'Cormorant Garamond', serif; font-size: 2rem; color: #081C3A; margin: 4rem 0 2rem;">{{ __('Application Process') }}</h3>
            
            <div style="border-top: 1px solid #EEF1F5;">
                
                {{-- FAQ 4 --}}
                <div class="faq-item">
                    <div class="faq-question">
                        <span class="faq-question-text">{{ __('How long does the review process take?') }}</span>
                        <div class="faq-icon"><svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg></div>
                    </div>
                    <div class="faq-answer">
                        {{ __('Initial screening applications are reviewed by our technical committee within 14 business days. If selected to move forward, the full proposal and due diligence phase typically takes 3 to 6 months depending on the project\'s complexity.') }}
                    </div>
                </div>
                
                {{-- FAQ 5 --}}
                <div class="faq-item">
                    <div class="faq-question">
                        <span class="faq-question-text">{{ __('Do you require co-financing?') }}</span>
                        <div class="faq-icon"><svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg></div>
                    </div>
                    <div class="faq-answer">
                        {{ __('For project preparation facilities, co-financing is encouraged but not strictly required. However, for full project implementation, demonstrating government or private sector co-investment significantly strengthens the bankability of the proposal when presenting to international funds.') }}
                    </div>
                </div>

            </div>
            
            <div style="margin-top: 4rem; padding: 2rem; background: #F6F8FA; border-radius: 12px; text-align: center; border: 1px solid #E0E6ED;">
                <h4 style="font-family: 'Inter', sans-serif; font-size: 1.1rem; font-weight: 700; color: #081C3A; margin-bottom: 0.5rem;">{{ __('Still have questions?') }}</h4>
                <p style="font-family: 'Inter', sans-serif; font-size: 0.9rem; color: #5E7590; margin-bottom: 1.5rem;">
                    {{ __('Our team is available to help clarify our guidelines.') }}
                </p>
                <a href="{{ route('contact', ['locale' => $locale]) }}" class="btn btn-outline-navy">
                    {{ __('Contact Support') }}
                </a>
            </div>

        </div>
    </div>
</section>

@endsection
