@extends('layouts.app')

@section('content')
    @include('components.site.breadcrumb')

    <main class="page-content">
        <section class="hero" style="grid-template-columns: 1fr;">
            <div>
                <span class="eyebrow">{{ __("Frequently Asked Questions") }}</span>
                <h1>{{ __("Questions and answers about our work") }}</h1>
                <p>{{ __("Everything you need to know about Climate Catalyst Prize, our services, and how we support LDCs.") }}</p>
            </div>
        </section>

        <section class="section">
            <div class="section-heading">
                <div>
                    <h2>{{ __("Common Questions") }}</h2>
                    <p>{{ __("Clear answers to help you understand our mandate and approach") }}</p>
                </div>
            </div>
            <div class="faq-grid">
                <article class="faq-item">
                    <h3>{{ __("What is the Climate Catalyst Prize?") }}</h3>
                    <p>{{ __("CCP is an international NGO dedicated to supporting Least Developed Countries to build climate resilience, transition to low-carbon economies, and access climate finance and carbon markets.") }}</p>
                </article>
                <article class="faq-item">
                    <h3>{{ __("Who do you work with?") }}</h3>
                    <p>{{ __("We partner with LDC national governments, municipalities, NGOs, community organizations, and development partners to design and deliver climate projects.") }}</p>
                </article>
                <article class="faq-item">
                    <h3>{{ __("What services does CCP provide?") }}</h3>
                    <p>{{ __("We provide six core services: Climate Resilience & Adaptation, Sustainable Agriculture & Food Systems, Low-Carbon Economy Development, Carbon Credits & Carbon Trade, Technical Assistance, and Funding & Resource Mobilization.") }}</p>
                </article>
                <article class="faq-item">
                    <h3>{{ __("Do you only work in LDCs?") }}</h3>
                    <p>{{ __("Yes. Our mandate is focused exclusively on Least Developed Countries as defined by the United Nations. This is where support is needed most.") }}</p>
                </article>
                <article class="faq-item">
                    <h3>{{ __("How does CCP help with carbon credits?") }}</h3>
                    <p>{{ __("We support the full lifecycle: project identification, methodology selection, validation, MRV setup, and market access. Our goal is to help LDCs generate revenue from their climate action.") }}</p>
                </article>
                <article class="faq-item">
                    <h3>{{ __("How can my organization partner with CCP?") }}</h3>
                    <p>{{ __("If you are an NGO, government, or community group in an LDC working on climate, adaptation, or sustainability, reach out to us. We offer technical assistance and help connect you to funding.") }}</p>
                </article>
                <article class="faq-item">
                    <h3>{{ __("How is CCP funded?") }}</h3>
                    <p>{{ __("CCP is funded through grants, philanthropic donations, project fees, and partnerships with development agencies and the private sector.") }}</p>
                </article>
                <article class="faq-item">
                    <h3>{{ __("Where are you based?") }}</h3>
                    <p>{{ __("CCP is registered in the USA and operates globally with a focus on projects in LDCs across Africa, Asia, Latin America, Caribbean and the Pacific.") }}</p>
                </article>
            </div>
        </section>

        <section class="section" style="background: #FFFFFF;">
            <div class="cta-panel">
                <div class="cta-copy">
                    <h2>{{ __("Still have questions?") }}</h2>
                    <p>{{ __("Contact our team for more information about our services and how we can support your climate project.") }}</p>
                </div>
                <div class="cta-actions">
                    <a href="{{ route('contact', ['locale' => $locale]) }}" class="button-cta primary">{{ __("Contact us") }}</a>
                    <a href="{{ route('apply', ['locale' => $locale]) }}" class="button-cta secondary">{{ __("Apply for support") }}</a>
                </div>
            </div>
        </section>
    </main>
@endsection
