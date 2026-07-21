<footer class="footer">
    <div style="max-width: 1200px; margin: 0 auto;">
        <div style="display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; gap: 3rem;">
            <div>
                <div style="display: flex; align-items: center; gap: 0.65rem; margin-bottom: 1.25rem;">
                    <span style="width: 32px; height: 32px; background: #087F5B; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 0.85rem; font-weight: 800; color: #fff; font-family: 'Plus Jakarta Sans', sans-serif;">CC</span>
                    <span style="font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 700; font-size: 0.95rem; color: #FFFFFF;">
                        {{ __('Climate') }} <span style="color: #20C997;">{{ __('Catalyst') }}</span>
                    </span>
                </div>
                <p class="footer-text" style="max-width: 320px;">
                    {{ __('Accelerating breakthrough climate solutions through funding, visibility and global collaboration. The world\'s most ambitious climate innovation prize.') }}
                </p>
                <div style="display: flex; gap: 0.75rem; margin-top: 1.5rem;">
                    <a href="#" style="width: 36px; height: 36px; border-radius: 10px; background: rgba(255,255,255,0.06); display: flex; align-items: center; justify-content: center; color: rgba(255,255,255,0.4); transition: all 0.2s; text-decoration: none;" onmouseover="this.style.background='rgba(8,127,91,0.2)'; this.style.color='#20C997'" onmouseout="this.style.background='rgba(255,255,255,0.06)'; this.style.color='rgba(255,255,255,0.4)'" aria-label="LinkedIn">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect width="4" height="12" x="2" y="9"/><circle cx="4" cy="4" r="2"/></svg>
                    </a>
                </div>
            </div>

            <div>
                <h4 class="footer-heading">{{ __('Quick Links') }}</h4>
                <div style="display: flex; flex-direction: column; gap: 0.65rem;">
                    <a href="{{ route('home.locale', ['locale' => $locale]) }}#about" class="footer-link">{{ __('About') }}</a>
                    <a href="{{ route('home.locale', ['locale' => $locale]) }}#categories" class="footer-link">{{ __('Categories') }}</a>
                    <a href="{{ route('home.locale', ['locale' => $locale]) }}#winners" class="footer-link">{{ __('Winners') }}</a>
                    <a href="{{ route('home.locale', ['locale' => $locale]) }}#partners" class="footer-link">{{ __('Partners') }}</a>
                    <a href="{{ route('home.locale', ['locale' => $locale]) }}#apply" class="footer-link">{{ __('Apply Now') }}</a>
                </div>
            </div>

            <div>
                <h4 class="footer-heading">{{ __('Resources') }}</h4>
                <div style="display: flex; flex-direction: column; gap: 0.65rem;">
                    <a href="{{ route('blog', ['locale' => $locale]) }}" class="footer-link">{{ __('Insights') }}</a>
                    <a href="{{ route('faq', ['locale' => $locale]) }}" class="footer-link">{{ __('FAQ') }}</a>
                    <a href="{{ route('map', ['locale' => $locale]) }}" class="footer-link">{{ __('Where We Work') }}</a>
                    <a href="{{ route('apply', ['locale' => $locale]) }}" class="footer-link">{{ __('Apply for Support') }}</a>
                    <a href="/sitemap.xml" class="footer-link">{{ __('Sitemap') }}</a>
                </div>
            </div>

            <div>
                <h4 class="footer-heading">{{ __('Contact') }}</h4>
                <div style="display: flex; flex-direction: column; gap: 0.65rem;">
                    <a href="mailto:info@climatecatalyst.org" class="footer-link">info@climatecatalyst.org</a>
                </div>
            </div>
        </div>

        <hr class="footer-divider">

        <div style="display: flex; justify-content: space-between; align-items: center; gap: 1rem; flex-wrap: wrap;">
            <p style="color: rgba(255,255,255,0.3); font-size: 0.8rem; margin: 0;">
                &copy; {{ date('Y') }} {{ __('Climate Catalyst Prize') }}. {{ __('All rights reserved.') }}
            </p>
            <div style="display: flex; gap: 1.5rem;">
                <a href="#" style="color: rgba(255,255,255,0.3); font-size: 0.8rem; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='rgba(255,255,255,0.6)'" onmouseout="this.style.color='rgba(255,255,255,0.3)'">{{ __('Privacy Policy') }}</a>
                <a href="#" style="color: rgba(255,255,255,0.3); font-size: 0.8rem; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='rgba(255,255,255,0.6)'" onmouseout="this.style.color='rgba(255,255,255,0.3)'">{{ __('Terms of Service') }}</a>
                <a href="#" style="color: rgba(255,255,255,0.3); font-size: 0.8rem; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='rgba(255,255,255,0.6)'" onmouseout="this.style.color='rgba(255,255,255,0.3)'">{{ __('Cookie Policy') }}</a>
            </div>
        </div>
    </div>
</footer>

<style>
@media (max-width: 768px) {
    footer > div > div:first-child {
        grid-template-columns: 1fr !important;
        gap: 2rem !important;
    }
}
</style>