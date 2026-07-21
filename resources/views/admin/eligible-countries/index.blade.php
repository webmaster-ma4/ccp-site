@extends('layouts.admin')

@section('title', __('Eligible Countries'))

@section('content')

<div class="admin-action-bar" style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem; flex-wrap: wrap; gap: 1rem;">
    <p style="font-family: 'Inter', sans-serif; font-size: 0.9rem; color: #5E7590;">
        {{ $countries->count() }} {{ __('total countries') }}
    </p>
    <a href="{{ route('admin.eligible-countries.create') }}" class="btn btn-gold">
        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        {{ __('Add Country') }}
    </a>
</div>

@if(session('success'))
    <div style="background: #ECFDF5; color: #059669; padding: 1rem 1.25rem; border-radius: 8px; border: 1px solid #10B981; font-family: 'Inter', sans-serif; font-size: 0.9rem; margin-bottom: 2rem;">
        {{ session('success') }}
    </div>
@endif

<div class="admin-table-wrap">
    <table class="admin-table">
        <thead>
            <tr>
                <th>{{ __('Country') }}</th>
                <th>{{ __('ISO Code') }}</th>
                <th>{{ __('Region') }}</th>
                <th>{{ __('Status') }}</th>
                <th style="text-align: right;">{{ __('Sort Order') }}</th>
                <th style="text-align: right;">{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse($countries as $country)
            <tr>
                <td>
                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                        <span style="width: 10px; height: 10px; border-radius: 50%; background: {{ $country->display_color }}; display: inline-block;"></span>
                        <div>
                            <div style="font-weight: 600; color: #081C3A;">{{ $country->name }}</div>
                            <div style="font-size: 0.75rem; color: #8FA0B4;">{{ $country->tooltip_text ? Str::limit($country->tooltip_text, 60) : '' }}</div>
                        </div>
                    </div>
                </td>
                <td><code style="background: #EEF1F5; padding: 0.2rem 0.5rem; border-radius: 4px; font-size: 0.8rem; color: #5E7590;">{{ $country->iso_code }}</code></td>
                <td style="color: #5E7590;">{{ $country->region ?: '-' }}</td>
                <td>
                    <span style="display: inline-flex; align-items: center; padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 600; background: {{ $country->is_active ? '#ECFDF5' : '#EEF1F5' }}; color: {{ $country->is_active ? '#059669' : '#5E7590' }};">
                        {{ $country->is_active ? __('Active') : __('Inactive') }}
                    </span>
                </td>
                <td style="text-align: right; color: #5E7590; font-variant-numeric: tabular-nums;">{{ $country->sort_order }}</td>
                <td style="text-align: right;">
                    <div style="display: flex; gap: 0.5rem; justify-content: flex-end;">
                        <a href="{{ route('admin.eligible-countries.edit', $country) }}" class="btn btn-outline-navy btn-sm">{{ __('Edit') }}</a>
                        <form method="POST" action="{{ route('admin.eligible-countries.destroy', $country) }}" onsubmit="return confirm('{{ __('Are you sure?') }}')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm" style="background: #FEE2E2; color: #DC2626; border: 1px solid #FECACA;">{{ __('Delete') }}</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align: center; padding: 3rem; color: #8FA0B4; font-family: 'Inter', sans-serif;">
                    {{ __('No countries found. Add your first country to get started.') }}
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection