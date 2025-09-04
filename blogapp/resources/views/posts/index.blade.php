@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="stack" style="justify-content: space-between;">
            <h2 style="margin: 0;">Posts</h2>
            <a class="btn" href="{{ route('posts.create') }}">Create</a>
        </div>
    </div>

    <style>
        /* Force 3 cards per row; allow wrap on all rows */
        #posts-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; }
    </style>
    <div id="posts-grid">
        @forelse ($posts as $post)
            <div class="card" style="display:flex; flex-direction:column; margin:0; border-radius:12px; overflow:hidden;">
                <img src="{{ $post->image_url ?: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXn1LxNpgOr5fxc_d3q4ObDF8C2vNn-3tvAQ&s' }}" alt="{{ $post->title }}" style="width:100%; height:180px; object-fit:cover; display:block;">
                <div style="padding:10px 0 0 0;"></div>
                <h3 style="margin: 0 0 6px 0;">{{ $post->title }}</h3>
                <div class="muted" style="font-size: 13px; margin-bottom:8px;">{{ $post->published_at?->format('M d, Y') ?? 'Draft' }}</div>
                <p style="margin:0 0 12px 0; display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical; overflow:hidden;">{{ \Illuminate\Support\Str::limit($post->content, 220) }}</p>
                <div class="stack" style="margin-top:auto;">
                    <a class="btn secondary" href="{{ route('posts.show', $post) }}">View</a>
                    <a class="btn" href="{{ route('posts.edit', $post) }}">Edit</a>
                    <form method="POST" action="{{ route('posts.destroy', $post) }}" onsubmit="return confirm('Delete this post?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn danger" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="card" style="grid-column: 1 / -1;">No posts yet.</div>
        @endforelse
    </div>

    <div class="card" style="margin-top:16px; display:flex; justify-content:center;">
        {{ $posts->onEachSide(1)->links('pagination.small') }}
    </div>
@endsection


