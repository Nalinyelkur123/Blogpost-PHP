@extends('layouts.app')

@section('content')
    <div class="card">
        <h2 style="margin-top: 0;">Edit Post</h2>
        <form method="POST" action="{{ route('posts.update', $post) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <label>Title</label>
                <input type="text" name="title" value="{{ old('title', $post->title) }}">
                @error('title') <div class="muted">{{ $message }}</div> @enderror
            </div>
            <div class="row">
                <label>Slug</label>
                <input type="text" name="slug" value="{{ old('slug', $post->slug) }}">
                @error('slug') <div class="muted">{{ $message }}</div> @enderror
            </div>
            <div class="row">
                <label>Content</label>
                <textarea name="content">{{ old('content', $post->content) }}</textarea>
                @error('content') <div class="muted">{{ $message }}</div> @enderror
            </div>
            <div class="row">
                <label>Image URL (optional)</label>
                <input type="text" name="image_url" value="{{ old('image_url', $post->image_url) }}">
                @error('image_url') <div class="muted">{{ $message }}</div> @enderror
            </div>
            <div class="row">
                <label>Published At (optional)</label>
                <input type="datetime-local" name="published_at" value="{{ old('published_at', optional($post->published_at)->format('Y-m-d\TH:i')) }}">
                @error('published_at') <div class="muted">{{ $message }}</div> @enderror
            </div>
            <div class="stack">
                <button class="btn" type="submit">Save</button>
                <a class="btn secondary" href="{{ route('posts.show', $post) }}">Cancel</a>
            </div>
        </form>
    </div>
@endsection


