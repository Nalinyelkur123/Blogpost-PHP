<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Login</title>

    {{-- CSS Loader --}}
    @php
        $manifestPath = public_path('build/manifest.json');
        $cssPath = public_path('css/app.css');
        $viteRendered = false;
    @endphp

    @if (function_exists('vite') && file_exists($manifestPath))
        @php
            try {
                echo vite('resources/css/app.css');
                $viteRendered = true;
            } catch (\Throwable $e) {
                $viteRendered = false;
            }
        @endphp
    @endif

    @if (! $viteRendered)
        @if (file_exists($cssPath))
            <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @else
            <style>
                body {
                    margin: 0;
                    font-family: system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, sans-serif;
                    background: #f5f6fa;
                    display: flex;              /* centers horizontally */
                    align-items: center;        /* centers vertically */
                    justify-content: center;
                    min-height: 100vh;          /* full screen height */
                }
                .card {
                    width: 100%;
                    max-width: 400px;
                    background: #fff;
                    border-radius: 1rem;
                    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
                    overflow: hidden;
                }
                .card-header {
                    text-align: center;
                    padding: 1.5rem;
                    background: #4f46e5;
                    color: #fff;
                }
                .card-body {
                    padding: 1.5rem;
                }
                .btn {
                    display: inline-block;
                    width: 100%;
                    padding: .75rem;
                    border-radius: .5rem;
                    background: #4f46e5;
                    color: #fff;
                    text-align: center;
                    font-weight: 600;
                    border: none;
                    cursor: pointer;
                }
                .btn:hover {
                    background: #4338ca;
                }
                input {
                    width: 100%;
                    padding: .65rem .75rem;
                    margin-top: .25rem;
                    margin-bottom: 1rem;
                    border: 1px solid #ddd;
                    border-radius: .5rem;
                    box-sizing: border-box;
                }
                label {
                    font-size: .875rem;
                    font-weight: 500;
                    color: #333;
                    display: block;
                    margin-bottom: .25rem;
                }
            </style>
        @endif
    @endif
</head>
<body>
    <div class="card">
        <div class="card-header">
            <h1 class="text-xl font-semibold">Welcome Back</h1>
            <p class="text-sm opacity-90">Sign in to continue</p>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="mb-4">
                    <ul class="text-sm text-red-700 bg-red-50 p-3 rounded">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('status'))
                <div class="mb-4 text-sm text-green-700 bg-green-50 p-3 rounded">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" novalidate>
                @csrf

                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus />

                <label for="password">Password</label>
                <input id="password" type="password" name="password" required />

                <div class="flex items-center justify-between mb-4 text-sm">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="remember" class="mr-2">
                        Remember me
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-indigo-600 hover:underline">Forgot?</a>
                    @endif
                </div>

                <button type="submit" class="btn">Sign In</button>
            </form>

            <p class="mt-4 text-center text-sm text-gray-600">
                Don’t have an account?
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-indigo-600 font-medium hover:underline">Register</a>
                @else
                    <span class="text-gray-500">Registration disabled</span>
                @endif
            </p>
        </div>
    </div>
</body>
</html>
