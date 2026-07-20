@extends('layouts.app')

@section('content')
    @include('components.site.navbar', ['locale' => $locale])

    <main class="page-content">
        <section class="hero" style="grid-template-columns: 1fr;">
            <div>
                <span class="eyebrow">{{ __('site.partner_title') }}</span>
                <h1>{{ __('site.partner_title') }}</h1>
                <p>{{ __('site.partner_intro') }}</p>
            </div>
        </section>

        <!-- Who We Work With -->
        <section class="section">
            <div class="impact-panel">
                <div class="impact-copy">
                    <h3>{{ __('site.partner_who_title') }}</h3>
                    <p>{{ __('site.partner_who_text') }}</p>
                    <p style="margin-top: 0.5rem; color: var(--accent-strong); font-weight: 700;">{{ __('site.partner_location') }}</p>
                </div>
            </div>
        </section>

        <!-- Contact Form -->
        <section class="section">
            <div class="section-heading">
                <div>
                    <h2>{{ __('site.partner_form_title') }}</h2>
                </div>
            </div>

            @if (session('success'))
                <div class="alert-success">{{ session('success') }}</div>
            @endif

            <form class="contact-form" method="POST" action="{{ route('contact.send', ['locale' => $locale]) }}">
                @csrf

                <div class="form-group">
                    <label for="name">{{ __('site.partner_form_name') }}</label>
                    <input type="text" id="name" name="name" required maxlength="255">
                </div>

                <div class="form-group">
                    <label for="organization">{{ __('site.partner_form_org') }}</label>
                    <input type="text" id="organization" name="organization" required maxlength="255">
                </div>

                <div class="form-group">
                    <label for="email">{{ __('site.partner_form_email') }}</label>
                    <input type="email" id="email" name="email" required maxlength="255">
                </div>

                <div class="form-group">
                    <label for="phone">{{ __('site.partner_form_phone') }}</label>
                    <input type="text" id="phone" name="phone" maxlength="50">
                </div>

                <div class="form-group">
                    <label for="country">{{ __('site.partner_form_country') }}</label>
                    <input type="text" id="country" name="country" required maxlength="255">
                </div>

                <div class="form-group">
                    <label for="message">{{ __('site.partner_form_message') }}</label>
                    <textarea id="message" name="message" required maxlength="5000"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="button button-primary">{{ __('site.partner_form_submit') }}</button>
                </div>
            </form>
        </section>
    </main>

    @include('components.site.footer')
@endsection