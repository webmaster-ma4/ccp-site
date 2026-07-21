@extends('layouts.app')

@section('content')
    @include('components.site.breadcrumb')

    <main class="page-content">
        <section class="hero" style="grid-template-columns: 1fr;">
            <div>
                <span class="eyebrow">{{ __("Contact Us") }}</span>
                <h1>{{ __("Let's discuss your climate project") }}</h1>
                <p>{{ __("Reach out to explore how we can support your organization in developing and funding climate initiatives in LDCs.") }}</p>
            </div>
        </section>

        <section class="section">
            <div class="section-heading">
                <div>
                    <h2>{{ __("Get in Touch") }}</h2>
                    <p>{{ __("We typically respond within 5 business days") }}</p>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card">
                <form class="contact-form" method="POST" action="{{ route('contact.send', ['locale' => $locale]) }}">
                    @csrf
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="name" class="form-label">{{ __("Full Name") }}</label>
                            <input type="text" id="name" name="name" class="form-control" required maxlength="255">
                            @error('name')<div class="form-error">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="organization" class="form-label">{{ __("Organization") }}</label>
                            <input type="text" id="organization" name="organization" class="form-control" required maxlength="255">
                            @error('organization')<div class="form-error">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">{{ __("Email") }}</label>
                            <input type="email" id="email" name="email" class="form-control" required maxlength="255">
                            @error('email')<div class="form-error">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="phone" class="form-label">{{ __("Phone") }}</label>
                            <input type="text" id="phone" name="phone" class="form-control" maxlength="50">
                            @error('phone')<div class="form-error">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="country" class="form-label">{{ __("Country") }}</label>
                            <input type="text" id="country" name="country" class="form-control" required maxlength="255">
                            @error('country')<div class="form-error">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="organization_type" class="form-label">{{ __("Organization Type") }}</label>
                            <select id="organization_type" name="organization_type" class="form-control">
                                <option value="">{{ __("Select type") }}</option>
                                <option value="government">{{ __("Government / Ministry") }}</option>
                                <option value="municipality">{{ __("Municipality / City") }}</option>
                                <option value="ngo">{{ __("NGO / Civil Society") }}</option>
                                <option value="academic">{{ __("Academic / Research") }}</option>
                                <option value="private">{{ __("Private Sector") }}</option>
                                <option value="other">{{ __("Other") }}</option>
                            </select>
                            @error('organization_type')<div class="form-error">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group full-width">
                            <label for="message" class="form-label">{{ __("Message") }}</label>
                            <textarea id="message" name="message" class="form-control" rows="5" required maxlength="5000" placeholder="{{ __("Tell us about your climate project, your organization, and how we can help.") }}"></textarea>
                            @error('message')<div class="form-error">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">{{ __("Send Message") }}</button>
                        <p class="form-note">{{ __("We will get back to you within 5 business days.") }}</p>
                    </div>
                </form>
            </div>
        </section>
    </main>
@endsection
