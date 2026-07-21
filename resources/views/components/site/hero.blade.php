<section class="hero">
    {{-- Background Media --}}
    <div class="hero-media">
        <video autoplay loop muted playsinline poster="{{ asset('images/hero-fallback.jpg') }}">
            @if(file_exists(public_path('videos/climate-hero.mp4')))
                <source src="{{ asset('videos/climate-hero.mp4') }}" type="video/mp4">
            @endif
        </video>
    </div>
    
    {{-- Overlay Gradient --}}
    <div class="hero-overlay"></div>

    {{-- Content --}}
    <div class="hero-content">
        <div class="animate-up delay-1">
            <span class="hero-eyebrow">{{ __('Catalyzing Climate Solutions in LDCs') }}</span>
        </div>
        
        <h1 class="hero-title animate-up delay-2">
            {{ __('Catalyzing Climate Solutions.') }}<br>
            <span style="color: #C8A04D;">{{ __('Transforming Futures.') }}</span>
        </h1>
        
        <p class="hero-subtitle animate-up delay-3">
            {{ __('We partner with Least Developed Countries to build climate resilience, unlock climate finance, and accelerate the transition to sustainable, low-carbon economies.') }}
        </p>
        
        <div class="hero-actions animate-up delay-4">
            <a href="{{ route('apply', ['locale' => app()->getLocale()]) }}" class="btn btn-gold btn-lg">
                {{ __('Apply for Funding') }}
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </a>
            <a href="{{ route('about', ['locale' => app()->getLocale()]) }}" class="btn btn-outline-white btn-lg">
                {{ __('Discover Our Impact') }}
            </a>
        </div>
    </div>

    {{-- Scroll Indicator --}}
    <div class="scroll-indicator">
        {{ __('Scroll to explore') }}
        <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
        </svg>
    </div>
</section>
