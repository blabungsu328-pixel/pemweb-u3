
@extends('layouts.app')

@section('title', 'Login')

@section('content')

<section class="auth-page">

    <div class="auth-card">

        <div class="auth-brand">
            <div class="auth-logo">S</div>
            <span>StudySpace</span>
        </div>

        <div class="auth-heading">
            <span class="section-eyebrow">WELCOME BACK</span>
            <h1>Login to Your Account</h1>
            <p>
                Masuk kembali dan lanjutkan perjalanan belajarmu
                bersama StudySpace.
            </p>
        </div>

        @if ($errors->any())
            <div class="auth-error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ url('/login') }}" novalidate>
            @csrf

            <div class="auth-form-group">
                <label for="email">Email Address</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email kamu"
                    required
                    autocomplete="email"
                    autofocus
                >
            </div>

            <div class="auth-form-group">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password"
                    required
                    autocomplete="current-password"
                >
            </div>

            <div class="auth-remember">
                <label>
                    <input type="checkbox" name="remember">
                    <span>Remember me</span>
                </label>
            </div>

            <button type="submit" class="auth-submit">
                Masuk ke StudySpace →
            </button>
        </form>

        <div class="auth-divider">
            <span>Belum punya akun?</span>
        </div>

        <a href="{{ route('register') }}" class="auth-register-link">
            Daftar Sekarang
        </a>

    </div>

    <p class="auth-footer">
        Your personal space to learn, grow, and stay productive.
    </p>

</section>

@endsection
