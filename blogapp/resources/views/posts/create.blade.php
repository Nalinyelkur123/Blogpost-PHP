@extends('layouts.app')

@section('content')
    <div class="card">
        <h2 style="margin-top: 0;">New Post</h2>
        <form method="POST" action="{{ route('posts.store') }}">
            @csrf
            <div class="row">
                <label>Title</label>
                <input type="text" name="title" value="{{ old('title') }}">
                @error('title') <div class="muted">{{ $message }}</div> @enderror
            </div>
            <div class="row">
                <label>Slug (optional)</label>
                <input type="text" name="slug" value="{{ old('slug') }}">
                @error('slug') <div class="muted">{{ $message }}</div> @enderror
            </div>
            <div class="row">
                <label>Content</label>
                <textarea name="content">{{ old('content') }}</textarea>
                @error('content') <div class="muted">{{ $message }}</div> @enderror
            </div>
            <div class="row">
                <label>Image URL (optional)</label>
                <input type="text" name="image_url" value="{{ old('image_url') }}" placeholder="https://picsum.photos/800/600?random=1">
                @error('image_url') <div class="muted">{{ $message }}</div> @enderror
            </div>
            <div class="row">
                <label>Published At (optional)</label>
                <input type="datetime-local" name="published_at" value="{{ old('published_at') }}">
                @error('published_at') <div class="muted">{{ $message }}</div> @enderror
            </div>
            <div class="stack">
                <button class="btn" type="submit">Create</button>
                <a class="btn secondary" href="{{ route('posts.index') }}">Cancel</a>
            </div>
        </form>
    </div>
@endsection


