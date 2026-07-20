<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 2rem; background: #f6f7f3; color: #11211f; }
        .card { background: white; border-radius: 1rem; padding: 1.25rem; margin-bottom: 1rem; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        a { color: #12553f; font-weight: 700; }
    </style>
</head>
<body>
    <h1>Admin dashboard</h1>
    <div class="card">
        <p>Published articles: {{ $postsCount }}</p>
        <p><a href="{{ route('admin.posts.index') }}">Manage articles</a> · <a href="{{ route('admin.categories.index') }}">Manage categories</a></p>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" style="margin-top: .5rem; padding: 0.6rem 0.9rem; border: 0; border-radius: 999px; background: #12553f; color: white; cursor: pointer;">Logout</button>
        </form>
    </div>
</body>
</html>
