@extends('layouts.admin')

@section('content')
<div class="admin-content">
    <div class="page-header">
        <div>
            <h1 class="page-title">{{ __('Dashboard') }}</h1>
            <p class="page-subtitle">{{ __('Welcome to the Climate Catalyst Prize admin panel') }}</p>
        </div>
    </div>

    <!-- Stats -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
            </div>
            <div class="stat-info">
                <div class="stat-value">{{ $postsCount }}</div>
                <div class="stat-label">{{ __('Articles') }}</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
            </div>
            <div class="stat-info">
                <div class="stat-value">{{ $categoriesCount }}</div>
                <div class="stat-label">{{ __('Categories') }}</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M2 12h20"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
            </div>
            <div class="stat-info">
                <div class="stat-value">{{ $activeCountriesCount }}</div>
                <div class="stat-label">{{ __('Active Countries') }}</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            </div>
            <div class="stat-info">
                <div class="stat-value">{{ $countriesCount }}</div>
                <div class="stat-label">{{ __('Total Countries') }}</div>
            </div>
        </div>
    </div>

    <div class="dashboard-grid">
        <!-- Recent Articles -->
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">{{ __('Recent Articles') }}</h2>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-sm btn-secondary">{{ __('View all') }}</a>
            </div>
            <div class="table-wrapper">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>{{ __('Title') }}</th>
                            <th>{{ __('Category') }}</th>
                            <th>{{ __('Published') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentPosts as $post)
                            <tr>
                                <td>
                                    <div class="fw-semibold">{{ $post->title }}</div>
                                </td>
                                <td>{{ optional($post->category)->name ?? __('No category') }}</td>
                                <td>{{ $post->published_at ? $post->published_at->format('d M Y') : __('Draft') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center py-4 text-muted">
                                    {{ __('No articles yet. Create your first article to get started.') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="card">
            <h2 class="card-title" style="margin: 0 0 1.25rem;">{{ __('Quick Actions') }}</h2>
            <div class="quick-actions">
                <a href="{{ route('admin.posts.create') }}" class="quick-action-item">
                    <div class="quick-action-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14"/><path d="M5 12h14"/></svg>
                    </div>
                    <div>
                        <div class="quick-action-title">{{ __('New Article') }}</div>
                        <div class="quick-action-desc">{{ __('Create a new blog post or insight') }}</div>
                    </div>
                </a>
                <a href="{{ route('admin.categories.create') }}" class="quick-action-item">
                    <div class="quick-action-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
                    </div>
                    <div>
                        <div class="quick-action-title">{{ __('New Category') }}</div>
                        <div class="quick-action-desc">{{ __('Add a new content category') }}</div>
                    </div>
                </a>
                <a href="{{ route('admin.eligible-countries.create') }}" class="quick-action-item">
                    <div class="quick-action-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M2 12h20"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                    </div>
                    <div>
                        <div class="quick-action-title">{{ __('Add Country') }}</div>
                        <div class="quick-action-desc">{{ __('Manage eligible countries') }}</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 1.25rem;
        margin-bottom: 1.5rem;
    }
    .stat-card {
        background: #fff;
        border: 1px solid #E2E8E2;
        border-radius: 16px;
        padding: 1.25rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        box-shadow: 0 1px 3px rgba(28,43,36,0.04);
    }
    .stat-icon {
        width: 48px;
        height: 48px;
        background: #E8F5EF;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #087F5B;
        flex-shrink: 0;
    }
    .stat-value {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 1.75rem;
        font-weight: 700;
        color: #1C2B24;
        line-height: 1;
        margin-bottom: 0.25rem;
    }
    .stat-label {
        font-size: 0.85rem;
        color: #5B6F66;
        font-weight: 500;
    }
    .dashboard-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 1.5rem;
    }
    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
    }
    .card-title {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 1.1rem;
        font-weight: 700;
        margin: 0;
    }
    .quick-actions {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }
    .quick-action-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        border-radius: 12px;
        background: #F5F1E8;
        text-decoration: none;
        color: #1C2B24;
        transition: all 0.2s;
        border: 1px solid transparent;
    }
    .quick-action-item:hover {
        background: #E8F5EF;
        border-color: #087F5B;
        transform: translateX(4px);
    }
    .quick-action-icon {
        width: 40px;
        height: 40px;
        background: #fff;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #087F5B;
        flex-shrink: 0;
    }
    .quick-action-title {
        font-weight: 600;
        font-size: 0.9rem;
        margin-bottom: 0.15rem;
    }
    .quick-action-desc {
        font-size: 0.8rem;
        color: #5B6F66;
    }
    @media (max-width: 1024px) {
        .dashboard-grid { grid-template-columns: 1fr; }
    }
    @media (max-width: 768px) {
        .stats-grid { grid-template-columns: 1fr; }
    }
</style>
@endsection