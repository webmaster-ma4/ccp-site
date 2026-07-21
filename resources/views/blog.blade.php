@extends('layouts.app')

@section('content')

{{-- PAGE HERO --}}
<section class="page-hero">
    <div class="animate-up">
        <span class="page-hero-eyebrow">{{ __('Knowledge Hub') }}</span>
        <h1 class="page-hero-title">{{ __('Insights & Reports') }}</h1>
        <p class="page-hero-subtitle">
            {{ __('Latest research, policy briefs, and updates on climate finance and adaptation in Least Developed Countries.') }}
        </p>
    </div>
</section>

{{-- BREADCRUMB --}}
<div class="breadcrumb">
    <a href="{{ route('home', ['locale' => $locale]) }}">{{ __('Home') }}</a>
    <span class="breadcrumb-sep">/</span>
    <span>{{ __('Insights') }}</span>
</div>

<section class="section-py" style="background: #FFFFFF;">
    <div class="container-ccp">
        
        <div class="insights-filters animate-up">
            <a href="{{ route('blog', ['locale' => $locale]) }}" class="filter-btn {{ !isset($currentCategory) ? 'active' : '' }}">
                {{ __('All Publications') }}
            </a>
            @foreach($categories as $category)
                <a href="{{ route('blog.category', ['locale' => $locale, 'categorySlug' => $category->slug]) }}" class="filter-btn {{ (isset($currentCategory) && $currentCategory->id === $category->id) ? 'active' : '' }}">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>
        
        <div class="insights-page-grid">
            
            {{-- MAIN CONTENT: POSTS GRID --}}
            <div>
                @if($posts->count() > 0)
                    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 1.5rem;">
                        @foreach($posts as $post)
                            <a href="{{ route('post', ['locale' => $locale, 'slug' => $post->slug]) }}" class="insight-card">
                                <div class="insight-img">
                                    <img src="{{ asset('images/blog-' . ($loop->index % 3 + 1) . '.jpg') }}" alt="{{ $post->title }}">
                                </div>
                                <div class="insight-body">
                                    <span class="insight-category">{{ $post->category->name ?? 'Policy' }}</span>
                                    <h4 class="insight-title">{{ $post->title }}</h4>
                                    <p class="insight-excerpt">{{ Str::limit(strip_tags($post->excerpt ?? $post->content), 120) }}</p>
                                    <div class="insight-footer">
                                        <span class="insight-date">{{ $post->published_at->format('M d, Y') }}</span>
                                        <span class="insight-read-more">{{ __('Read Article') }} <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg></span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    
                    {{-- Pagination Placeholder --}}
                    <div class="pagination">
                        <a href="#" class="page-link active">1</a>
                        <a href="#" class="page-link">2</a>
                        <a href="#" class="page-link">3</a>
                        <a href="#" class="page-link"><svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></a>
                    </div>
                @else
                    <div style="padding: 4rem; text-align: center; background: #F6F8FA; border-radius: 12px; border: 1px dashed #C8D4E0;">
                        <svg width="48" height="48" fill="none" stroke="#C8D4E0" viewBox="0 0 24 24" style="margin: 0 auto 1rem;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                        <h3 style="font-family: 'Inter', sans-serif; font-size: 1.1rem; color: #081C3A; margin-bottom: 0.5rem;">{{ __('No publications found') }}</h3>
                        <p style="font-family: 'Inter', sans-serif; font-size: 0.9rem; color: #5E7590;">{{ __('Check back later for new insights and reports.') }}</p>
                    </div>
                @endif
            </div>
            
            {{-- SIDEBAR --}}
            <aside>
                {{-- Newsletter --}}
                <div style="background: #081C3A; padding: 2rem; border-radius: 12px; margin-bottom: 2rem;">
                    <h4 style="font-family: 'Cormorant Garamond', serif; font-size: 1.5rem; color: #FFFFFF; margin-bottom: 0.5rem;">{{ __('Stay Informed') }}</h4>
                    <p style="font-family: 'Inter', sans-serif; font-size: 0.85rem; color: rgba(255,255,255,0.7); line-height: 1.6; margin-bottom: 1.5rem;">
                        {{ __('Get the latest climate finance updates and policy briefs delivered to your inbox.') }}
                    </p>
                    <form action="#" method="POST">
                        <input type="email" class="form-input" placeholder="{{ __('Email address') }}" style="margin-bottom: 1rem;" required>
                        <button type="submit" class="btn btn-gold w-full" style="width: 100%; justify-content: center;">{{ __('Subscribe') }}</button>
                    </form>
                </div>
                
                {{-- Featured Report --}}
                <div style="background: #F6F8FA; padding: 2rem; border-radius: 12px; border: 1px solid #E0E6ED;">
                    <span class="eyebrow" style="margin-bottom: 1rem;">{{ __('Featured Report') }}</span>
                    <h4 style="font-family: 'Inter', sans-serif; font-size: 1.1rem; font-weight: 700; color: #081C3A; line-height: 1.4; margin-bottom: 1rem;">
                        {{ __('The State of Climate Finance in LDCs 2024') }}
                    </h4>
                    <img src="{{ asset('images/report-cover.jpg') }}" alt="Report" style="width: 100%; border-radius: 6px; margin-bottom: 1rem; box-shadow: 0 8px 24px rgba(8,28,58,0.1);">
                    <a href="#" class="btn btn-outline-navy btn-sm w-full" style="width: 100%; justify-content: center;">
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        {{ __('Download PDF') }}
                    </a>
                </div>
            </aside>
            
        </div>
    </div>
</section>

@endsection
