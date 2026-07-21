@props(['locale' => app()->getLocale()])

<nav id="main-navbar" class="navbar">
    <div class="navbar-inner">
        {{-- Logo --}}
        <a href="{{ route('home', ['locale' => $locale]) }}" class="navbar-logo" aria-label="{{ __('Climate Catalyst Prize') }}">
            <img src="{{ asset('images/logo-ccp-white.svg') }}" alt="CCP Logo" class="logo-light">
            <img src="{{ asset('images/logo-ccp.svg') }}" alt="CCP Logo" class="logo-dark">
        </a>

        {{-- Desktop Nav --}}
        <ul class="navbar-nav">
            <li><a href="{{ route('home', ['locale' => $locale]) }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">{{ __('Home') }}</a></li>
            <li><a href="{{ route('about', ['locale' => $locale]) }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">{{ __('Who We Are') }}</a></li>
            <li><a href="{{ route('services', ['locale' => $locale]) }}" class="{{ request()->routeIs('services') ? 'active' : '' }}">{{ __('What We Do') }}</a></li>
            <li><a href="{{ route('map', ['locale' => $locale]) }}" class="{{ request()->routeIs('map') ? 'active' : '' }}">{{ __('LDC Focus') }}</a></li>
            <li><a href="{{ route('blog', ['locale' => $locale]) }}" class="{{ request()->routeIs('blog') ? 'active' : '' }}">{{ __('Insights') }}</a></li>
            <li><a href="{{ route('faq', ['locale' => $locale]) }}" class="{{ request()->routeIs('faq') ? 'active' : '' }}">{{ __('FAQ') }}</a></li>
            <li><a href="{{ route('contact', ['locale' => $locale]) }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">{{ __('Contact') }}</a></li>
        </ul>

        {{-- Actions --}}
        <div class="navbar-actions">
            {{-- Language Switcher --}}
            <div class="lang-switcher">
                <a href="{{ route('locale.switch', ['locale' => 'en']) }}" class="lang-btn {{ $locale === 'en' ? 'active' : '' }}">EN</a>
                <a href="{{ route('locale.switch', ['locale' => 'fr']) }}" class="lang-btn {{ $locale === 'fr' ? 'active' : '' }}">FR</a>
            </div>

            {{-- CTA Apply --}}
            <a href="{{ route('apply', ['locale' => $locale]) }}" class="btn btn-gold btn-sm">
                {{ __('Apply for Funding') }}
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </a>

            {{-- Mobile Toggle --}}
            <button class="navbar-toggle" id="nav-toggle" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
</nav>

{{-- Drawer Overlay --}}
<div class="drawer-overlay" id="drawer-overlay"></div>

{{-- Mobile Drawer --}}
<aside class="mobile-drawer" id="mobile-drawer">
    <div class="mobile-drawer-header">
        <img src="{{ asset('images/logo-ccp.svg') }}" alt="CCP Logo" style="height: 38px;">
        <button class="mobile-drawer-close" id="drawer-close" aria-label="Close navigation">
            <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>
    
    <nav class="mobile-drawer-nav">
        <a href="{{ route('home', ['locale' => $locale]) }}">{{ __('Home') }}</a>
        <a href="{{ route('about', ['locale' => $locale]) }}">{{ __('Who We Are') }}</a>
        <a href="{{ route('services', ['locale' => $locale]) }}">{{ __('What We Do') }}</a>
        <a href="{{ route('map', ['locale' => $locale]) }}">{{ __('LDC Focus') }}</a>
        <a href="{{ route('blog', ['locale' => $locale]) }}">{{ __('Insights') }}</a>
        <a href="{{ route('faq', ['locale' => $locale]) }}">{{ __('FAQ') }}</a>
        <a href="{{ route('contact', ['locale' => $locale]) }}">{{ __('Contact') }}</a>
    </nav>

    <div class="mobile-drawer-footer">
        <a href="{{ route('apply', ['locale' => $locale]) }}" class="btn btn-gold w-full justify-center" style="width: 100%; justify-content: center;">
            {{ __('Apply for Funding') }}
        </a>
    </div>
</aside>