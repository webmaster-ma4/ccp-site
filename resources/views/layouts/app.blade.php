<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? __("Climate Catalyst Prize | Catalyzing Climate Solutions in LDCs") }}</title>
    <meta name="description" content="{{ $description ?? __("Climate Catalyst Prize is a global NGO helping Least Developed Countries build climate resilience, grow low-carbon economies, and access climate finance.") }}">
    <meta name="keywords" content="{{ __("climate, LDCs, climate finance, carbon markets, resilience, sustainable agriculture, low carbon economy, GCF, adaptation") }}">
    <meta name="robots" content="index,follow">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta property="og:title" content="{{ $title ?? __("Climate Catalyst Prize | Catalyzing Climate Solutions in LDCs") }}">
    <meta property="og:description" content="{{ $description ?? __("Climate Catalyst Prize is a global NGO helping Least Developed Countries build climate resilience, grow low-carbon economies, and access climate finance.") }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="{{ __("Climate Catalyst Prize") }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? __("Climate Catalyst Prize | Catalyzing Climate Solutions in LDCs") }}">
    <meta name="twitter:description" content="{{ $description ?? __("Climate Catalyst Prize is a global NGO helping Least Developed Countries build climate resilience, grow low-carbon economies, and access climate finance.") }}">
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@type": "Organization",
        "name": "Climate Catalyst Prize",
        "description": "{{ __("Climate Catalyst Prize is a global NGO helping Least Developed Countries build climate resilience, grow low-carbon economies, and access climate finance.") }}",
        "url": "{{ url('/') }}",
        "award": "Climate Catalyst Prize"
    }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">
    @endif
</head>
<body>
    @include('components.site.navbar', ['locale' => app()->getLocale()])

    <div id="app">
        @yield('content')
    </div>

    @include('components.site.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, { threshold: 0.1 });
            document.querySelectorAll('.animate-up, .animate-left, .animate-right, .animate-scale').forEach(el => {
                observer.observe(el);
            });
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                });
            });
        });
    </script>
</body>
</html>