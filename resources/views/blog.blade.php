@extends('layouts.app')

@section('content')
    @include('components.site.breadcrumb')

    <main class="page-content">
        <section class="hero" style="grid-template-columns: 1fr;">
            <div>
                <span class="eyebrow">{{ __("Insights") }}</span>
                <h1>{{ __("Knowledge and perspectives from the field") }}</h1>
                <p>{{ __("Practical insights on climate finance, project development, and adaptation strategies for Least Developed Countries.") }}</p>
            </div>
        </section>

        <section class="section">
            <div style="display:flex; flex-wrap:wrap; gap:0.5rem; margin-bottom: 1rem;">
                <a href="{{ route('blog', ['locale' => $locale]) }}" class="button button-secondary" style="padding: 0.55rem 0.9rem;">{{ __("All") }}</a>
                @foreach ($categories as $category)
                    <a href="{{ route('blog.category', ['locale' => $locale, 'categorySlug' => $category->slug]) }}" class="button button-secondary" style="padding: 0.55rem 0.9rem;">{{ $category->name }}</a>
                @endforeach
            </div>
            @if ($currentCategory)
                <p style="margin-bottom: 1rem; color: var(--accent-strong); font-weight: 700;">{{ __("Showing category:") }} {{ $currentCategory->name }}</p>
            @endif
            <div class="card-grid">
                @forelse ($posts as $post)
                    <article class="card">
                        <div class="card-visual image-forest"></div>
                        <p style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: .08em; color: var(--accent);">{{ $post->published_at instanceof \Carbon\Carbon ? $post->published_at->format('d M Y') : date('d M Y', strtotime($post->published_at)) }}</p>
                        <p style="font-size: 0.85rem; font-weight: 700; color: #12553f; margin-top: -0.2rem;">{{ optional($post->category)->name ?? __("General") }}</p>
                        <h3>{{ $post->title }}</h3>
                        <p>{{ $post->excerpt }}</p>
                        <p style="margin-top: 0.8rem;"><a href="{{ route('post', ['locale' => $locale, 'slug' => $post->slug]) }}" class="button button-secondary" style="padding: 0.55rem 0.9rem;">{{ __("Read more") }}</a></p>
                    </article>
                @empty
                    <p>{{ __("No articles published yet. Check back soon for insights from our work in LDCs.") }}</p>
                @endforelse
            </div>
        </section>
    </main>
@endsection
