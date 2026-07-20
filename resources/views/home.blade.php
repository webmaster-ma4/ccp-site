@extends('layouts.app')

@section('content')
    @include('components.site.navbar', ['locale' => $locale])

    <main class="page-content">
        @include('components.site.hero', ['locale' => $locale])

        <!-- Services section - 6 core services -->
        <section class="section" id="services">
            <div class="section-heading">
                <div>
                    <h2>{{ __('site.services_title') }}</h2>
                    <p>{{ __('site.services_intro') }}</p>
                </div>
            </div>
            <div class="card-grid">
                <article class="card">
                    <div class="card-visual image-sunrise"></div>
                    <h3>{{ __('site.service_1_title') }}</h3>
                    <p>{{ __('site.service_1_text') }}</p>
                </article>
                <article class="card">
                    <div class="card-visual image-forest"></div>
                    <h3>{{ __('site.service_2_title') }}</h3>
                    <p>{{ __('site.service_2_text') }}</p>
                </article>
                <article class="card">
                    <div class="card-visual image-city"></div>
                    <h3>{{ __('site.service_3_title') }}</h3>
                    <p>{{ __('site.service_3_text') }}</p>
                </article>
                <article class="card">
                    <div class="card-visual image-sunrise"></div>
                    <h3>{{ __('site.service_4_title') }}</h3>
                    <p>{{ __('site.service_4_text') }}</p>
                </article>
                <article class="card">
                    <div class="card-visual image-forest"></div>
                    <h3>{{ __('site.service_5_title') }}</h3>
                    <p>{{ __('site.service_5_text') }}</p>
                </article>
                <article class="card">
                    <div class="card-visual image-city"></div>
                    <h3>{{ __('site.service_6_title') }}</h3>
                    <p>{{ __('site.service_6_text') }}</p>
                </article>
            </div>
        </section>

        <!-- Impact section -->
        <section class="section" id="impact">
            <div class="section-heading">
                <div>
                    <h2>{{ __('site.impact_title') }}</h2>
                    <p>{{ __('site.impact_intro') }}</p>
                </div>
            </div>
            <div class="impact-panel">
                <div class="impact-copy">
                    <h3>{{ __('site.about_approach_text') }}</h3>
                    <p>{{ __('site.about_focus_text') }}</p>
                </div>
                <div class="stats">
                    <div class="stat"><strong>120+</strong><span>{{ __('site.impact_stat_1_label') }}</span></div>
                    <div class="stat"><strong>18</strong><span>{{ __('site.impact_stat_2_label') }}</span></div>
                    <div class="stat"><strong>4.8/5</strong><span>{{ __('site.impact_stat_3_label') }}</span></div>
                    <div class="stat"><strong>24/7</strong><span>{{ __('site.impact_stat_4_label') }}</span></div>
                </div>
            </div>
        </section>

        <!-- CTA section -->
        <section class="section">
            <div class="cta-panel">
                <div class="cta-copy">
                    <h2>{{ __('site.partner_title') }}</h2>
                    <p>{{ __('site.partner_intro') }}</p>
                </div>
                <div class="cta-actions">
                    <a href="{{ route('contact', ['locale' => $locale]) }}" class="button-cta primary">{{ __('site.services_cta') }}</a>
                    <a href="{{ route('faq', ['locale' => $locale]) }}" class="button-cta ghost">{{ __('site.nav_faq') }}</a>
                </div>
            </div>
        </section>
    </main>

    @include('components.site.footer')
@endsection