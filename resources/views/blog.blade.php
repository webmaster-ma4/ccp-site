@extends('layouts.app')

@section('content')
    @include('components.site.navbar', ['locale' => $locale])

    <main class="page-content">
        <section class="hero" style="grid-template-columns: 1fr;">
            <div>
                <span class="eyebrow">{{ __('site.blog_label') }}</span>
                <h1>{{ __('site.blog_title') }}</h1>
                <p>{{ __('site.blog_intro') }}</p>
            </div>
        </section>

        <section class="section">
            <div style="display:flex; flex-wrap:wrap; gap:0.5rem; margin-bottom: 1rem;">
                <a href="{{ route('blog', ['locale' => $locale]) }}" class="button button-secondary" style="padding: 0.55rem 0.9rem;">All</a>
                @foreach ($categories as $category)
                    <a href="{{ route('blog.category', ['locale' => $locale, 'categorySlug' => $category->slug]) }}" class="button button-secondary" style="padding: 0.55rem 0.9rem;">{{ $category->name }}</a>
                @endforeach
            </div>
            @if ($currentCategory)
                <p style="margin-bottom: 1rem; color: var(--accent-strong); font-weight: 700;">Showing category: {{ $currentCategory->name }}</p>
            @endif
            <div class="card-grid">
                @foreach ($posts as $post)
                    <article class="card">
                        <div class="card-visual image-forest"></div>
                        <p style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: .08em; color: var(--accent);">{{ $post->published_at instanceof \Carbon\Carbon ? $post->published_at->format('d M Y') : date('d M Y', strtotime($post->published_at)) }}</p>
                        <p style="font-size: 0.85rem; font-weight: 700; color: #12553f; margin-top: -0.2rem;">{{ optional($post->category)->name ?? 'General' }}</p>
                        <h3>{{ $post->title }}</h3>
                        <p>{{ $post->excerpt }}</p>
                        <p style="margin-top: 0.8rem;"><a href="{{ route('post', ['locale' => $locale, 'slug' => $post->slug]) }}" class="button button-secondary" style="padding: 0.55rem 0.9rem;">{{ __('site.read_more') }}</a></p>
                    </article>
                @endforeach
            </div>
        </section>
    </main>

    @include('components.site.footer')
@endsection
