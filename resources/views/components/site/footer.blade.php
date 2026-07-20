<footer class="footer">
    <div style="display:flex; justify-content:space-between; gap:1rem; flex-wrap:wrap; align-items:center;">
        <p style="margin:0;">{{ __('site.footer_text') }}</p>
        <div style="display:flex; gap:0.8rem; flex-wrap:wrap;">
            <a href="{{ route('about', ['locale' => $locale]) }}">{{ __('site.footer_about') }}</a>
            <a href="{{ route('services', ['locale' => $locale]) }}">{{ __('site.nav_services') }}</a>
            <a href="{{ route('faq', ['locale' => $locale]) }}">{{ __('site.footer_faq') }}</a>
            <a href="{{ route('blog', ['locale' => $locale]) }}">{{ __('site.footer_blog') }}</a>
            <a href="{{ route('contact', ['locale' => $locale]) }}">{{ __('site.footer_contact') }}</a>
            <a href="/sitemap.xml">Sitemap</a>
        </div>
    </div>
</footer>
