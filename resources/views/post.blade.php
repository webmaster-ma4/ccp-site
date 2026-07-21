@extends('layouts.app')

@section('content')

{{-- POST HEADER --}}
<section class="page-hero" style="padding-top: 10rem; padding-bottom: 4.5rem;">
    <div class="container-ccp">
        <div style="max-width: 860px; margin: 0 auto; text-align: center;" class="animate-up">
            <span class="page-hero-eyebrow">{{ $post->category->name ?? __('Insight') }}</span>
            <h1 class="page-hero-title" style="margin-bottom: 1.5rem;">
                {{ $post->title }}
            </h1>
            <div style="font-family: 'Inter', sans-serif; font-size: 0.9rem; color: rgba(255, 255, 255, 0.75); display: flex; align-items: center; justify-content: center; gap: 1rem;">
                <span style="display: flex; align-items: center; gap: 0.45rem;">
                    <svg width="16" height="16" fill="none" stroke="#C8A04D" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    {{ optional($post->published_at)->format('F j, Y') }}
                </span>
                <span style="color: rgba(255, 255, 255, 0.3);">|</span>
                <span style="display: flex; align-items: center; gap: 0.45rem;">
                    <svg width="16" height="16" fill="none" stroke="#C8A04D" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    {{ __('5 min read') }}
                </span>
            </div>
        </div>
    </div>
</section>

{{-- BREADCRUMB --}}
<div class="breadcrumb">
    <a href="{{ route('home', ['locale' => $locale]) }}">{{ __('Accueil') }}</a>
    <span class="breadcrumb-sep">/</span>
    <a href="{{ route('blog', ['locale' => $locale]) }}">{{ __('Insights & Publications') }}</a>
    <span class="breadcrumb-sep">/</span>
    <span>{{ Str::limit($post->title, 40) }}</span>
</div>

{{-- POST CONTENT --}}
<section class="section-py" style="background: #FFFFFF;">
    <div class="container-ccp">
        <div style="max-width: 800px; margin: 0 auto;" class="animate-up delay-1">
            
            {{-- Featured Image Placeholder --}}
            <div style="width: 100%; aspect-ratio: 21/9; background: #E0E6ED; border-radius: 12px; margin-bottom: 3rem; overflow: hidden;">
                <img src="{{ asset('images/hero-fallback.jpg') }}" alt="Post feature" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            
            {{-- Lead Excerpt --}}
            @if($post->excerpt)
            <div style="font-family: 'Inter', sans-serif; font-size: 1.1rem; font-weight: 500; color: #162235; line-height: 1.8; margin-bottom: 2.5rem; padding-left: 1.5rem; border-left: 3px solid #C8A04D;">
                {{ $post->excerpt }}
            </div>
            @endif
            
            {{-- Body --}}
            <div class="post-body" style="font-family: 'Inter', sans-serif; font-size: 1.05rem; color: #4A5E75; line-height: 1.85;">
                {!! $post->content !!}
            </div>
            
            {{-- Share --}}
            <div style="margin-top: 4rem; padding-top: 2rem; border-top: 1px solid #EEF1F5; display: flex; align-items: center; justify-content: space-between;">
                <a href="{{ route('blog', ['locale' => $locale]) }}" class="btn btn-outline-navy btn-sm">
                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    {{ __('Back to Insights') }}
                </a>
                
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <span style="font-family: 'Inter', sans-serif; font-size: 0.8rem; font-weight: 600; color: #8FA0B4; text-transform: uppercase;">{{ __('Share:') }}</span>
                    <a href="#" style="color: #081C3A;"><svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg></a>
                    <a href="#" style="color: #081C3A;"><svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg></a>
                </div>
            </div>
            
        </div>
    </div>
</section>

@endsection

@push('head')
<style>
/* Blog post specific styles to make markdown/HTML content look institutional */
.post-body h1 { font-family: 'Cormorant Garamond', serif; font-size: 2.4rem; color: #081C3A; margin: 2.5rem 0 1rem; }
.post-body h2 { font-family: 'Cormorant Garamond', serif; font-size: 2rem; color: #081C3A; margin: 2.5rem 0 1rem; }
.post-body h3 { font-family: 'Inter', sans-serif; font-size: 1.25rem; font-weight: 700; color: #162235; margin: 2rem 0 1rem; }
.post-body p { margin-bottom: 1.5rem; }
.post-body ul { margin-bottom: 1.5rem; padding-left: 1.5rem; list-style-type: disc; }
.post-body ol { margin-bottom: 1.5rem; padding-left: 1.5rem; list-style-type: decimal; }
.post-body li { margin-bottom: 0.5rem; }
.post-body img { max-width: 100%; height: auto; border-radius: 10px; margin: 2rem 0; box-shadow: 0 4px 16px rgba(8, 28, 58, 0.08); display: block; }
.post-body a { color: #C8A04D; font-weight: 600; text-decoration: underline; text-decoration-color: rgba(200,160,77,0.4); text-underline-offset: 3px; }
.post-body a:hover { color: #9A7628; }
.post-body blockquote { font-style: italic; color: #162235; border-left: 3px solid #081C3A; padding: 0.75rem 1.5rem; margin: 2rem 0; font-size: 1.15rem; background: #F8FAFC; border-radius: 0 8px 8px 0; }
</style>
@endpush
