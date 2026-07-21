<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __("Create category") }}</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 2rem; background: #f6f7f3; color: #11211f; }
        form { background: white; border-radius: 1rem; padding: 1.25rem; max-width: 420px; }
        label { display: block; margin-top: 0.8rem; font-weight: 700; }
        input { width: 100%; padding: 0.7rem; margin-top: 0.35rem; border: 1px solid #d3d9d4; border-radius: 0.6rem; }
        button { margin-top: 1rem; padding: 0.8rem 1rem; border: 0; border-radius: 999px; background: #12553f; color: white; cursor: pointer; }
    </style>
</head>
<body>
    <h1>{{ __("Create category") }}</h1>
    <form method="POST" action="{{ route('admin.categories.store') }}">
        @csrf
        <label>{{ __("Name") }}</label>
        <input name="name" required>
        <label>{{ __("Slug") }}</label>
        <input name="slug" required>
        <button type="submit">{{ __("Save category") }}</button>
    </form>
</body>
</html>