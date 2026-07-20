@extends('layouts.app')

@section('content')
    @include('components.site.navbar', ['locale' => $locale])

    <main class="page-content">
        <section class="hero" style="grid-template-columns: 1fr;">
            <div>
                <span class="eyebrow">{{ __('site.blog_label') }}</span>
                <h1>{{ $post->title }}</h1>
                <p>{{ $post->excerpt }}</p>
            </div>
        </section>

        <section class="section">
            <article class="card" style="line-height: 1.8;">
                <p style="margin-top: 0; font-weight: 700; color: var(--accent-strong);">Category: {{ optional($post->category)->name ?? 'General' }}</p>
                {!! nl2br(e($post->content)) !!}
            </article>
        </section>
    </main>

    @include('components.site.footer')
@endsection
