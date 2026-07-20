<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? __('site.meta_title') }}</title>
    <meta name="description" content="{{ $description ?? __('site.meta_description') }}">
    <meta name="robots" content="index,follow">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta property="og:title" content="{{ $title ?? __('site.meta_title') }}">
    <meta property="og:description" content="{{ $description ?? __('site.meta_description') }}">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? __('site.meta_title') }}">
    <meta name="twitter:description" content="{{ $description ?? __('site.meta_description') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <style>
        :root {
            color-scheme: light;
            --bg: #f4f7f2;
            --panel: #ffffff;
            --text: #11211f;
            --muted: #5e6f6a;
            --accent: #1c7f5a;
            --accent-strong: #12553f;
            --accent-soft: #e8f5ed;
            --border: rgba(17, 33, 31, 0.12);
        }

        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: 'Instrument Sans', ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: radial-gradient(circle at top left, #f8fcf7 0%, var(--bg) 45%, #eef3ec 100%);
            color: var(--text);
        }
        a { color: inherit; text-decoration: none; }
        .site-shell { min-height: 100vh; }
        .page-content { max-width: 1200px; margin: 0 auto; padding: 1.25rem 1rem 4rem; }
        .site-nav {
            display: flex; justify-content: space-between; align-items: center; gap: 1rem;
            max-width: 1200px; margin: 0 auto; padding: 1.5rem 1rem 0;
        }
        .brand { font-weight: 800; letter-spacing: 0.08em; text-transform: uppercase; font-size: 0.95rem; }
        .brand span { color: var(--accent); }
        .nav-links { display: flex; gap: 0.65rem; align-items: center; flex-wrap: wrap; }
        .nav-links a, .locale-switcher a {
            padding: 0.65rem 0.95rem; border-radius: 999px; font-weight: 600; color: var(--muted);
            transition: background-color .2s ease, color .2s ease, transform .2s ease;
        }
        .nav-links a:hover, .locale-switcher a:hover { background: rgba(28, 127, 90, 0.08); color: var(--accent-strong); transform: translateY(-1px); }
        .locale-switcher { display: flex; gap: 0.4rem; }
        .locale-switcher .active { background: var(--accent); color: white; }
        .hero {
            display: grid; grid-template-columns: 1.1fr 0.9fr; gap: 2rem; align-items: center;
            background: linear-gradient(135deg, rgba(255,255,255,0.96) 0%, rgba(244,247,242,0.96) 100%);
            border: 1px solid var(--border); border-radius: 2rem; padding: 2.2rem; box-shadow: 0 20px 70px rgba(17, 33, 31, 0.08); margin-top: 1.6rem; overflow: hidden; position: relative;
        }
        .hero::before {
            content: '';
            position: absolute; inset: 0;
            background: linear-gradient(120deg, rgba(28,127,90,0.08) 0%, transparent 55%);
            pointer-events: none;
        }
        .eyebrow { display: inline-flex; padding: 0.45rem 0.75rem; border-radius: 999px; background: rgba(28, 127, 90, 0.12); color: var(--accent-strong); font-size: 0.8rem; font-weight: 700; text-transform: uppercase; letter-spacing: .08em; margin-bottom: 1rem; }
        .hero h1 { font-size: clamp(2rem, 4vw, 3.25rem); line-height: 1.05; margin: 0 0 1rem; }
        .hero p { font-size: 1.05rem; line-height: 1.7; color: var(--muted); margin: 0 0 1.4rem; }
        .hero-actions { display: flex; gap: 0.85rem; flex-wrap: wrap; }
        .button { display: inline-flex; align-items: center; justify-content: center; border-radius: 999px; padding: 0.85rem 1.15rem; font-weight: 700; }
        .button-primary { background: var(--accent); color: white; box-shadow: 0 10px 20px rgba(28,127,90,0.18); }
        .button-secondary { background: rgba(17, 33, 31, 0.05); color: var(--text); }
        .hero-panel { background: linear-gradient(140deg, #175f44 0%, #1c7f5a 100%); border-radius: 1.5rem; padding: 1.5rem; color: white; min-height: 320px; display: flex; flex-direction: column; justify-content: space-between; box-shadow: inset 0 1px 0 rgba(255,255,255,0.18); }
        .hero-panel ul { padding-left: 1rem; line-height: 1.8; }
        .section { margin-top: 2.2rem; }
        .section-heading { display: flex; justify-content: space-between; align-items: end; gap: 1rem; margin-bottom: 1rem; }
        .section-heading h2 { margin: 0; font-size: 1.3rem; }
        .section-heading p { margin: 0; color: var(--muted); }
        .card-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 1rem; }
        .card { background: var(--panel); border: 1px solid var(--border); border-radius: 1.25rem; padding: 1.25rem; box-shadow: 0 12px 30px rgba(17, 33, 31, 0.05); }
        .card h3 { margin-top: 0; margin-bottom: 0.45rem; }
        .card p { margin: 0; color: var(--muted); line-height: 1.65; }
        .card-visual { height: 140px; border-radius: 1rem; margin-bottom: 1rem; background-size: cover; background-position: center; }
        .image-sunrise { background-image: linear-gradient(120deg, rgba(18,85,63,0.45), rgba(28,127,90,0.15)), url('https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=900&q=80'); }
        .image-forest { background-image: linear-gradient(120deg, rgba(18,85,63,0.45), rgba(28,127,90,0.15)), url('https://images.unsplash.com/photo-1473448912268-2022ce9509d8?auto=format&fit=crop&w=900&q=80'); }
        .image-city { background-image: linear-gradient(120deg, rgba(18,85,63,0.45), rgba(28,127,90,0.15)), url('https://images.unsplash.com/photo-1494526585095-c41746248156?auto=format&fit=crop&w=900&q=80'); }
        .partner-strip {
            display: grid; grid-template-columns: repeat(5, minmax(0, 1fr)); gap: 0.8rem; margin-top: 0.5rem; align-items: center;
        }
        .partner-strip img, .partner-strip .logo {
            display: block; max-width: 100%; height: 44px; object-fit: contain; filter: grayscale(100%); opacity: 0.85;
            background: white; padding: 6px 10px; border-radius: 10px; border: 1px solid rgba(0,0,0,0.04);
        }
        .impact-panel {
            background: linear-gradient(135deg, rgba(255,255,255,0.95), rgba(232,245,237,0.95));
            border: 1px solid var(--border); border-radius: 1.5rem; padding: 1.25rem; box-shadow: 0 16px 40px rgba(17,33,31,0.05); display:flex; gap:1.25rem; align-items:center;
        }
        .impact-visual { flex:1; min-height:180px; border-radius:12px; background-image: url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1200&q=80'); background-size:cover; background-position:center; box-shadow: 0 8px 30px rgba(17,33,31,0.08); }
        .impact-copy { flex:2; }
        .impact-copy h3 { margin: 0 0 0.5rem; font-size: 1.45rem; }
        .impact-copy p { margin: 0 0 1rem; color: var(--muted); line-height: 1.7; }
        .cta-panel { margin-top: 2rem; display:flex; gap:1rem; align-items:center; justify-content:space-between; padding:1.25rem; border-radius:14px; background: linear-gradient(90deg, rgba(28,127,90,0.95), rgba(18,85,63,0.95)); color:white; box-shadow: 0 18px 50px rgba(17,33,31,0.12); }
        .cta-panel .cta-copy { max-width: 78%; }
        .cta-panel h2 { margin:0; font-size:1.25rem; }
        .cta-panel p { margin:0.35rem 0 0; opacity:0.95; }
        .cta-panel .cta-actions { display:flex; gap:0.8rem; }
        .cta-panel .button-cta { padding: 0.9rem 1.25rem; border-radius:999px; font-weight:800; }
        .button-cta.primary { background:white; color: var(--accent-strong); }
        .button-cta.ghost { background: rgba(255,255,255,0.12); color: white; border: 1px solid rgba(255,255,255,0.08); }
        .stats { display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 1rem; margin-top: 1rem; }
        .stat { background: rgba(255,255,255,0.9); border: 1px solid var(--border); border-radius: 1rem; padding: 1rem; }
        .stat strong { display: block; font-size: 1.6rem; color: var(--accent-strong); }
        .footer { max-width: 1200px; margin: 0 auto; padding: 2rem 1rem 2.2rem; color: var(--muted); font-size: 0.95rem; border-top: 1px solid var(--border); margin-top: 2rem; }
        @media (max-width: 860px) {
            .hero { grid-template-columns: 1fr; }
            .card-grid { grid-template-columns: 1fr; }
            .partner-strip { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .stats { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }
        @media (max-width: 640px) {
            .site-nav { flex-direction: column; align-items: flex-start; }
            .nav-links { gap: 0.45rem; }
            .partner-strip { grid-template-columns: 1fr; }
            .stats { grid-template-columns: 1fr; }
            .page-content { padding: 1rem 0.9rem 3rem; }
        }
    </style>
</head>
<body>
    <div class="site-shell">
        @yield('content')
    </div>
</body>
</html>
