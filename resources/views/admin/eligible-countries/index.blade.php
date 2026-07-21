@extends('layouts.admin')

@section('content')
<div class="admin-content">
    <div class="page-header">
        <div>
            <h1 class="page-title">{{ __('Eligible Countries') }}</h1>
            <p class="page-subtitle">{{ __('Manage countries eligible for CCP support') }}</p>
        </div>
        <a href="{{ route('admin.eligible-countries.create') }}" class="btn btn-primary">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14"/><path d="M5 12h14"/></svg>
            {{ __('Add Country') }}
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="table-wrapper">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>{{ __('Country') }}</th>
                        <th>{{ __('ISO Code') }}</th>
                        <th>{{ __('Region') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('Sort Order') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($countries as $country)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="color-dot" style="background: {{ $country->display_color }}"></span>
                                    <div>
                                        <div class="fw-semibold">{{ $country->name }}</div>
                                        <div class="text-muted small">{{ $country->tooltip_text ? Str::limit($country->tooltip_text, 60) : '' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td><code>{{ $country->iso_code }}</code></td>
                            <td>{{ $country->region ?: '-' }}</td>
                            <td>
                                <span class="badge {{ $country->is_active ? 'badge-success' : 'badge-secondary' }}">
                                    {{ $country->is_active ? __('Active') : __('Inactive') }}
                                </span>
                            </td>
                            <td>{{ $country->sort_order }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('admin.eligible-countries.edit', $country) }}" class="btn btn-sm btn-secondary">
                                        {{ __('Edit') }}
                                    </a>
                                    <form method="POST" action="{{ route('admin.eligible-countries.destroy', $country) }}" onsubmit="return confirm('{{ __('Are you sure?') }}')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">{{ __('Delete') }}</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                {{ __('No countries found. Add your first country to get started.') }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection