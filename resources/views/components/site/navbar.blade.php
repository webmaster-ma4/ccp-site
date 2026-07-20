<nav class="site-nav" aria-label="Primary navigation">
    <a class="brand" href="{{ route('home.locale', ['locale' => $locale]) }}">
        Climate <span>Catalyst</span>
    </a>

    <div class="nav-links">
        <a href="{{ route('home.locale', ['locale' => $locale]) }}#mission">{{ __('site.nav_mission') }}</a>
        <a href="{{ route('home.locale', ['locale' => $locale]) }}#programs">{{ __('site.nav_programs') }}</a>
        <a href="{{ route('about', ['locale' => $locale]) }}">{{ __('site.nav_about') }}</a>
        <a href="{{ route('blog', ['locale' => $locale]) }}">{{ __('site.nav_blog') }}</a>
        <a href="{{ route('home.locale', ['locale' => $locale]) }}#impact">{{ __('site.nav_impact') }}</a>
        <a href="{{ route('admin.dashboard') }}">{{ __('site.nav_admin') }}</a>
        <div class="locale-switcher" aria-label="Language switcher">
            <a href="{{ route('home.locale', ['locale' => 'en']) }}" class="{{ $locale === 'en' ? 'active' : '' }}">EN</a>
            <a href="{{ route('home.locale', ['locale' => 'fr']) }}" class="{{ $locale === 'fr' ? 'active' : '' }}">FR</a>
        </div>
    </div>
</nav>
