@extends('layouts.app')

@section('content')
    @include('components.site.hero', ['locale' => $locale])

    @include('components.site.breadcrumb')

    <main class="page-content">
        <!-- ===== 2. IMPACT ===== -->
        <section style="padding: 4rem 1.5rem; background: #FFFFFF; border-bottom: 1px solid #E2E8E2;">
            <div style="max-width: 1200px; margin: 0 auto;">
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem;">
                    <div class="stat-card animate-up">
                        <div class="stat-number">{{ __("45+") }}</div>
                        <div class="stat-divider"></div>
                        <div class="stat-label">{{ __("LDCs Engaged") }}</div>
                    </div>
                    <div class="stat-card animate-up delay-2">
                        <div class="stat-number">{{ __("120+") }}</div>
                        <div class="stat-divider"></div>
                        <div class="stat-label">{{ __("Projects Supported") }}</div>
                    </div>
                    <div class="stat-card animate-up delay-4">
                        <div class="stat-number">{{ __("$2.5B") }}</div>
                        <div class="stat-divider"></div>
                        <div class="stat-label">{{ __("Climate Finance Mobilized") }}</div>
                    </div>
                    <div class="stat-card animate-up delay-6">
                        <div class="stat-number">{{ __("85%") }}</div>
                        <div class="stat-divider"></div>
                        <div class="stat-label">{{ __("Funding Success Rate") }}</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===== 3. WHY CLIMATE CATALYST ===== -->
        <section id="about" class="section-padding">
            <div class="section-container">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center;">
                    <div class="animate-left">
                        <span class="section-label">{{ __("Why Climate Catalyst") }}</span>
                        <h2 class="section-title">{{ __("Bridging the gap between climate ambition and funded action") }}</h2>
                        <p class="section-subtitle" style="margin-bottom: 2rem;">
                            {{ __("We are an international NGO working exclusively with Least Developed Countries to build climate resilience, access climate finance, and implement measurable adaptation and mitigation projects.") }}
                        </p>
                        <div style="display: flex; flex-direction: column; gap: 1.25rem;">
                            <div class="feature-item">
                                <div class="feature-icon">🎯</div>
                                <div>
                                    <div class="feature-title">{{ __("LDC-Focused Mandate") }}</div>
                                    <p class="feature-text">{{ __("Exclusively supporting the countries most vulnerable to climate change, as defined by the United Nations") }}</p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">🌍</div>
                                <div>
                                    <div class="feature-title">{{ __("End-to-End Support") }}</div>
                                    <p class="feature-text">{{ __("From project identification to funding submission and implementation guidance") }}</p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">⚡</div>
                                <div>
                                    <div class="feature-title">{{ __("Proven Track Record") }}</div>
                                    <p class="feature-text">{{ __("Decades of combined experience in climate finance, project design, and capacity building") }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="animate-right">
                        <div style="position: relative;">
                            <div style="border-radius: 20px; overflow: hidden; box-shadow: 0 8px 32px rgba(28,43,36,0.08);">
                                <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=800&q=80" alt="Climate resilience project" style="width: 100%; height: 480px; object-fit: cover; display: block;">
                            </div>
                            <div class="card" style="position: absolute; bottom: -1.5rem; left: -1.5rem; padding: 1.25rem 1.5rem; max-width: 210px; box-shadow: 0 8px 24px rgba(28,43,36,0.1);">
                                <div style="font-family: 'Plus Jakarta Sans', sans-serif; font-size: 1.8rem; font-weight: 700; color: #087F5B;">45+</div>
                                <div style="font-size: 0.8rem; color: #5B6F66;">{{ __("LDCs supported across 4 regions") }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===== 4. SERVICES ===== -->
        <section id="services" class="section-padding" style="background: #FFFFFF;">
            <div class="section-container">
                <div class="animate-up" style="text-align: center; margin-bottom: 3.5rem;">
                    <span class="section-label">{{ __("Our Services") }}</span>
                    <h2 class="section-title" style="max-width: 600px; margin: 0 auto 1rem;">{{ __("Comprehensive support for climate action") }}</h2>
                    <p class="section-subtitle" style="margin: 0 auto; text-align: center;">{{ __("We provide technical expertise, funding pathways, and capacity building across six core areas") }}</p>
                </div>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem;">
                    <div class="service-card animate-up">
                        <div class="service-card-icon">🛡️</div>
                        <h3>{{ __("Climate Resilience & Adaptation") }}</h3>
                        <p>{{ __("Designing adaptation plans, early warning systems, and resilient infrastructure for vulnerable communities.") }}</p>
                    </div>
                    <div class="service-card animate-up delay-2">
                        <div class="service-card-icon">🌾</div>
                        <h3>{{ __("Sustainable Agriculture") }}</h3>
                        <p>{{ __("Climate-smart farming, water security, and food systems transformation for LDC agriculture.") }}</p>
                    </div>
                    <div class="service-card animate-up delay-4">
                        <div class="service-card-icon">⚡</div>
                        <h3>{{ __("Low-Carbon Development") }}</h3>
                        <p>{{ __("Renewable energy roadmaps, energy efficiency, and green economy transition planning.") }}</p>
                    </div>
                    <div class="service-card animate-up delay-6">
                        <div class="service-card-icon">🌱</div>
                        <h3>{{ __("Carbon Markets") }}</h3>
                        <p>{{ __("End-to-end carbon project development, from identification to market access and revenue generation.") }}</p>
                    </div>
                    <div class="service-card animate-up delay-2">
                        <div class="service-card-icon">📋</div>
                        <h3>{{ __("Technical Assistance") }}</h3>
                        <p>{{ __("Project design, feasibility studies, policy alignment, and capacity building for effective implementation.") }}</p>
                    </div>
                    <div class="service-card animate-up delay-4">
                        <div class="service-card-icon">💰</div>
                        <h3>{{ __("Climate Finance Access") }}</h3>
                        <p>{{ __("Connecting organizations to GCF, GEF, Adaptation Fund, and bilateral donors from concept to funding.") }}</p>
                    </div>
                </div>

                <div class="animate-up" style="text-align: center; margin-top: 3rem;">
                    <a href="{{ route('services', ['locale' => $locale]) }}" class="btn btn-primary">
                        {{ __("Explore all services") }}
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </a>
                </div>
            </div>
        </section>

        <!-- ===== 5. WHO WE HELP ===== -->
        <section id="who-we-help" class="section-padding">
            <div class="section-container">
                <div class="animate-up" style="text-align: center; margin-bottom: 3.5rem;">
                    <span class="section-label">{{ __("Who We Help") }}</span>
                    <h2 class="section-title" style="max-width: 600px; margin: 0 auto 1rem;">{{ __("Partners in climate action") }}</h2>
                    <p class="section-subtitle" style="margin: 0 auto; text-align: center;">{{ __("We collaborate with a diverse range of organizations committed to climate action in LDCs") }}</p>
                </div>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1.5rem;">
                    <div class="partner-card animate-up">
                        <div class="partner-icon">🏛️</div>
                        <h4>{{ __("National Governments") }}</h4>
                        <p>{{ __("Ministries and climate agencies developing national adaptation and mitigation strategies") }}</p>
                    </div>
                    <div class="partner-card animate-up delay-2">
                        <div class="partner-icon">🏙️</div>
                        <h4>{{ __("Municipalities") }}</h4>
                        <p>{{ __("Cities and local governments building urban resilience and low-carbon infrastructure") }}</p>
                    </div>
                    <div class="partner-card animate-up delay-4">
                        <div class="partner-icon">🤝</div>
                        <h4>{{ __("NGOs & Civil Society") }}</h4>
                        <p>{{ __("Community-based organizations driving grassroots climate action and adaptation") }}</p>
                    </div>
                    <div class="partner-card animate-up delay-6">
                        <div class="partner-icon">🔬</div>
                        <h4>{{ __("Research Institutions") }}</h4>
                        <p>{{ __("Academic and scientific organizations providing evidence and innovation") }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===== 6. METHODOLOGY ===== -->
        <section id="methodology" class="section-padding" style="background: #FFFFFF;">
            <div class="section-container">
                <div class="animate-up" style="text-align: center; margin-bottom: 3.5rem;">
                    <span class="section-label">{{ __("Our Methodology") }}</span>
                    <h2 class="section-title" style="max-width: 600px; margin: 0 auto 1rem;">{{ __("From opportunity to impact") }}</h2>
                    <p class="section-subtitle" style="margin: 0 auto; text-align: center;">{{ __("A proven six-step pathway that transforms climate ideas into funded, implemented projects") }}</p>
                </div>

                <div class="methodology-steps">
                    <div class="methodology-step animate-up">
                        <div class="methodology-line"></div>
                        <div class="methodology-content">
                            <div class="methodology-number">1</div>
                            <div>
                                <h4>{{ __("Identify Opportunities") }}</h4>
                                <p>{{ __("We work with stakeholders to identify high-impact climate opportunities aligned with national priorities") }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="methodology-step animate-up delay-2">
                        <div class="methodology-line"></div>
                        <div class="methodology-content">
                            <div class="methodology-number">2</div>
                            <div>
                                <h4>{{ __("Design Projects") }}</h4>
                                <p>{{ __("Together we develop robust project designs with clear outcomes, budgets, and implementation plans") }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="methodology-step animate-up delay-4">
                        <div class="methodology-line"></div>
                        <div class="methodology-content">
                            <div class="methodology-number">3</div>
                            <div>
                                <h4>{{ __("Secure Climate Finance") }}</h4>
                                <p>{{ __("We prepare funding proposals and connect projects to GCF, GEF, Adaptation Fund, and other sources") }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="methodology-step animate-up delay-6">
                        <div class="methodology-line"></div>
                        <div class="methodology-content">
                            <div class="methodology-number">4</div>
                            <div>
                                <h4>{{ __("Implement") }}</h4>
                                <p>{{ __("We provide ongoing technical support during implementation to ensure quality and timeliness") }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="methodology-step animate-up">
                        <div class="methodology-line"></div>
                        <div class="methodology-content">
                            <div class="methodology-number">5</div>
                            <div>
                                <h4>{{ __("Measure Impact") }}</h4>
                                <p>{{ __("Robust M&E frameworks track outcomes, learn, and demonstrate results to stakeholders") }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="methodology-step animate-up delay-2">
                        <div class="methodology-content">
                            <div class="methodology-number">6</div>
                            <div>
                                <h4>{{ __("Scale") }}</h4>
                                <p>{{ __("Successful models are documented and replicated across regions and sectors") }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===== 7. CTA ===== -->
        <section id="apply" class="section-padding" style="background: #E8F5EF;">
            <div class="section-container">
                <div class="animate-scale" style="text-align: center; max-width: 700px; margin: 0 auto;">
                    <span class="section-label" style="background: #FFFFFF;">{{ __("Apply for Support") }}</span>
                    <h2 class="section-title" style="margin: 1rem auto;">{{ __("Ready to advance your climate project?") }}</h2>
                    <p style="color: #5B6F66; font-size: 1rem; line-height: 1.7; margin: 0 auto 2rem;">
                        {{ __("If your organization is based in an LDC and working on climate adaptation, mitigation, or resilience — we can help. Submit your project for consideration.") }}
                    </p>
                    <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                        <a href="{{ route('apply', ['locale' => $locale]) }}" class="btn btn-primary">
                            {{ __("Submit your project") }}
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </a>
                        <a href="{{ route('contact', ['locale' => $locale]) }}" class="btn btn-secondary">
                            {{ __("Contact us") }}
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
