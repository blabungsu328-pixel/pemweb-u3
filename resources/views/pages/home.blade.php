
@extends('layouts.app')

@section('title', 'Home')

@section('content')

{{-- HERO SECTION --}}
<section class="hero-section">
    <div class="hero-content">
        <span class="hero-label">YOUR PERSONAL LEARNING SPACE</span>

        <h1>
            Belajar lebih terarah,<br>
            <span>berkembang tanpa batas.</span>
        </h1>

        <p>
            Satu ruang untuk menyimpan catatan, mengelola materi,
            dan mendukung perjalanan belajar kamu setiap hari.
        </p>

        @auth
            <a href="{{ route('articles.create') }}" class="btn-primary">
                + Buat Catatan Baru
            </a>
        @endauth

        @guest
            <a href="{{ route('register') }}" class="btn-primary">
                Mulai Sekarang
            </a>
        @endguest
    </div>

    <div class="hero-decoration">
        <div class="hero-icon">✦</div>
        <div class="hero-note">
            <span>MY STUDYSPACE</span>
            <strong>Learn. Organize. Grow.</strong>
            <p>Make every study session meaningful.</p>
        </div>
    </div>
</section>

{{-- WELCOME MESSAGE --}}
<section class="welcome-section">
    <div>
        <span class="section-eyebrow">WELCOME TO STUDYSPACE</span>

        @auth
            <h2>Halo, {{ auth()->user()->name }}!</h2>
            <p>Siap melanjutkan perjalanan belajarmu hari ini?</p>
        @endauth

        @guest
            <h2>Temukan ruang belajarmu.</h2>
            <p>Mulai kumpulkan dan kelola materi pembelajaranmu di sini.</p>
        @endguest
    </div>
</section>

{{-- LATEST MATERIALS --}}
<section class="materials-section">
    <div class="section-heading">
        <div>
            <span class="section-eyebrow">YOUR LEARNING LIBRARY</span>
            <h2>Materi Terbaru</h2>
            <p>Catatan dan materi pembelajaran yang tersedia.</p>
        </div>

        @auth
            <a href="{{ route('articles.index') }}" class="text-link">
                Lihat Semua →
            </a>
        @endauth
    </div>

    @if ($articles->isNotEmpty())
        <div class="materials-grid">
            @foreach ($articles as $article)
                <article class="material-card">

                    <a href="{{ route('articles.show', $article) }}"
                       class="material-image">
                        <img src="{{ $article->image_url }}"
                             alt="Gambar {{ $article->title }}">
                    </a>

                    <div class="material-content">
                        <span class="material-category">LEARNING MATERIAL</span>

                        <h3>
                            <a href="{{ route('articles.show', $article) }}">
                                {{ $article->title }}
                            </a>
                        </h3>

                        <p class="material-description">
                            {{ \Illuminate\Support\Str::limit($article->body, 120) }}
                        </p>

                        <div class="material-meta">
                            <span>{{ $article->created_at->format('d M Y') }}</span>
                            <span>Oleh {{ $article->user->name }}</span>
                        </div>

                        <a href="{{ route('articles.show', $article) }}"
                           class="read-link">
                            Buka Materi →
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    @else
        <div class="empty-state">
            <div class="empty-icon">✎</div>
            <h3>Belum ada materi pembelajaran</h3>
            <p>
                Ruang belajarmu masih kosong. Mulai tambahkan
                catatan atau materi pertamamu.
            </p>

            @auth
                <a href="{{ route('articles.create') }}" class="btn-primary">
                    + Tambah Materi
                </a>
            @endauth
        </div>
    @endif
</section>

@endsection
