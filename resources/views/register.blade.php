@extends('templates.master')

@section('title', 'Register')

@section('content')
    <h2>Register</h2>

    <form action="register" enctype="multipart/form-data" method="POST" id="register-form">
        @csrf

        <div>
            <label for="name">Full Name</label>
            <input type="text" name="name" id="name">
        </div>

        <div id="gender-field">
            <label for="gender">Gender</label>

            <div class="radio-input">
                <div>
                    <input type="radio" name="gender" value="Male" id="male">
                    <label for="male">Male</label>
                </div>

                <div>
                    <input type="radio" name="gender" value="Female" id="female">
                    <label for="male">Female</label>
                </div>
            </div>
        </div>

        <div>
            <label for="address">Address</label>
            <textarea name="address" id="address"></textarea>
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="user@example.com">
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>

        <div>
            <label for="password-confirm">Confirm Password</label>
            <input type="password" name="password-confirm" id="password-confirm">
        </div>

        <div id="agreement-field">
            <div class="checkbox-input">
                <input type="checkbox" name="agreement" id="agreement">
                <label for="agreement">I agree with the terms & conditions</label>
            </div>
        </div>

        <button type="submit">Register</button>
    </form>

    @if ($errors->hasBag('register'))
        <div class="error-wrapper">
            <label for="error" class="error-label">
                {{ $errors->register->first() }}
            </label>
        </div>
    @endif
@endsection
