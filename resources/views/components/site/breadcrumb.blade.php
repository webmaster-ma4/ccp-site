@php
    $breadcrumbs = $breadcrumbs ?? [];
    $currentUrl = url()->current();
    $path = parse_url($currentUrl, PHP_URL_PATH);
    $segments = array_values(array_filter(explode('/', $path)));
    
    if (empty($breadcrumbs)) {
        $breadcrumbs = [
            ['url' => url('/'), 'label' => __('Home')]
        ];
        
        $routeMap = [
            'about' => __('About'),
            'services' => __('Services'),
            'apply' => __('Apply for Support'),
            'blog' => __('Insights'),
            'contact' => __('Contact'),
            'faq' => __('FAQ'),
            'map' => __('Where We Work'),
        ];
        
        foreach ($segments as $segment) {
            $label = $routeMap[$segment] ?? ucfirst(str_replace('-', ' ', $segment));
            $url = url('/' . $segment);
            $breadcrumbs[] = ['url' => $url, 'label' => $label];
        }
    }
@endphp

@if(count($breadcrumbs) > 1)
    <nav class="breadcrumb" aria-label="breadcrumb">
        @foreach($breadcrumbs as $index => $crumb)
            @if($index > 0)
                <span class="breadcrumb-separator">›</span>
            @endif
            
            @if($index === count($breadcrumbs) - 1)
                <span aria-current="page">{{ $crumb['label'] }}</span>
            @else
                <a href="{{ $crumb['url'] }}">{{ $crumb['label'] }}</a>
            @endif
        @endforeach
    </nav>
@endif