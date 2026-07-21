@extends('layouts.admin')

@section('title', __('New Publication'))

@section('content')

<div style="max-width: 860px;">
    <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-navy btn-sm" style="margin-bottom: 2rem; display: inline-flex;">
        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        {{ __('Back to Publications') }}
    </a>

    <div style="background: #FFFFFF; border: 1px solid #E0E6ED; border-radius: 12px; padding: 2.5rem;">
        <form method="POST" action="{{ route('admin.posts.store') }}">
            @csrf

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div class="form-group" style="margin-bottom: 0; grid-column: 1/-1;">
                    <label class="form-label" for="title">{{ __('Title') }} <span style="color:#C8A04D;">*</span></label>
                    <input type="text" id="title" name="title" class="form-input" value="{{ old('title') }}" required>
                    @error('title')<p style="color:#DC2626; font-size:0.75rem; margin-top:0.25rem;">{{ $message }}</p>@enderror
                </div>
                
                <div class="form-group" style="margin-bottom: 0;">
                    <label class="form-label" for="slug">{{ __('URL Slug') }} <span style="color:#C8A04D;">*</span></label>
                    <input type="text" id="slug" name="slug" class="form-input" value="{{ old('slug') }}" placeholder="my-article-title" required>
                    @error('slug')<p style="color:#DC2626; font-size:0.75rem; margin-top:0.25rem;">{{ $message }}</p>@enderror
                </div>
                
                <div class="form-group" style="margin-bottom: 0;">
                    <label class="form-label" for="category_id">{{ __('Category') }}</label>
                    <select id="category_id" name="category_id" class="form-select">
                        <option value="">{{ __('No category') }}</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="excerpt">{{ __('Excerpt / Lead') }}</label>
                <textarea id="excerpt" name="excerpt" class="form-textarea" rows="3" placeholder="{{ __('Brief introduction shown in listings...') }}">{{ old('excerpt') }}</textarea>
                @error('excerpt')<p style="color:#DC2626; font-size:0.75rem; margin-top:0.25rem;">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="content">{{ __('Full Content') }} <span style="color:#C8A04D;">*</span></label>
                <textarea id="content" name="content" class="form-textarea" rows="16" placeholder="{{ __('Supports HTML...') }}" required>{{ old('content') }}</textarea>
                @error('content')<p style="color:#DC2626; font-size:0.75rem; margin-top:0.25rem;">{{ $message }}</p>@enderror
            </div>

            <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label" for="published_at">{{ __('Publish Date & Time') }}</label>
                <input type="datetime-local" id="published_at" name="published_at" class="form-input" value="{{ old('published_at') }}" style="max-width: 320px;">
                <p style="font-family: 'Inter', sans-serif; font-size: 0.75rem; color: #8FA0B4; margin-top: 0.4rem;">{{ __('Leave empty to save as draft.') }}</p>
            </div>

            <div style="margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid #EEF1F5; display: flex; gap: 1rem;">
                <button type="submit" class="btn btn-gold">
                    {{ __('Publish / Save') }}
                </button>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-navy">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
// Auto-generate slug from title
document.getElementById('title').addEventListener('input', function() {
    const slugInput = document.getElementById('slug');
    if (!slugInput.dataset.dirty) {
        slugInput.value = this.value.toLowerCase()
            .replace(/[àáâäãå]/g, 'a').replace(/[èéêë]/g, 'e')
            .replace(/[ìíîï]/g, 'i').replace(/[òóôöõ]/g, 'o')
            .replace(/[ùúûü]/g, 'u').replace(/[ç]/g, 'c')
            .replace(/[^a-z0-9\s-]/g, '').replace(/\s+/g, '-').replace(/-+/g, '-').trim();
    }
});
document.getElementById('slug').addEventListener('input', function() {
    this.dataset.dirty = 'true';
});
</script>
@endpush