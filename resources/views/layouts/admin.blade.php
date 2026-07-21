<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? __('Admin Dashboard') }} | {{ __('Climate Catalyst Prize') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <style>
        :root {
            --sidebar-width: 260px;
            --topbar-height: 64px;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: 'Manrope', sans-serif;
            background: #F5F1E8;
            color: #1C2B24;
        }
        .admin-layout {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: var(--sidebar-width);
            background: #1C2B24;
            color: #fff;
            position: fixed;
            inset: 0 auto 0 0;
            z-index: 40;
            display: flex;
            flex-direction: column;
        }
        .sidebar-brand {
            height: var(--topbar-height);
            display: flex;
            align-items: center;
            padding: 0 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            font-size: 1rem;
            color: #fff;
            text-decoration: none;
        }
        .sidebar-brand span { color: #20C997; }
        .sidebar-nav {
            flex: 1;
            padding: 1.25rem 0;
            overflow-y: auto;
        }
        .sidebar-section {
            padding: 0.5rem 1.25rem 0.25rem;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: rgba(255,255,255,0.4);
            font-weight: 600;
        }
        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.7rem 1.25rem;
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.2s;
            border-left: 3px solid transparent;
        }
        .sidebar-link:hover, .sidebar-link.active {
            color: #fff;
            background: rgba(255,255,255,0.05);
            border-left-color: #20C997;
        }
        .sidebar-link svg {
            width: 18px;
            height: 18px;
            opacity: 0.7;
        }
        .sidebar-footer {
            padding: 1rem 1.25rem;
            border-top: 1px solid rgba(255,255,255,0.08);
        }
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            display: flex;
            flex-direction: column;
            min-width: 0;
        }
        .topbar {
            height: var(--topbar-height);
            background: #fff;
            border-bottom: 1px solid #E2E8E2;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2rem;
            position: sticky;
            top: 0;
            z-index: 30;
        }
        .topbar-title {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            font-size: 1.1rem;
        }
        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .admin-content {
            flex: 1;
            padding: 2rem;
            max-width: 1400px;
        }
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1.5rem;
            gap: 1rem;
        }
        .page-title {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 1.75rem;
            font-weight: 700;
            margin: 0 0 0.25rem;
        }
        .page-subtitle {
            margin: 0;
            color: #5B6F66;
            font-size: 0.9rem;
        }
        .card {
            background: #fff;
            border: 1px solid #E2E8E2;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 1px 3px rgba(28,43,36,0.04);
        }
        .table-wrapper { overflow-x: auto; }
        .data-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
        }
        .data-table th {
            text-align: left;
            padding: 0.75rem 1rem;
            border-bottom: 1px solid #E2E8E2;
            color: #5B6F66;
            font-weight: 600;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        .data-table td {
            padding: 1rem;
            border-bottom: 1px solid #E2E8E2;
            vertical-align: middle;
        }
        .data-table tr:last-child td { border-bottom: none; }
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.65rem 1.25rem;
            border-radius: 9999px;
            font-family: 'Manrope', sans-serif;
            font-size: 0.85rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s;
            cursor: pointer;
            border: none;
        }
        .btn-primary {
            background: #087F5B;
            color: #fff;
            box-shadow: 0 4px 12px rgba(8,127,91,0.2);
        }
        .btn-primary:hover { background: #06694B; }
        .btn-secondary {
            background: #fff;
            color: #1C2B24;
            border: 1px solid #E2E8E2;
        }
        .btn-secondary:hover { background: #F5F1E8; }
        .btn-sm { padding: 0.45rem 0.9rem; font-size: 0.8rem; }
        .btn-danger { background: #DC2626; color: #fff; }
        .btn-danger:hover { background: #B91C1C; }
        .badge {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.6rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        .badge-success { background: #E8F5EF; color: #087F5B; }
        .badge-secondary { background: #E2E8E2; color: #5B6F66; }
        .alert {
            padding: 0.85rem 1rem;
            border-radius: 12px;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }
        .alert-success { background: #E8F5EF; color: #087F5B; border: 1px solid #C6E7D8; }
        .form-control {
            width: 100%;
            padding: 0.65rem 0.9rem;
            border: 1px solid #E2E8E2;
            border-radius: 10px;
            font-family: 'Manrope', sans-serif;
            font-size: 0.9rem;
            background: #fff;
            transition: all 0.2s;
        }
        .form-control:focus {
            outline: none;
            border-color: #087F5B;
            box-shadow: 0 0 0 3px rgba(8,127,91,0.1);
        }
        .form-label {
            display: block;
            margin-bottom: 0.4rem;
            font-weight: 600;
            font-size: 0.85rem;
        }
        .form-error {
            color: #DC2626;
            font-size: 0.8rem;
            margin-top: 0.35rem;
        }
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.25rem;
        }
        .form-group.full-width { grid-column: span 2; }
        .form-actions {
            display: flex;
            gap: 0.75rem;
            margin-top: 1.5rem;
        }
        .d-flex { display: flex; }
        .align-items-center { align-items: center; }
        .gap-2 { gap: 0.5rem; }
        .fw-semibold { font-weight: 600; }
        .text-muted { color: #5B6F66; }
        .small { font-size: 0.8rem; }
        .color-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            display: inline-block;
            flex-shrink: 0;
        }
        .py-4 { padding-top: 1rem; padding-bottom: 1rem; }
        .text-center { text-align: center; }
        code {
            background: #F5F1E8;
            padding: 0.15rem 0.4rem;
            border-radius: 4px;
            font-size: 0.8rem;
        }
        @media (max-width: 768px) {
            .sidebar { display: none; }
            .main-content { margin-left: 0; }
            .form-grid { grid-template-columns: 1fr; }
            .form-group.full-width { grid-column: span 1; }
            .admin-content { padding: 1rem; }
            .page-header { flex-direction: column; }
        }
    </style>
</head>
<body>
    <div class="admin-layout">
        <aside class="sidebar">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
                CC <span>Climate Catalyst</span>
            </a>
            <nav class="sidebar-nav">
                <div class="sidebar-section">{{ __('Main') }}</div>
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
                    {{ __('Dashboard') }}
                </a>
                <a href="{{ route('admin.posts.index') }}" class="sidebar-link {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                    {{ __('Articles') }}
                </a>
                <a href="{{ route('admin.categories.index') }}" class="sidebar-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
                    {{ __('Categories') }}
                </a>

                <div class="sidebar-section">{{ __('Program') }}</div>
                <a href="{{ route('admin.eligible-countries.index') }}" class="sidebar-link {{ request()->routeIs('admin.eligible-countries.*') ? 'active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M2 12h20"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                    {{ __('Eligible Countries') }}
                </a>
            </nav>
            <div class="sidebar-footer">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="sidebar-link" style="background: none; border: none; color: inherit; cursor: pointer; width: 100%; text-align: left;">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                        {{ __('Logout') }}
                    </button>
                </form>
            </div>
        </aside>

        <div class="main-content">
            <header class="topbar">
                <div class="topbar-title">{{ $title ?? __('Dashboard') }}</div>
                <div class="topbar-actions">
                    <a href="{{ url('/') }}" target="_blank" class="btn btn-secondary btn-sm">
                        {{ __('View Site') }}
                    </a>
                </div>
            </header>

            <main class="admin-content">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>