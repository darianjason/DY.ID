@extends('templates.master')

@section('title', 'Log In - DY.ID')

@section('content')
    <h2>Log In</h2>

    <form action="login" method="POST" id="login-form">
        @csrf

        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="user@example.com" value="{{ Cookie::get('emailCookie') != null ? Cookie::get('emailCookie') : '' }}">

        <label for="password">Password</label>
        <input type="password" name="password" id="password" value="{{ Cookie::get('passwordCookie') != null ? Cookie::get('passwordCookie') : '' }}">

        <input type="checkbox" name="remember" id="remember" {{ Cookie::get('emailCookie') != null ? 'checked' : '' }}>
        <label for="remember">Remember Me</label>

        <input type="submit" value="Log In">
    </form>

    <label for="error" class="error-label">
        @if ($errors->hasBag('login'))
            {{ $errors->login->first() }}
        @endif
    </label>
@endsection
