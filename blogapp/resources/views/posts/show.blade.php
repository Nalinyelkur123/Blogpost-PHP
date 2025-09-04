@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="stack" style="justify-content: space-between;">
            <h2 style="margin-top: 0;">{{ $post->title }}</h2>
            <div class="muted">{{ $post->published_at?->format('M d, Y') ?? 'Draft' }}</div>
        </div>
        <img src="{{ $post->image_url ?: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXn1LxNpgOr5fxc_d3q4ObDF8C2vNn-3tvAQ&s' }}" alt="{{ $post->title }}" style="width:100%; height:320px; object-fit:cover; border-radius:8px; margin-bottom: 10px;">
        <div>{!! nl2br(e($post->content)) !!}</div>
        <div class="stack" style="margin-top: 16px;">
            <a class="btn" href="{{ route('posts.edit', $post) }}">Edit</a>
            <a class="btn secondary" href="{{ route('posts.index') }}">Back</a>
        </div>
    </div>
@endsection


