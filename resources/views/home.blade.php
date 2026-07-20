@extends('layouts.app')

@section('content')
    @include('components.site.navbar', ['locale' => $locale])

    <main class="page-content">
        @include('components.site.hero', ['locale' => $locale])

        <section class="section" id="programs">
            <div class="section-heading">
                <div>
                    <h2>{{ __('site.programs_title') }}</h2>
                    <p>{{ __('site.programs_intro') }}</p>
                </div>
            </div>
            <div class="card-grid">
                <article class="card">
                    <div class="card-visual image-sunrise"></div>
                    <h3>{{ __('site.program_card_1_title') }}</h3>
                    <p>{{ __('site.program_card_1_text') }}</p>
                </article>
                <article class="card">
                    <div class="card-visual image-forest"></div>
                    <h3>{{ __('site.program_card_2_title') }}</h3>
                    <p>{{ __('site.program_card_2_text') }}</p>
                </article>
                <article class="card">
                    <div class="card-visual image-city"></div>
                    <h3>{{ __('site.program_card_3_title') }}</h3>
                    <p>{{ __('site.program_card_3_text') }}</p>
                </article>
            </div>
        </section>

        <section class="section" id="partners">
            <div class="section-heading">
                <div>
                    <h2>Trusted by global changemakers</h2>
                    <p>We work with leaders, institutions and communities shaping climate action at every scale.</p>
                </div>
            </div>
            <div class="partner-strip">
                <div class="logo"><img src="/images/logos/un-climate.png" alt="UN Climate"></div>
                <div class="logo"><img src="/images/logos/green-futures.png" alt="Green Futures Lab"></div>
                <div class="logo"><img src="/images/logos/northstar.png" alt="Northstar Ventures"></div>
                <div class="logo"><img src="/images/logos/resilience.png" alt="Resilience Fund"></div>
                <div class="logo"><img src="/images/logos/local-network.png" alt="Local Climate Network"></div>
            </div>
        </section>

        <section class="section" id="impact">
            <div class="section-heading">
                <div>
                    <h2>{{ __('site.impact_title') }}</h2>
                    <p>{{ __('site.impact_intro') }}</p>
                </div>
            </div>
            <div class="impact-panel">
                <div class="impact-visual" aria-hidden="true"></div>
                <div class="impact-copy">
                    <h3>Climate leadership grounded in evidence and action</h3>
                    <p>We combine rigorous support, practical resources and trusted partnerships to help ambitious ideas become durable climate solutions.</p>
                    <div class="stats">
                        <div class="stat"><strong>120+</strong><span>{{ __('site.stat_1') }}</span></div>
                        <div class="stat"><strong>18</strong><span>{{ __('site.stat_2') }}</span></div>
                        <div class="stat"><strong>4.8/5</strong><span>{{ __('site.stat_3') }}</span></div>
                        <div class="stat"><strong>24/7</strong><span>{{ __('site.stat_4') }}</span></div>
                    </div>
                    <div class="cta-panel" role="region" aria-label="Call to action">
                        <div class="cta-copy">
                            <h2>Support bold, practical climate solutions</h2>
                            <p>Join our network of partners or nominate a project to receive catalytic support and scaling expertise.</p>
                        </div>
                        <div class="cta-actions">
                            <a href="{{ route('about', ['locale' => $locale]) }}" class="button-cta primary">Become a partner</a>
                            <a href="{{ route('blog', ['locale' => $locale]) }}" class="button-cta ghost">Explore insights</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('components.site.footer')
@endsection
