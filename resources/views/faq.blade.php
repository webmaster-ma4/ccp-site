@extends('layouts.app')

@section('content')

{{-- PAGE HERO --}}
<section class="page-hero">
    <div class="animate-up">
        <span class="page-hero-eyebrow">{{ __('Resources') }}</span>
        <h1 class="page-hero-title">{{ __('Frequently Asked Questions') }}</h1>
        <p class="page-hero-subtitle">
            {{ __('Clear answers to help you understand our mandate, services, eligibility, and partnership approach.') }}
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
        
        <div style="max-width: 840px; margin: 0 auto;">
            
            <div style="border-top: 1px solid #EEF1F5;">
                
                {{-- FAQ 1 --}}
                <div class="faq-item">
                    <div class="faq-question">
                        <span class="faq-question-text">{{ __('What is the Climate Catalyst Prize?') }}</span>
                        <div class="faq-icon"><svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg></div>
                    </div>
                    <div class="faq-answer">
                        {{ __('CCP is an international NGO dedicated to supporting Least Developed Countries to build climate resilience, transition to low-carbon economies, and access climate finance and carbon markets.') }}
                    </div>
                </div>
                
                {{-- FAQ 2 --}}
                <div class="faq-item">
                    <div class="faq-question">
                        <span class="faq-question-text">{{ __('Who do you work with?') }}</span>
                        <div class="faq-icon"><svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg></div>
                    </div>
                    <div class="faq-answer">
                        {{ __('We partner with LDC national governments, municipalities, NGOs, community organizations, and development partners to design and deliver climate projects.') }}
                    </div>
                </div>
                
                {{-- FAQ 3 --}}
                <div class="faq-item">
                    <div class="faq-question">
                        <span class="faq-question-text">{{ __('What services does CCP provide?') }}</span>
                        <div class="faq-icon"><svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg></div>
                    </div>
                    <div class="faq-answer">
                        <p style="margin-bottom: 0.75rem;">{{ __('We provide 6 core areas:') }}</p>
                        <ul style="list-style: disc; padding-left: 1.25rem; margin: 0; line-height: 1.8;">
                            <li>{{ __('Climate Resilience & Adaptation planning') }}</li>
                            <li>{{ __('Sustainable Agriculture & Water Security') }}</li>
                            <li>{{ __('Low Carbon Economy development') }}</li>
                            <li>{{ __('Carbon Credits development and trade') }}</li>
                            <li>{{ __('Technical Assistance for project design and MRV') }}</li>
                            <li>{{ __('Fundraising and access to climate finance') }}</li>
                        </ul>
                    </div>
                </div>

                {{-- FAQ 4 --}}
                <div class="faq-item">
                    <div class="faq-question">
                        <span class="faq-question-text">{{ __('Do you only work in LDCs?') }}</span>
                        <div class="faq-icon"><svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg></div>
                    </div>
                    <div class="faq-answer">
                        {{ __('Yes. Our mandate is focused exclusively on Least Developed Countries as defined by the United Nations. This is where support is needed most.') }}
                    </div>
                </div>

                {{-- FAQ 5 --}}
                <div class="faq-item">
                    <div class="faq-question">
                        <span class="faq-question-text">{{ __('How does CCP help with carbon credits?') }}</span>
                        <div class="faq-icon"><svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg></div>
                    </div>
                    <div class="faq-answer">
                        {{ __('We support the full lifecycle: project identification, methodology selection, validation, MRV setup, and market access. Our goal is to help LDCs generate revenue from their climate action.') }}
                    </div>
                </div>

                {{-- FAQ 6 --}}
                <div class="faq-item">
                    <div class="faq-question">
                        <span class="faq-question-text">{{ __('How can my organization partner with CCP?') }}</span>
                        <div class="faq-icon"><svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg></div>
                    </div>
                    <div class="faq-answer">
                        {{ __('If you are an NGO, government, or community group in an LDC working on climate, adaptation, or sustainability, reach out to us. We offer technical assistance and help connect you to funding.') }}
                    </div>
                </div>

                {{-- FAQ 7 --}}
                <div class="faq-item">
                    <div class="faq-question">
                        <span class="faq-question-text">{{ __('How is CCP funded?') }}</span>
                        <div class="faq-icon"><svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg></div>
                    </div>
                    <div class="faq-answer">
                        {{ __('CCP is funded through grants, philanthropic donations, project fees, and partnerships with development agencies and the private sector.') }}
                    </div>
                </div>

                {{-- FAQ 8 --}}
                <div class="faq-item">
                    <div class="faq-question">
                        <span class="faq-question-text">{{ __('Where are you based?') }}</span>
                        <div class="faq-icon"><svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg></div>
                    </div>
                    <div class="faq-answer">
                        {{ __('CCP is registered in the USA and operates globally with a focus on projects in LDCs across Africa, Asia, Latin America, Caribbean and the Pacific.') }}
                    </div>
                </div>

            </div>
            
            <div style="margin-top: 4rem; padding: 2.5rem; background: #F6F8FA; border-radius: 12px; text-align: center; border: 1px solid #E0E6ED;">
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

