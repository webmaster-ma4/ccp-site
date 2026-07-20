<section class="hero" id="mission">
    <div>
        <span class="eyebrow">{{ __('site.hero_label') }}</span>
        <h1>{{ __('site.hero_title') }}</h1>
        <p>{{ __('site.hero_text') }}</p>
        <div class="hero-actions">
            <a class="button button-primary" href="{{ route('services', ['locale' => $locale]) }}">{{ __('site.hero_primary_cta') }}</a>
            <a class="button button-secondary" href="{{ route('contact', ['locale' => $locale]) }}">{{ __('site.hero_secondary_cta') }}</a>
        </div>
    </div>

    <div class="hero-panel" aria-label="Who We Are">
        <div>
            <h3>{{ __('site.hero_panel_title') }}</h3>
            <ul>
                <li>{{ __('site.hero_panel_item_1') }}</li>
                <li>{{ __('site.hero_panel_item_2') }}</li>
                <li>{{ __('site.hero_panel_item_3') }}</li>
            </ul>
        </div>
        <p style="margin:0; opacity:0.9;">{{ __('site.hero_panel_footer') }}</p>
    </div>
</section>
