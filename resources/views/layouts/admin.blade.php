<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Dashboard') | {{ __('Climate Catalyst Prize') }}</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@700&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body style="margin: 0; padding: 0;">

<div class="admin-wrap">
    
    {{-- Dark Backdrop Overlay for Mobile Sidebar --}}
    <div id="admin-overlay" class="admin-overlay"></div>

    {{-- Sidebar --}}
    <aside class="admin-sidebar" id="admin-sidebar">
        <div class="admin-sidebar-logo" style="display: flex; align-items: center; justify-content: space-between;">
            <a href="{{ route('admin.dashboard') }}">
                <img src="{{ asset('images/logo-ccp-white.svg') }}" alt="CCP Admin">
            </a>
            <button type="button" id="admin-sidebar-close" class="admin-sidebar-close" aria-label="Close menu">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        
        <nav class="admin-nav">
            
            <div class="admin-nav-section">{{ __('Core') }}</div>
            <a href="{{ route('admin.dashboard') }}" class="admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                {{ __('Dashboard') }}
            </a>
            
            <div class="admin-nav-section">{{ __('Content Management') }}</div>
            <a href="{{ route('admin.posts.index') }}" class="admin-nav-link {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                {{ __('Insights & Posts') }}
            </a>
            <a href="{{ route('admin.categories.index') }}" class="admin-nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                {{ __('Categories') }}
            </a>
            
            <div class="admin-nav-section">{{ __('Global Data') }}</div>
            <a href="{{ route('admin.eligible-countries.index') }}" class="admin-nav-link {{ request()->routeIs('admin.eligible-countries.*') ? 'active' : '' }}">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                {{ __('LDC Directory') }}
            </a>
            
            <div style="margin-top: auto; padding-top: 2rem;">
                <a href="{{ route('home') }}" class="admin-nav-link" target="_blank">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    {{ __('View Public Site') }}
                </a>
                
                <form action="{{ route('logout') }}" method="POST" style="margin-top: 0.5rem;">
                    @csrf
                    <button type="submit" class="admin-nav-link" style="width: 100%; text-align: left; background: none; border: none; cursor: pointer; color: #F87171;">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        {{ __('Sign Out') }}
                    </button>
                </form>
            </div>
            
        </nav>
    </aside>
    
    {{-- Main Area --}}
    <main class="admin-main">
        <header class="admin-topbar">
            <div style="display: flex; align-items: center; gap: 0.75rem;">
                <button type="button" id="admin-sidebar-toggle" class="admin-sidebar-toggle" aria-label="Toggle menu">
                    <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
                <h1 class="admin-topbar-title">@yield('title')</h1>
            </div>
            
            <div style="display: flex; align-items: center; gap: 0.75rem;">
                <div style="font-family: 'Inter', sans-serif; font-size: 0.85rem; font-weight: 500; color: #5E7590;" class="admin-user-name">
                    {{ auth()->user()->name ?? 'Administrator' }}
                </div>
                <div style="width: 32px; height: 32px; background: #C8A04D; border-radius: 50%; color: #081C3A; display: flex; align-items: center; justify-content: center; font-family: 'Inter', sans-serif; font-weight: 700; font-size: 0.9rem; flex-shrink: 0;">
                    {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
                </div>
            </div>
        </header>
        
        <div class="admin-content">
            @if(session('success'))
                <div style="background: #ECFDF5; color: #059669; padding: 1rem; border-radius: 8px; border: 1px solid #10B981; font-family: 'Inter', sans-serif; font-size: 0.9rem; margin-bottom: 2rem;">
                    {{ session('success') }}
                </div>
            @endif
            
            @yield('content')
        </div>
    </main>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('admin-sidebar');
    const overlay = document.getElementById('admin-overlay');
    const toggleBtn = document.getElementById('admin-sidebar-toggle');
    const closeBtn = document.getElementById('admin-sidebar-close');

    function openSidebar() {
        if (sidebar) sidebar.classList.add('open');
        if (overlay) overlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeSidebar() {
        if (sidebar) sidebar.classList.remove('open');
        if (overlay) overlay.classList.remove('active');
        document.body.style.overflow = '';
    }

    if (toggleBtn) toggleBtn.addEventListener('click', openSidebar);
    if (closeBtn) closeBtn.addEventListener('click', closeSidebar);
    if (overlay) overlay.addEventListener('click', closeSidebar);

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && sidebar && sidebar.classList.contains('open')) {
            closeSidebar();
        }
    });
});
</script>

@stack('scripts')
</body>
</html>