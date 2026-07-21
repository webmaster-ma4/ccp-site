<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __("Edit article") }}</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 2rem; background: #f6f7f3; color: #11211f; }
        form { background: white; border-radius: 1rem; padding: 1.25rem; max-width: 640px; }
        label { display: block; margin-top: 0.8rem; font-weight: 700; }
        input, textarea { width: 100%; padding: 0.7rem; margin-top: 0.35rem; border: 1px solid #d3d9d4; border-radius: 0.6rem; }
        button { margin-top: 1rem; padding: 0.8rem 1rem; border: 0; border-radius: 999px; background: #12553f; color: white; cursor: pointer; }
    </style>
</head>
<body>
    <h1>{{ __("Edit article") }}</h1>
    <form method="POST" action="{{ route('admin.posts.update', $post) }}">
        @csrf
        @method('PUT')
        <label>{{ __("Title") }}</label>
        <input name="title" value="{{ old('title', $post->title) }}" required>
        <label>{{ __("Slug") }}</label>
        <input name="slug" value="{{ old('slug', $post->slug) }}" required>
        <label>{{ __("Excerpt") }}</label>
        <textarea name="excerpt" rows="3" required>{{ old('excerpt', $post->excerpt) }}</textarea>
        <label>{{ __("Content") }}</label>
        <textarea name="content" rows="8" required>{{ old('content', $post->content) }}</textarea>
        <label>{{ __("Category") }}</label>
        <select name="category_id">
            <option value="">{{ __("No category") }}</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
        <label>{{ __("Published at") }}</label>
        <input type="datetime-local" name="published_at" value="{{ old('published_at', $post->published_at?->format('Y-m-d\TH:i')) }}">
        <button type="submit">{{ __("Update article") }}</button>
    </form>
</body>
</html>