@extends('layouts.app')

@section('content')

    <main class="page-content">
        <section class="hero" style="grid-template-columns: 1fr;">
            <div>
                <span class="eyebrow">{{ __("Our Services") }}</span>
                <h1>{{ __("Comprehensive support for climate action in LDCs") }}</h1>
                <p>{{ __("We provide technical expertise, funding pathways, and capacity building across six core areas to help LDCs build climate resilience and access climate finance.") }}</p>
            </div>
        </section>

        <section class="section">
            <div class="section-heading">
                <div>
                    <h2>{{ __("How We Support You") }}</h2>
                    <p>{{ __("End-to-end assistance from project identification to funding and implementation") }}</p>
                </div>
            </div>
            <div class="card-grid">
                <article class="card">
                    <div class="card-icon">🛡️</div>
                    <h3>{{ __("Climate Resilience & Adaptation") }}</h3>
                    <p>{{ __("Designing adaptation plans, early warning systems, and resilient infrastructure for vulnerable communities.") }}</p>
                </article>
                <article class="card">
                    <div class="card-icon">🌾</div>
                    <h3>{{ __("Sustainable Agriculture") }}</h3>
                    <p>{{ __("Climate-smart farming, water security, and food systems transformation for LDC agriculture.") }}</p>
                </article>
                <article class="card">
                    <div class="card-icon">⚡</div>
                    <h3>{{ __("Low-Carbon Development") }}</h3>
                    <p>{{ __("Renewable energy roadmaps, energy efficiency, and green economy transition planning.") }}</p>
                </article>
                <article class="card">
                    <div class="card-icon">🌱</div>
                    <h3>{{ __("Carbon Markets") }}</h3>
                    <p>{{ __("End-to-end carbon project development, from identification to market access and revenue generation.") }}</p>
                </article>
                <article class="card">
                    <div class="card-icon">📋</div>
                    <h3>{{ __("Technical Assistance") }}</h3>
                    <p>{{ __("Project design, feasibility studies, policy alignment, and capacity building for effective implementation.") }}</p>
                </article>
                <article class="card">
                    <div class="card-icon">💰</div>
                    <h3>{{ __("Climate Finance Access") }}</h3>
                    <p>{{ __("Connecting organizations to GCF, GEF, Adaptation Fund, and bilateral donors from concept to funding.") }}</p>
                </article>
            </div>
        </section>

        <section class="section" style="background: #FFFFFF;">
            <div class="section-heading">
                <div>
                    <h2>{{ __("Frequently Requested Support") }}</h2>
                    <p>{{ __("Common areas where we assist LDC organizations") }}</p>
                </div>
            </div>
            <div class="card-grid">
                <article class="card">
                    <h3>{{ __("Project Development") }}</h3>
                    <p>{{ __("From concept notes to full funding proposals, we help design robust climate projects with clear outcomes and budgets.") }}</p>
                </article>
                <article class="card">
                    <h3>{{ __("Capacity Building") }}</h3>
                    <p>{{ __("Training, workshops, and hands-on support to strengthen local expertise in climate finance and project management.") }}</p>
                </article>
                <article class="card">
                    <h3>{{ __("Funding Pathways") }}</h3>
                    <p>{{ __("We identify the right funding sources for your project and guide you through application processes.") }}</p>
                </article>
            </div>
        </section>

        <section class="section">
            <div class="cta-panel">
                <div class="cta-copy">
                    <h2>{{ __("Ready to work together?") }}</h2>
                    <p>{{ __("If your organization is based in an LDC and working on climate adaptation, mitigation, or resilience — we can help. Submit your project for consideration.") }}</p>
                </div>
                <div class="cta-actions">
                    <a href="{{ route('apply', ['locale' => $locale]) }}" class="button-cta primary">{{ __("Submit your project") }}</a>
                    <a href="{{ route('contact', ['locale' => $locale]) }}" class="button-cta secondary">{{ __("Contact us") }}</a>
                </div>
            </div>
        </section>
    </main>

@endsection
