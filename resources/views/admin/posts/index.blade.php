@extends('layouts.admin')

@section('title', __('Insights & Posts'))

@section('content')

<div class="admin-action-bar" style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem; flex-wrap: wrap; gap: 1rem;">
    <div>
        <p style="font-family: 'Inter', sans-serif; font-size: 0.9rem; color: #5E7590;">
            {{ $posts->count() }} {{ __('total publications') }}
        </p>
    </div>
    <a href="{{ route('admin.posts.create') }}" class="btn btn-gold">
        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        {{ __('New Publication') }}
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
                <th>{{ __('Title') }}</th>
                <th>{{ __('Category') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Published') }}</th>
                <th style="text-align: right;">{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse($posts as $post)
            <tr>
                <td>
                    <div style="font-weight: 600; color: #081C3A;">{{ Str::limit($post->title, 60) }}</div>
                    @if($post->excerpt)
                        <div style="font-size: 0.8rem; color: #8FA0B4; margin-top: 2px;">{{ Str::limit($post->excerpt, 80) }}</div>
                    @endif
                </td>
                <td>
                    <span style="background: #EEF1F5; color: #5E7590; padding: 0.2rem 0.6rem; border-radius: 4px; font-size: 0.8rem; font-weight: 600;">
                        {{ $post->category->name ?? '—' }}
                    </span>
                </td>
                <td>
                    @if($post->published_at)
                        <span class="admin-badge published">{{ __('Published') }}</span>
                    @else
                        <span class="admin-badge draft">{{ __('Draft') }}</span>
                    @endif
                </td>
                <td style="color: #8FA0B4; font-size: 0.85rem;">
                    {{ optional($post->published_at)->format('d M Y') ?? '—' }}
                </td>
                <td style="text-align: right;">
                    <div style="display: flex; gap: 0.5rem; justify-content: flex-end;">
                        <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-outline-navy btn-sm">
                            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            {{ __('Edit') }}
                        </a>
                        <form method="POST" action="{{ route('admin.posts.destroy', $post) }}" onsubmit="return confirm('{{ __('Delete this post?') }}')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm" style="background: #FEE2E2; color: #DC2626; border: 1px solid #FCA5A5;">
                                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                {{ __('Delete') }}
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center; padding: 3rem; color: #8FA0B4; font-family: 'Inter', sans-serif;">
                    {{ __('No publications found. Create your first one.') }}
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection