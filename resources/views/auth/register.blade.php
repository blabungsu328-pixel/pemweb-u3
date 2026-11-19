
@extends('layouts.app')

@section('title', 'Register')

@section('content')

<section class="auth-page">

    <div class="auth-card">

        {{-- BRAND --}}
        <div class="auth-brand">
            <div class="auth-logo">S</div>
            <span>StudySpace</span>
        </div>

        {{-- HEADING --}}
        <div class="auth-heading">
            <span class="section-eyebrow">JOIN OUR COMMUNITY</span>
            <h1>Create Your Account</h1>
            <p>
                Buat akun StudySpace dan mulai susun
                perjalanan belajar yang lebih produktif.
            </p>
        </div>

        {{-- VALIDATION ERROR --}}
        @if ($errors->any())
            <div class="auth-error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        {{-- REGISTER FORM --}}
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="auth-form-group">
                <label for="name">Nama Lengkap</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Masukkan nama lengkap"
                    required
                    autocomplete="name"
                    autofocus
                >
            </div>

            <div class="auth-form-group">
                <label for="email">Email Address</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="nama@email.com"
                    required
                    autocomplete="email"
                >
            </div>

            <div class="auth-form-group">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Buat password"
                    required
                    autocomplete="new-password"
                >
            </div>

            <div class="auth-form-group">
                <label for="password_confirmation">
                    Ulangi Password
                </label>
                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="Masukkan ulang password"
                    required
                    autocomplete="new-password"
                >
            </div>

            <button type="submit" class="auth-submit">
                Buat Akun →
            </button>

        </form>

        {{-- LOGIN LINK --}}
        <div class="auth-divider">
            <span>Sudah punya akun?</span>
        </div>

        <a href="{{ route('login') }}" class="auth-register-link">
            Login Sekarang
        </a>

    </div>

    <p class="auth-footer">
        Your personal space to learn, grow, and stay productive.
    </p>

</section>

@endsection
