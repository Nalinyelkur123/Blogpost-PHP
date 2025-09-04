<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'BlogApp') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, sans-serif; margin: 0; background: #f8fafc; color: #0f172a; }
        a { color: #0ea5e9; text-decoration: none; }
        a:hover { text-decoration: underline; }
        .container { max-width: 900px; margin: 0 auto; padding: 24px; }
        .nav { display: flex; justify-content: space-between; align-items: center; background: #0f172a; color: white; padding: 16px 24px; }
        .nav a { color: white; font-weight: 600; }
        .card { background: white; border: 1px solid #e2e8f0; border-radius: 12px; padding: 20px; margin-bottom: 16px; box-shadow: 0 1px 2px rgba(0,0,0,0.04); }
        .btn { display: inline-block; background: #0ea5e9; color: white; padding: 10px 14px; border-radius: 8px; font-weight: 600; }
        .btn.secondary { background: #475569; }
        .btn.danger { background: #ef4444; }
        .stack { display: flex; gap: 10px; align-items: center; }
        .muted { color: #64748b; }
        input[type="text"], textarea { width: 100%; border: 1px solid #cbd5e1; border-radius: 8px; padding: 10px; font-size: 16px; }
        textarea { min-height: 160px; }
        form .row { margin-bottom: 14px; }
        .status { padding: 10px 14px; background: #ecfeff; border: 1px solid #99f6e4; color: #0f766e; border-radius: 8px; margin-bottom: 16px; }
    </style>
    
</head>
<body>
    <nav class="nav">
        <a href="{{ route('posts.index') }}">BlogApp</a>
        <div class="stack">
            @if(Auth::check())
                <form method="POST" action="{{ route('logout') }}" style="margin:0;">
                    @csrf
                    <button class="btn secondary" type="submit">Logout</button>
                </form>
                <a class="btn" href="{{ route('posts.create') }}">New Post</a>
            @else
                <a class="btn secondary" href="{{ route('login') }}">Login</a>
                <a class="btn" href="{{ route('register') }}">Sign up</a>
            @endif
        </div>
    </nav>
    <div class="container">
        @if (session('status'))
            <div class="status">{{ session('status') }}</div>
        @endif
        {{ $slot ?? '' }}
        @yield('content')
    </div>
</body>
</html>


