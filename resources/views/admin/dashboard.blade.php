@extends('layouts.admin')

@section('content')

{{-- STAT CARDS --}}
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 1.5rem; margin-bottom: 2.5rem;">
    
    <div class="admin-stat-card">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1rem;">
            <div class="admin-stat-label">{{ __('Total Insights') }}</div>
            <div class="admin-stat-icon" style="background: rgba(8,28,58,0.06); color: #081C3A;">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
            </div>
        </div>
        <div class="admin-stat-value">{{ $postsCount }}</div>
    </div>
    
    <div class="admin-stat-card">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1rem;">
            <div class="admin-stat-label">{{ __('Categories') }}</div>
            <div class="admin-stat-icon" style="background: rgba(200,160,77,0.1); color: #C8A04D;">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
            </div>
        </div>
        <div class="admin-stat-value">{{ $categoriesCount }}</div>
    </div>
    
    <div class="admin-stat-card">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1rem;">
            <div class="admin-stat-label">{{ __('LDCs Tracking') }}</div>
            <div class="admin-stat-icon" style="background: rgba(34,197,94,0.1); color: #22C55E;">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
        </div>
        <div class="admin-stat-value">{{ $activeCountriesCount }} <span style="font-family: 'Inter', sans-serif; font-size: 0.8rem; font-weight: 500; color: #8FA0B4;">/ {{ $countriesCount }}</span></div>
    </div>

</div>

{{-- RECENT ACTIVITY --}}
<div class="admin-dashboard-grid" style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem;">
    
    <div>
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem;">
            <h3 style="font-family: 'Inter', sans-serif; font-size: 1.1rem; font-weight: 700; color: #081C3A; margin: 0;">{{ __('Recent Publications') }}</h3>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-navy btn-sm">{{ __('View All') }}</a>
        </div>
        
        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>{{ __('Title') }}</th>
                        <th>{{ __('Category') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th style="text-align: right;">{{ __('Date') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentPosts as $post)
                    <tr>
                        <td style="font-weight: 600;">
                            <a href="{{ route('admin.posts.edit', $post) }}" style="color: #081C3A; text-decoration: none;">
                                {{ Str::limit($post->title, 45) }}
                            </a>
                        </td>
                        <td>{{ $post->category->name ?? '-' }}</td>
                        <td>
                            @if($post->published_at)
                                <span class="admin-badge published">{{ __('Published') }}</span>
                            @else
                                <span class="admin-badge draft">{{ __('Draft') }}</span>
                            @endif
                        </td>
                        <td style="text-align: right; color: #8FA0B4;">
                            {{ $post->created_at->format('M d, Y') }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" style="text-align: center; padding: 2rem; color: #8FA0B4;">
                            {{ __('No publications found.') }}
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    <div>
        <h3 style="font-family: 'Inter', sans-serif; font-size: 1.1rem; font-weight: 700; color: #081C3A; margin: 0 0 1rem 0;">{{ __('Quick Actions') }}</h3>
        
        <div style="background: #FFFFFF; border: 1px solid #E0E6ED; border-radius: 10px; padding: 1.5rem;">
            <a href="{{ route('admin.posts.create') }}" class="btn btn-gold w-full" style="width: 100%; justify-content: center; margin-bottom: 1rem;">
                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                {{ __('New Publication') }}
            </a>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-outline-navy w-full" style="width: 100%; justify-content: center; margin-bottom: 1rem;">
                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                {{ __('New Category') }}
            </a>
            
            <div style="border-top: 1px solid #EEF1F5; margin: 1.5rem 0;"></div>
            
            <h4 style="font-family: 'Inter', sans-serif; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; color: #8FA0B4; margin-bottom: 1rem;">{{ __('System Status') }}</h4>
            <div style="display: flex; align-items: center; gap: 0.75rem; font-family: 'Inter', sans-serif; font-size: 0.85rem; color: #162235; margin-bottom: 0.5rem;">
                <div style="width: 8px; height: 8px; border-radius: 50%; background: #22C55E;"></div>
                {{ __('Database Connection: Active') }}
            </div>
            <div style="display: flex; align-items: center; gap: 0.75rem; font-family: 'Inter', sans-serif; font-size: 0.85rem; color: #162235;">
                <div style="width: 8px; height: 8px; border-radius: 50%; background: #22C55E;"></div>
                {{ __('Storage Disk: Healthy') }}
            </div>
        </div>
    </div>
    
</div>

@endsection