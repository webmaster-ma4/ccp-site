@extends('layouts.admin')

@section('title', __('Edit Eligible Country'))

@section('content')
<div style="max-width: 540px;">
    <a href="{{ route('admin.eligible-countries.index') }}" class="btn btn-outline-navy btn-sm" style="margin-bottom: 2rem; display: inline-flex;">
        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        {{ __('Back to list') }}
    </a>

    <div style="background: #FFFFFF; border: 1px solid #E0E6ED; border-radius: 12px; padding: 2.5rem;">
        <form method="POST" action="{{ route('admin.eligible-countries.update', $country) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="form-label" for="name">{{ __('Country Name') }} <span style="color:#C8A04D;">*</span></label>
                <input type="text" id="name" name="name" class="form-input" value="{{ old('name', $country->name) }}" required>
                @error('name')<p style="color:#DC2626; font-size:0.75rem; margin-top:0.25rem;">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="iso_code">{{ __('ISO Code (3 letters)') }} <span style="color:#C8A04D;">*</span></label>
                <input type="text" id="iso_code" name="iso_code" class="form-input" value="{{ old('iso_code', $country->iso_code) }}" maxlength="3" pattern="[A-Za-z]{3}" required>
                @error('iso_code')<p style="color:#DC2626; font-size:0.75rem; margin-top:0.25rem;">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="region">{{ __('Region') }}</label>
                <input type="text" id="region" name="region" class="form-input" value="{{ old('region', $country->region) }}">
                @error('region')<p style="color:#DC2626; font-size:0.75rem; margin-top:0.25rem;">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="display_color">{{ __('Display Color') }}</label>
                <input type="color" id="display_color" name="display_color" class="form-input" value="{{ old('display_color', $country->display_color) }}">
                @error('display_color')<p style="color:#DC2626; font-size:0.75rem; margin-top:0.25rem;">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="sort_order">{{ __('Sort Order') }}</label>
                <input type="number" id="sort_order" name="sort_order" class="form-input" value="{{ old('sort_order', $country->sort_order) }}">
                @error('sort_order')<p style="color:#DC2626; font-size:0.75rem; margin-top:0.25rem;">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="is_active">{{ __('Status') }}</label>
                <select id="is_active" name="is_active" class="form-input">
                    <option value="1" {{ old('is_active', $country->is_active) ? 'selected' : '' }}>{{ __('Active') }}</option>
                    <option value="0" {{ old('is_active', $country->is_active) ? '' : 'selected' }}>{{ __('Inactive') }}</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label" for="description">{{ __('Description') }}</label>
                <textarea id="description" name="description" class="form-input" rows="3">{{ old('description', $country->description) }}</textarea>
                @error('description')<p style="color:#DC2626; font-size:0.75rem; margin-top:0.25rem;">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="tooltip_text">{{ __('Tooltip Text') }}</label>
                <textarea id="tooltip_text" name="tooltip_text" class="form-input" rows="2">{{ old('tooltip_text', $country->tooltip_text) }}</textarea>
                @error('tooltip_text')<p style="color:#DC2626; font-size:0.75rem; margin-top:0.25rem;">{{ $message }}</p>@enderror
            </div>

            <div style="display: flex; gap: 1rem;">
                <button type="submit" class="btn btn-gold">{{ __('Update Country') }}</button>
                <a href="{{ route('admin.eligible-countries.index') }}" class="btn btn-outline-navy">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection
