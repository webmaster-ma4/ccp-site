<nav style="position: fixed; top: 0; left: 0; right: 0; z-index: 50; background: rgba(255,255,255,0.95); backdrop-filter: blur(12px); border-bottom: 1px solid #E2E8E2; transition: all 0.3s ease;">
    <div style="max-width: 1200px; margin: 0 auto; padding: 0 1.5rem;">
        <div style="display: flex; justify-content: space-between; align-items: center; height: 68px;">
            <a href="{{ route('home.locale', ['locale' => $locale]) }}" style="display: flex; align-items: center; gap: 0.65rem; text-decoration: none;">
                <span style="width: 32px; height: 32px; background: #087F5B; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 0.85rem; font-weight: 800; color: #fff; font-family: 'Plus Jakarta Sans', sans-serif;">CC</span>
                <span style="font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 700; font-size: 0.95rem; color: #1C2B24;">
                    Climate <span style="color: #087F5B;">Catalyst</span>
                </span>
            </a>

            <div class="desktop-nav" style="display: flex; align-items: center; gap: 0.25rem;">
                <a href="{{ route('home.locale', ['locale' => $locale]) }}#about" style="padding: 0.5rem 1rem; border-radius: 9999px; color: #5B6F66; font-size: 0.85rem; font-weight: 500; transition: all 0.2s; text-decoration: none; font-family: 'Manrope', sans-serif;" onmouseover="this.style.color='#087F5B'; this.style.background='#E8F5EF'" onmouseout="this.style.color='#5B6F66'; this.style.background='transparent'">About</a>
                <a href="{{ route('home.locale', ['locale' => $locale]) }}#categories" style="padding: 0.5rem 1rem; border-radius: 9999px; color: #5B6F66; font-size: 0.85rem; font-weight: 500; transition: all 0.2s; text-decoration: none; font-family: 'Manrope', sans-serif;" onmouseover="this.style.color='#087F5B'; this.style.background='#E8F5EF'" onmouseout="this.style.color='#5B6F66'; this.style.background='transparent'">Categories</a>
                <a href="{{ route('home.locale', ['locale' => $locale]) }}#winners" style="padding: 0.5rem 1rem; border-radius: 9999px; color: #5B6F66; font-size: 0.85rem; font-weight: 500; transition: all 0.2s; text-decoration: none; font-family: 'Manrope', sans-serif;" onmouseover="this.style.color='#087F5B'; this.style.background='#E8F5EF'" onmouseout="this.style.color='#5B6F66'; this.style.background='transparent'">Winners</a>
                <a href="{{ route('home.locale', ['locale' => $locale]) }}#partners" style="padding: 0.5rem 1rem; border-radius: 9999px; color: #5B6F66; font-size: 0.85rem; font-weight: 500; transition: all 0.2s; text-decoration: none; font-family: 'Manrope', sans-serif;" onmouseover="this.style.color='#087F5B'; this.style.background='#E8F5EF'" onmouseout="this.style.color='#5B6F66'; this.style.background='transparent'">Partners</a>
                <a href="{{ route('blog', ['locale' => $locale]) }}" style="padding: 0.5rem 1rem; border-radius: 9999px; color: #5B6F66; font-size: 0.85rem; font-weight: 500; transition: all 0.2s; text-decoration: none; font-family: 'Manrope', sans-serif;" onmouseover="this.style.color='#087F5B'; this.style.background='#E8F5EF'" onmouseout="this.style.color='#5B6F66'; this.style.background='transparent'">Insights</a>

                <div style="display: flex; gap: 0.25rem; margin-left: 0.75rem; padding-left: 0.75rem; border-left: 1px solid #E2E8E2;">
                    <a href="{{ route('home.locale', ['locale' => 'en']) }}" style="padding: 0.3rem 0.6rem; border-radius: 6px; font-size: 0.7rem; font-weight: 600; text-decoration: none; {{ $locale === 'en' ? 'background:#E8F5EF; color:#087F5B;' : 'color:#A3B3AB;' }} font-family: 'Manrope', sans-serif;">EN</a>
                    <a href="{{ route('home.locale', ['locale' => 'fr']) }}" style="padding: 0.3rem 0.6rem; border-radius: 6px; font-size: 0.7rem; font-weight: 600; text-decoration: none; {{ $locale === 'fr' ? 'background:#E8F5EF; color:#087F5B;' : 'color:#A3B3AB;' }} font-family: 'Manrope', sans-serif;">FR</a>
                </div>

                <a href="{{ route('home.locale', ['locale' => $locale]) }}#apply" class="btn btn-primary" style="text-decoration: none; margin-left: 0.75rem; padding: 0.55rem 1.25rem; font-size: 0.8rem;">
                    Apply now
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </a>
            </div>

            <button class="mobile-toggle" style="display: none; background: none; border: none; color: #1C2B24; cursor: pointer; padding: 0.5rem;" onclick="toggleMobile()">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 12h18"/><path d="M3 6h18"/><path d="M3 18h18"/></svg>
            </button>
        </div>
    </div>

    <div class="mobile-menu" style="display: none; padding: 1rem 1.5rem 1.5rem; background: #fff; border-top: 1px solid #E2E8E2;">
        <div style="display: flex; flex-direction: column; gap: 0.5rem;">
            <a href="{{ route('home.locale', ['locale' => $locale]) }}#about" style="padding: 0.75rem 1rem; border-radius: 12px; color: #1C2B24; text-decoration: none; font-size: 0.9rem;">About</a>
            <a href="{{ route('home.locale', ['locale' => $locale]) }}#categories" style="padding: 0.75rem 1rem; border-radius: 12px; color: #1C2B24; text-decoration: none; font-size: 0.9rem;">Categories</a>
            <a href="{{ route('home.locale', ['locale' => $locale]) }}#winners" style="padding: 0.75rem 1rem; border-radius: 12px; color: #1C2B24; text-decoration: none; font-size: 0.9rem;">Winners</a>
            <a href="{{ route('home.locale', ['locale' => $locale]) }}#partners" style="padding: 0.75rem 1rem; border-radius: 12px; color: #1C2B24; text-decoration: none; font-size: 0.9rem;">Partners</a>
            <a href="{{ route('blog', ['locale' => $locale]) }}" style="padding: 0.75rem 1rem; border-radius: 12px; color: #1C2B24; text-decoration: none; font-size: 0.9rem;">Insights</a>
            <div style="display: flex; gap: 0.5rem; padding: 0.75rem 1rem;">
                <a href="{{ route('home.locale', ['locale' => 'en']) }}" style="padding: 0.3rem 0.75rem; border-radius: 6px; font-size: 0.75rem; font-weight: 600; text-decoration: none; {{ $locale === 'en' ? 'background:#E8F5EF; color:#087F5B;' : 'color:#5B6F66;' }}">EN</a>
                <a href="{{ route('home.locale', ['locale' => 'fr']) }}" style="padding: 0.3rem 0.75rem; border-radius: 6px; font-size: 0.75rem; font-weight: 600; text-decoration: none; {{ $locale === 'fr' ? 'background:#E8F5EF; color:#087F5B;' : 'color:#5B6F66;' }}">FR</a>
            </div>
            <a href="{{ route('home.locale', ['locale' => $locale]) }}#apply" class="btn btn-primary" style="text-decoration: none; justify-content: center; margin-top: 0.5rem;">Apply now</a>
        </div>
    </div>
</nav>

<style>
@media (max-width: 768px) {
    .desktop-nav { display: none !important; }
    .mobile-toggle { display: block !important; }
    .mobile-menu.open { display: block !important; }
}
</style>
<script>
function toggleMobile() {
    document.querySelector('.mobile-menu').classList.toggle('open');
}
</script>