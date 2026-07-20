@extends('layouts.app')

@section('content')
    @include('components.site.navbar', ['locale' => $locale])

    <main class="page-content">
        <section class="hero" style="grid-template-columns: 1fr;">
            <div>
                <span class="eyebrow">{{ __('site.faq_title') }}</span>
                <h1>{{ __('site.faq_title') }}</h1>
                <p>{{ __('site.faq_intro') }}</p>
            </div>
        </section>

        <section class="section">
            <div class="faq-grid">
                @foreach ($faqs as $index => $faq)
                    <article class="faq-item">
                        <h3>{{ __("site.{$faq['question_key']}") }}</h3>
                        <p>{{ __("site.{$faq['answer_key']}") }}</p>
                    </article>
                @endforeach
            </div>
        </section>

        <section class="section">
            <div class="cta-panel">
                <div class="cta-copy">
                    <h2>{{ __('site.partner_title') }}</h2>
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