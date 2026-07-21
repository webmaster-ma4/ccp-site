@extends('layouts.admin')

@section('title', __('Edit Publication'))

@section('content')

<div style="max-width: 860px;">
    <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-navy btn-sm" style="margin-bottom: 2rem; display: inline-flex;">
        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        {{ __('Back to Publications') }}
    </a>

    @if(session('success'))
        <div style="background: #ECFDF5; color: #059669; padding: 1rem 1.25rem; border-radius: 8px; border: 1px solid #10B981; font-family: 'Inter', sans-serif; font-size: 0.9rem; margin-bottom: 2rem;">
            {{ session('success') }}
        </div>
    @endif

    <div style="background: #FFFFFF; border: 1px solid #E0E6ED; border-radius: 12px; padding: 2.5rem;">
        <form method="POST" action="{{ route('admin.posts.update', $post) }}">
            @csrf
            @method('PUT')

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div class="form-group" style="margin-bottom: 0; grid-column: 1/-1;">
                    <label class="form-label" for="title">{{ __('Title') }} <span style="color:#C8A04D;">*</span></label>
                    <input type="text" id="title" name="title" class="form-input" value="{{ old('title', $post->title) }}" required>
                    @error('title')<p style="color:#DC2626; font-size:0.75rem; margin-top:0.25rem;">{{ $message }}</p>@enderror
                </div>
                
                <div class="form-group" style="margin-bottom: 0;">
                    <label class="form-label" for="slug">{{ __('URL Slug') }} <span style="color:#C8A04D;">*</span></label>
                    <input type="text" id="slug" name="slug" class="form-input" value="{{ old('slug', $post->slug) }}" required>
                    @error('slug')<p style="color:#DC2626; font-size:0.75rem; margin-top:0.25rem;">{{ $message }}</p>@enderror
                </div>
                
                <div class="form-group" style="margin-bottom: 0;">
                    <label class="form-label" for="category_id">{{ __('Category') }}</label>
                    <select id="category_id" name="category_id" class="form-select">
                        <option value="">{{ __('No category') }}</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="excerpt">{{ __('Excerpt / Lead') }}</label>
                <textarea id="excerpt" name="excerpt" class="form-textarea" rows="3">{{ old('excerpt', $post->excerpt) }}</textarea>
                @error('excerpt')<p style="color:#DC2626; font-size:0.75rem; margin-top:0.25rem;">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="content">{{ __('Full Content') }} <span style="color:#C8A04D;">*</span></label>
                <textarea id="content" name="content" class="form-textarea" rows="16" required>{{ old('content', $post->content) }}</textarea>
                @error('content')<p style="color:#DC2626; font-size:0.75rem; margin-top:0.25rem;">{{ $message }}</p>@enderror
            </div>

            <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label" for="published_at">{{ __('Publish Date & Time') }}</label>
                <input type="datetime-local" id="published_at" name="published_at" class="form-input"
                    value="{{ old('published_at', $post->published_at?->format('Y-m-d\TH:i')) }}"
                    style="max-width: 320px;">
                <p style="font-family: 'Inter', sans-serif; font-size: 0.75rem; color: #8FA0B4; margin-top: 0.4rem;">{{ __('Clear to unpublish and save as draft.') }}</p>
            </div>

            <div style="margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid #EEF1F5; display: flex; align-items: center; gap: 1rem;">
                <button type="submit" class="btn btn-gold">
                    {{ __('Save Changes') }}
                </button>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-navy">{{ __('Cancel') }}</a>
                
                {{-- Quick link to view on site --}}
                @if($post->published_at)
                <a href="{{ route('post', ['locale' => app()->getLocale(), 'slug' => $post->slug]) }}" target="_blank" class="btn btn-sm" style="margin-left: auto; background: #EEF1F5; color: #5E7590; border: 1px solid #E0E6ED;">
                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    {{ __('View on Site') }}
                </a>
                @endif
            </div>
        </form>
    </div>
</div>

@endsection