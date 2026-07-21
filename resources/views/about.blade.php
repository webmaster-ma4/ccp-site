@extends('layouts.app')

@section('content')
    @include('components.site.breadcrumb')

    <main class="page-content">
        <section class="hero" style="grid-template-columns: 1fr;">
            <div>
                <span class="eyebrow">{{ __("Our Story") }}</span>
                <h1>{{ __("An international NGO dedicated to climate action in the world's most vulnerable countries") }}</h1>
                <p>{{ __("Climate Catalyst Prize works exclusively with Least Developed Countries to build climate resilience, access climate finance, and implement measurable adaptation and mitigation projects.") }}</p>
            </div>
        </section>

        <!-- Mission -->
        <section class="section">
            <div class="section-heading">
                <div>
                    <h2>{{ __("Our Mission") }}</h2>
                    <p>{{ __("To catalyze climate solutions in LDCs by providing the tools, finance, and partnerships needed to transform futures.") }}</p>
                </div>
            </div>
            <div class="card-grid">
                <article class="card">
                    <h3>{{ __("Who We Are") }}</h3>
                    <p>{{ __("We are an international NGO supporting Least Developed Countries through technical assistance, project development, and climate finance access. We bridge the gap between climate ambition and funded action.") }}</p>
                </article>
                <article class="card">
                    <h3>{{ __("Our Promise") }}</h3>
                    <p>{{ __("We don't just write reports. We catalyze. That means turning plans into funded projects. Turning farms into climate-smart systems. Turning carbon potential into real revenue. Turning adaptation ideas into infrastructure that protects lives.") }}</p>
                </article>
                <article class="card">
                    <h3>{{ __("Our Focus") }}</h3>
                    <p>{{ __("We focus on Least Developed Countries — where climate change hits first and hardest, but where innovation and resilience also run deepest. CCP works as a bridge between LDC governments, local NGOs, municipalities, and global climate finance.") }}</p>
                </article>
            </div>
        </section>

        <!-- Approach -->
        <section class="section" style="background: #FFFFFF;">
            <div class="section-heading">
                <div>
                    <h2>{{ __("Our Approach") }}</h2>
                    <p>{{ __("A proven methodology that takes climate projects from concept to implementation") }}</p>
                </div>
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
        </section>

        <!-- Values -->
        <section class="section">
            <div class="section-heading">
                <div>
                    <h2>{{ __("Why Organizations Trust Us") }}</h2>
                    <p>{{ __("Built on expertise, transparency, and long-term partnership") }}</p>
                </div>
            </div>
            <div class="card-grid">
                <article class="card">
                    <h3>{{ __("Climate Finance Expertise") }}</h3>
                    <p>{{ __("Deep knowledge of GCF, GEF, Adaptation Fund, and bilateral funding mechanisms. We know what it takes to secure climate finance for LDC projects.") }}</p>
                </article>
                <article class="card">
                    <h3>{{ __("Long-Term Capacity Building") }}</h3>
                    <p>{{ __("We don't just submit proposals. We build lasting local capacity so organizations can continue to access funding and implement projects independently.") }}</p>
                </article>
                <article class="card">
                    <h3>{{ __("Partnership Approach") }}</h3>
                    <p>{{ __("We work as an extension of your team, aligning with national priorities and ensuring projects deliver real, measurable impact for communities.") }}</p>
                </article>
            </div>
        </section>
    </main>
@endsection
