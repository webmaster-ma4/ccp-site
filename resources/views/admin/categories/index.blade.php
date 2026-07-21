@extends('layouts.admin')

@section('title', __('Categories'))

@section('content')

<div class="admin-action-bar" style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem; flex-wrap: wrap; gap: 1rem;">
    <p style="font-family: 'Inter', sans-serif; font-size: 0.9rem; color: #5E7590;">
        {{ $categories->count() }} {{ __('total categories') }}
    </p>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-gold">
        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        {{ __('New Category') }}
    </a>
</div>

<div class="admin-table-wrap">
    <table class="admin-table">
        <thead>
            <tr>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Slug') }}</th>
                <th style="text-align: right;">{{ __('Posts') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
            <tr>
                <td style="font-weight: 600; color: #081C3A;">{{ $category->name }}</td>
                <td>
                    <code style="background: #EEF1F5; padding: 0.2rem 0.5rem; border-radius: 4px; font-size: 0.8rem; color: #5E7590;">{{ $category->slug }}</code>
                </td>
                <td style="text-align: right; color: #5E7590; font-variant-numeric: tabular-nums;">
                    {{ $category->posts_count ?? '—' }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" style="text-align: center; padding: 3rem; color: #8FA0B4; font-family: 'Inter', sans-serif;">
                    {{ __('No categories found.') }}
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection