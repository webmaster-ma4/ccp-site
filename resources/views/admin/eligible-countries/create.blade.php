@extends('layouts.admin')

@section('content')
<div class="admin-content">
    <div class="page-header">
        <div>
            <h1 class="page-title">{{ __('Add Eligible Country') }}</h1>
            <p class="page-subtitle">{{ __('Add a new country to the eligible countries list') }}</p>
        </div>
        <a href="{{ route('admin.eligible-countries.index') }}" class="btn btn-secondary">
            {{ __('Back to list') }}
        </a>
    </div>

    <div class="card">
        <form method="POST" action="{{ route('admin.eligible-countries.store') }}">
            @csrf
            <div class="form-grid">
                <div class="form-group">
                    <label for="name" class="form-label">{{ __('Country Name') }}</label>
                    <input type="text" id="name" name="name" class="form-control" required value="{{ old('name') }}">
                    @error('name')<div class="form-error">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="iso_code" class="form-label">{{ __('ISO Code (3 letters)') }}</label>
                    <input type="text" id="iso_code" name="iso_code" class="form-control" required maxlength="3" pattern="[A-Za-z]{3}" value="{{ old('iso_code') }}">
                    @error('iso_code')<div class="form-error">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="region" class="form-label">{{ __('Region') }}</label>
                    <input type="text" id="region" name="region" class="form-control" value="{{ old('region') }}">
                    @error('region')<div class="form-error">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="display_color" class="form-label">{{ __('Display Color') }}</label>
                    <input type="color" id="display_color" name="display_color" class="form-control" value="{{ old('display_color', '#087F5B') }}">
                    @error('display_color')<div class="form-error">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="sort_order" class="form-label">{{ __('Sort Order') }}</label>
                    <input type="number" id="sort_order" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
                    @error('sort_order')<div class="form-error">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="is_active" class="form-label">{{ __('Status') }}</label>
                    <select id="is_active" name="is_active" class="form-control">
                        <option value="1" {{ old('is_active', true) ? 'selected' : '' }}>{{ __('Active') }}</option>
                        <option value="0" {{ old('is_active', true) ? '' : 'selected' }}>{{ __('Inactive') }}</option>
                    </select>
                </div>

                <div class="form-group full-width">
                    <label for="description" class="form-label">{{ __('Description') }}</label>
                    <textarea id="description" name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                    @error('description')<div class="form-error">{{ $message }}</div>@enderror
                </div>

                <div class="form-group full-width">
                    <label for="tooltip_text" class="form-label">{{ __('Tooltip Text') }}</label>
                    <textarea id="tooltip_text" name="tooltip_text" class="form-control" rows="2">{{ old('tooltip_text') }}</textarea>
                    @error('tooltip_text')<div class="form-error">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">{{ __('Save Country') }}</button>
                <a href="{{ route('admin.eligible-countries.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection