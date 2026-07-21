@extends('layouts.app')

@section('content')
    @include('components.site.breadcrumb')

    <main class="page-content">
        <section class="hero" style="grid-template-columns: 1fr;">
            <div>
                <span class="eyebrow">{{ __("Insights") }}</span>
                <h1>{{ $post->title }}</h1>
                <p>{{ $post->excerpt }}</p>
            </div>
        </section>

        <section class="section">
            <article class="card" style="line-height: 1.8;">
                <p style="margin-top: 0; font-weight: 700; color: var(--accent-strong);">{{ __("Category:") }} {{ optional($post->category)->name ?? __("General") }}</p>
                {!! nl2br(e($post->content)) !!}
            </article>
            <p style="margin-top: 1rem;"><a href="{{ route('blog', ['locale' => $locale]) }}" class="button button-secondary" style="padding: 0.55rem 0.9rem;">&larr; {{ __("Back to insights") }}</a></p>
        </section>
    </main>
@endsection
