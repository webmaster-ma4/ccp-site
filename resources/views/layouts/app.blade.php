<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? __('Climate Catalyst Prize | Catalyzing Climate Solutions in LDCs') }}</title>
    <meta name="description" content="{{ $description ?? __('Climate Catalyst Prize is a global NGO helping Least Developed Countries build climate resilience, grow low-carbon economies, and access climate finance.') }}">
    <meta name="keywords" content="{{ __('climate, LDCs, climate finance, carbon markets, resilience, sustainable agriculture, low carbon economy, GCF, adaptation') }}">
    <meta name="robots" content="index,follow">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Open Graph --}}
    <meta property="og:title" content="{{ $title ?? __('Climate Catalyst Prize | Catalyzing Climate Solutions in LDCs') }}">
    <meta property="og:description" content="{{ $description ?? __('Climate Catalyst Prize is a global NGO helping Least Developed Countries build climate resilience, grow low-carbon economies, and access climate finance.') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="{{ __('Climate Catalyst Prize') }}">
    <meta property="og:image" content="{{ asset('images/og-ccp.jpg') }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? __('Climate Catalyst Prize | Catalyzing Climate Solutions in LDCs') }}">
    <meta name="twitter:description" content="{{ $description ?? __('Climate Catalyst Prize is a global NGO helping Least Developed Countries build climate resilience, grow low-carbon economies, and access climate finance.') }}">
    <meta name="twitter:image" content="{{ asset('images/og-ccp.jpg') }}">

    {{-- JSON-LD Organization --}}
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@type": "Organization",
        "name": "Climate Catalyst Prize",
        "description": "{{ __('Climate Catalyst Prize is a global NGO helping Least Developed Countries build climate resilience, grow low-carbon economies, and access climate finance.') }}",
        "url": "{{ url('/') }}",
        "logo": "{{ asset('images/logo-ccp.svg') }}",
        "sameAs": [],
        "address": {
            "@type": "PostalAddress",
            "addressCountry": "International"
        }
    }
    </script>

    {{-- Google Fonts: Cormorant Garamond (Headings) + Inter (Body) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">
    @endif

    @stack('head')
</head>
<body>
    @include('components.site.navbar', ['locale' => app()->getLocale()])

    <div id="app">
        @yield('content')
    </div>

    @include('components.site.footer')

    <script>
    document.addEventListener('DOMContentLoaded', function () {

        // ——— Scroll animations ———
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

        document.querySelectorAll('.animate-up, .animate-left, .animate-right').forEach(el => {
            observer.observe(el);
        });

        // ——— Impact stat counter animation ———
        const statObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !entry.target.dataset.counted) {
                    entry.target.dataset.counted = '1';
                    entry.target.classList.add('visible');
                    const el = entry.target.querySelector('.impact-number[data-target]');
                    if (el) animateCount(el);
                }
            });
        }, { threshold: 0.3 });

        document.querySelectorAll('.impact-stat').forEach(el => statObserver.observe(el));

        function animateCount(el) {
            const target = parseFloat(el.dataset.target);
            const prefix = el.dataset.prefix || '';
            const suffix = el.dataset.suffix || '';
            const isDecimal = el.dataset.decimal === '1';
            const duration = 2200;
            const start = performance.now();

            function update(time) {
                const elapsed = time - start;
                const progress = Math.min(elapsed / duration, 1);
                const ease = 1 - Math.pow(1 - progress, 3);
                const current = target * ease;
                el.textContent = prefix + (isDecimal ? current.toFixed(1) : Math.floor(current)) + suffix;
                if (progress < 1) requestAnimationFrame(update);
                else el.textContent = prefix + (isDecimal ? target.toFixed(1) : target) + suffix;
            }
            requestAnimationFrame(update);
        }

        // ——— Navbar scroll ———
        const navbar = document.getElementById('main-navbar');
        if (navbar) {
            const handleScroll = () => {
                navbar.classList.toggle('scrolled', window.scrollY > 50);
            };
            window.addEventListener('scroll', handleScroll, { passive: true });
            handleScroll();
        }

        // ——— Mobile drawer ———
        const toggle = document.getElementById('nav-toggle');
        const drawer = document.getElementById('mobile-drawer');
        const overlay = document.getElementById('drawer-overlay');
        const close   = document.getElementById('drawer-close');

        function openDrawer()  {
            drawer?.classList.add('open');
            overlay?.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
        function closeDrawer() {
            drawer?.classList.remove('open');
            overlay?.classList.remove('active');
            document.body.style.overflow = '';
        }

        toggle?.addEventListener('click', openDrawer);
        close?.addEventListener('click', closeDrawer);
        overlay?.addEventListener('click', closeDrawer);

        // ——— Smooth anchor scroll ———
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                if (href === '#') return;
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            });
        });

        // ——— FAQ accordion ———
        document.querySelectorAll('.faq-question').forEach(btn => {
            btn.addEventListener('click', function () {
                const item = this.closest('.faq-item');
                const isOpen = item.classList.contains('open');
                document.querySelectorAll('.faq-item.open').forEach(i => i.classList.remove('open'));
                if (!isOpen) item.classList.add('open');
            });
        });
    });
    </script>

    @stack('scripts')
</body>
</html>