<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Categories</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 2rem; background: #f6f7f3; color: #11211f; }
        .card { background: white; border-radius: 1rem; padding: 1.25rem; margin-bottom: 1rem; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        a { color: #12553f; font-weight: 700; }
    </style>
</head>
<body>
    <h1>Categories</h1>
    <p><a href="{{ route('admin.categories.create') }}">Create category</a> · <a href="{{ route('admin.dashboard') }}">Back to dashboard</a></p>

    @foreach ($categories as $category)
        <div class="card">
            <h3>{{ $category->name }}</h3>
            <p>/{{ $category->slug }}</p>
        </div>
    @endforeach
</body>
</html>
