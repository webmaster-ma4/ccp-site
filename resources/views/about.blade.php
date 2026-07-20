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

        <section class="section">
            <div class="card-grid">
                <article class="card">
                    <div class="card-visual image-sunrise"></div>
                    <h3>{{ __('site.about_card_1_title') }}</h3>
                    <p>{{ __('site.about_card_1_text') }}</p>
                </article>
                <article class="card">
                    <div class="card-visual image-forest"></div>
                    <h3>{{ __('site.about_card_2_title') }}</h3>
                    <p>{{ __('site.about_card_2_text') }}</p>
                </article>
                <article class="card">
                    <div class="card-visual image-city"></div>
                    <h3>{{ __('site.about_card_3_title') }}</h3>
                    <p>{{ __('site.about_card_3_text') }}</p>
                </article>
            </div>
        </section>
    </main>

    @include('components.site.footer')
@endsection
