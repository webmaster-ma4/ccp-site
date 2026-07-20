@extends('layouts.app')

@section('content')
    @include('components.site.navbar', ['locale' => $locale])

    <main class="page-content">
        <section class="hero" style="grid-template-columns: 1fr;">
            <div>
                <span class="eyebrow">{{ __('site.about_label') }}</span>
                <h1>{{ __('site.about_title') }}</h1>
                <p>{{ __('site.about_text') }}</p>
            </div>
        </section>

        <!-- Mission -->
        <section class="section">
            <div class="impact-panel">
                <div class="impact-copy">
                    <h3>{{ __('site.about_mission_title') }}</h3>
                    <p>{{ __('site.about_mission_text') }}</p>
                </div>
            </div>
        </section>

        <!-- Approach: Catalyze -> Support -> Finance -> Scale -->
        <section class="section">
            <div class="section-heading">
                <div>
                    <h2>{{ __('site.about_approach_title') }}</h2>
                    <p>{{ __('site.about_approach_text') }}</p>
                </div>
            </div>
            <div class="card-grid">
                <article class="card">
                    <div class="card-visual image-sunrise"></div>
                    <h3>{{ __('site.about_approach_step_1_title') }}</h3>
                    <p>{{ __('site.about_approach_step_1_text') }}</p>
                </article>
                <article class="card">
                    <div class="card-visual image-forest"></div>
                    <h3>{{ __('site.about_approach_step_2_title') }}</h3>
                    <p>{{ __('site.about_approach_step_2_text') }}</p>
                </article>
                <article class="card">
                    <div class="card-visual image-city"></div>
                    <h3>{{ __('site.about_approach_step_3_title') }}</h3>
                    <p>{{ __('site.about_approach_step_3_text') }}</p>
                </article>
                <article class="card" style="grid-column: span 1;">
                    <div class="card-visual image-sunrise"></div>
                    <h3>{{ __('site.about_approach_step_4_title') }}</h3>
                    <p>{{ __('site.about_approach_step_4_text') }}</p>
                </article>
            </div>
        </section>

        <!-- Focus and Promise -->
        <section class="section">
            <div class="card-grid">
                <article class="card">
                    <h3>{{ __('site.about_focus_title') }}</h3>
                    <p>{{ __('site.about_focus_text') }}</p>
                </article>
                <article class="card">
                    <h3>{{ __('site.about_promise_title') }}</h3>
                    <p>{{ __('site.about_promise_text') }}</p>
                </article>
                <article class="card">
                    <h3>{{ __('site.about_card_1_title') }}</h3>
                    <p>{{ __('site.about_card_1_text') }}</p>
                </article>
            </div>
        </section>
    </main>

    @include('components.site.footer')
@endsection