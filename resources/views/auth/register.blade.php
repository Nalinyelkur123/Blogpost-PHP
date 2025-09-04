@extends('layouts.app')

@section('content')
<style>
    body {
        margin: 0;
        font-family: system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, sans-serif;
        background: #f5f6fa;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
    }
    .card {
        width: 100%;
        max-width: 420px;
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
    .card-body label {
        font-size: .875rem;
        font-weight: 500;
        color: #333;
        display: block;
        margin-bottom: .25rem;
    }
    .card-body input {
        width: 100%;
        padding: .65rem .75rem;
        margin-bottom: 1rem;
        border: 1px solid #ddd;
        border-radius: .5rem;
        font-size: .95rem;
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
        transition: background .2s ease;
    }
    .btn:hover {
        background: #4338ca;
    }
    .btn.secondary {
        background: #fff;
        color: #4f46e5;
        border: 1px solid #4f46e5;
        margin-top: .75rem;
    }
    .btn.secondary:hover {
        background: #f0f0ff;
    }
    .alert {
        margin-bottom: 1rem;
        padding: .75rem;
        border-radius: .5rem;
        font-size: .875rem;
    }
    .alert-error {
        background: #fef2f2;
        color: #b91c1c;
        border: 1px solid #fca5a5;
    }
</style>

<div class="card">
    <div class="card-header">
        <h2 class="text-xl font-semibold">Create Account</h2>
        <p class="text-sm opacity-90">Sign up to get started</p>
    </div>

    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-error">
                <ul style="margin:0; padding-left:1.2rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register.store') }}">
            @csrf

            <label for="name">Full Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" autocomplete="name" required>
            @error('name') <div class="alert alert-error">{{ $message }}</div> @enderror

            <label for="email">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email" required>
            @error('email') <div class="alert alert-error">{{ $message }}</div> @enderror

            <label for="password">Password</label>
            <input id="password" type="password" name="password" autocomplete="new-password" required>
            @error('password') <div class="alert alert-error">{{ $message }}</div> @enderror

            <label for="password_confirmation">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" autocomplete="new-password" required>

            <button class="btn" type="submit">Sign Up</button>
            <a class="btn secondary" href="{{ route('login') }}">Back to Login</a>
        </form>
    </div>
</div>
@endsection
