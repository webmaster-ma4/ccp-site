<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __("Articles") }}</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 2rem; background: #f6f7f3; color: #11211f; }
        .card { background: white; border-radius: 1rem; padding: 1.25rem; margin-bottom: 1rem; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        a { color: #12553f; font-weight: 700; }
    </style>
</head>
<body>
    <h1>{{ __("Articles") }}</h1>
    <p><a href="{{ route('admin.posts.create') }}">{{ __("Create article") }}</a> · <a href="{{ route('admin.dashboard') }}">{{ __("Back to dashboard") }}</a></p>

    @foreach ($posts as $post)
        <div class="card">
            <h3>{{ $post->title }}</h3>
            <p><strong>{{ __("Category:") }}</strong> {{ optional($post->category)->name ?? __("No category") }}</p>
            <p>{{ $post->excerpt }}</p>
            <p>
                <a href="{{ route('admin.posts.edit', $post) }}">{{ __("Edit") }}</a>
                ·
                <form method="POST" action="{{ route('admin.posts.destroy', $post) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="border:0; background:none; color:#12553f; font-weight:700; cursor:pointer; padding:0;">{{ __("Delete") }}</button>
                </form>
            </p>
        </div>
    @endforeach
</body>
</html>