@extends('layouts.app')

@section('content')
    @include('components.site.navbar', ['locale' => $locale])

    <main class="page-content">
        <section class="hero" style="grid-template-columns: 1fr;">
            <div>
                <span class="eyebrow">{{ __('site.services_title') }}</span>
                <h1>{{ __('site.services_title') }}</h1>
                <p>{{ __('site.services_intro') }}</p>
            </div>
        </section>

        <section class="section">
            <div class="card-grid">
                @foreach ($services as $service)
                    <article class="card">
                        <div class="card-visual {{ $service['image_class'] }}"></div>
                        <h3>{{ __("site.{$service['title_key']}") }}</h3>
                        <p>{{ __("site.{$service['text_key']}") }}</p>
                    </article>
                @endforeach
            </div>
        </section>

        <section class="section">
            <div class="cta-panel">
                <div class="cta-copy">
                    <h2>{{ __('site.services_cta') }}</h2>
                    <p>{{ __('site.partner_intro') }}</p>
                </div>
                <div class="cta-actions">
                    <a href="{{ route('contact', ['locale' => $locale]) }}" class="button-cta primary">{{ __('site.services_cta') }}</a>
                </div>
            </div>
        </section>
    </main>

    @include('components.site.footer')
@endsection