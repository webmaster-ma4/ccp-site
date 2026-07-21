@extends('layouts.admin')

@section('title', __('New Category'))

@section('content')

<div style="max-width: 540px;">
    <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-navy btn-sm" style="margin-bottom: 2rem; display: inline-flex;">
        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        {{ __('Back to Categories') }}
    </a>

    <div style="background: #FFFFFF; border: 1px solid #E0E6ED; border-radius: 12px; padding: 2.5rem;">
        <form method="POST" action="{{ route('admin.categories.store') }}">
            @csrf

            <div class="form-group">
                <label class="form-label" for="name">{{ __('Category Name') }} <span style="color:#C8A04D;">*</span></label>
                <input type="text" id="name" name="name" class="form-input" value="{{ old('name') }}" required>
                @error('name')<p style="color:#DC2626; font-size:0.75rem; margin-top:0.25rem;">{{ $message }}</p>@enderror
            </div>

            <div class="form-group" style="margin-bottom: 2rem;">
                <label class="form-label" for="slug">{{ __('URL Slug') }} <span style="color:#C8A04D;">*</span></label>
                <input type="text" id="slug" name="slug" class="form-input" value="{{ old('slug') }}" placeholder="e.g. carbon-markets" required>
                @error('slug')<p style="color:#DC2626; font-size:0.75rem; margin-top:0.25rem;">{{ $message }}</p>@enderror
            </div>

            <div style="display: flex; gap: 1rem;">
                <button type="submit" class="btn btn-gold">{{ __('Create Category') }}</button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-navy">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
document.getElementById('name').addEventListener('input', function() {
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