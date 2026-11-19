
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

{{-- DASHBOARD WELCOME --}}
<section class="dashboard-welcome">
    <div>
        <span class="section-eyebrow">YOUR LEARNING OVERVIEW</span>

        <h1>Welcome back, {{ $user->name }}!</h1>

        <p>
            Selamat datang di ruang produktivitasmu.
            Mari lanjutkan perjalanan belajar dan kembangkan pengetahuanmu.
        </p>
    </div>

    <div class="dashboard-welcome-icon">S</div>
</section>

{{-- STATISTICS --}}
<section class="dashboard-stats">

    <div class="dashboard-stat-card">
        <div class="stat-icon">▤</div>
        <div>
            <p class="stat-label">Total Materi</p>
            <h2>{{ $totalArticles }}</h2>
            <span>Seluruh materi di StudySpace</span>
        </div>
    </div>

    <div class="dashboard-stat-card">
        <div class="stat-icon">✎</div>
        <div>
            <p class="stat-label">Catatan Saya</p>
            <h2>{{ $myArticles }}</h2>
            <span>Materi yang kamu buat</span>
        </div>
    </div>

</section>

{{-- QUICK ACTIONS --}}
<section class="dashboard-section">
    <div class="dashboard-section-heading">
        <div>
            <span class="section-eyebrow">GET STARTED</span>
            <h2>Aksi Cepat</h2>
            <p>Akses fitur StudySpace dengan mudah.</p>
        </div>
    </div>

    <div class="quick-action-grid">

        <a href="{{ route('articles.create') }}" class="quick-action-card">
            <div class="quick-action-icon">＋</div>
            <div>
                <h3>Buat Catatan</h3>
                <p>Tambahkan materi pembelajaran baru.</p>
            </div>
            <span class="quick-action-arrow">→</span>
        </a>

        <a href="{{ route('articles.index') }}" class="quick-action-card">
            <div class="quick-action-icon">▤</div>
            <div>
                <h3>My Notes</h3>
                <p>Lihat dan kelola semua catatanmu.</p>
            </div>
            <span class="quick-action-arrow">→</span>
        </a>

        <a href="{{ route('home') }}" class="quick-action-card">
            <div class="quick-action-icon">⌂</div>
            <div>
                <h3>Explore Home</h3>
                <p>Jelajahi halaman utama StudySpace.</p>
            </div>
            <span class="quick-action-arrow">→</span>
        </a>

    </div>
</section>

{{-- LATEST NOTES --}}
<section class="dashboard-section">
    <div class="dashboard-section-heading dashboard-latest-heading">
        <div>
            <span class="section-eyebrow">RECENT ACTIVITY</span>
            <h2>Catatan Terbaru</h2>
            <p>Materi pembelajaran yang baru ditambahkan.</p>
        </div>

        <a href="{{ route('articles.index') }}" class="dashboard-view-all">
            Lihat Semua →
        </a>
    </div>

    @if ($latestArticles->isNotEmpty())

        <div class="dashboard-latest-list">

            @foreach ($latestArticles as $article)

                <article class="dashboard-latest-card">

                    <a href="{{ route('articles.show', $article) }}"
                       class="dashboard-latest-image">
                        <img src="{{ $article->image_url }}"
                             alt="Thumbnail {{ $article->title }}">
                    </a>

                    <div class="dashboard-latest-content">
                        <span class="note-label">LEARNING MATERIAL</span>

                        <h3>
                            <a href="{{ route('articles.show', $article) }}">
                                {{ $article->title }}
                            </a>
                        </h3>

                        <p>
                            {{ \Illuminate\Support\Str::limit($article->body, 110) }}
                        </p>

                        <div class="dashboard-latest-meta">
                            <span>{{ $article->user->name }}</span>
                            <span>•</span>
                            <span>{{ $article->created_at->format('d M Y') }}</span>
                        </div>
                    </div>

                    <a href="{{ route('articles.show', $article) }}"
                       class="dashboard-open-note">
                        →
                    </a>

                </article>

            @endforeach

        </div>

    @else

        <div class="dashboard-empty">
            <div class="empty-icon">✎</div>
            <h3>Belum Ada Catatan</h3>
            <p>Mulai buat catatan pertamamu untuk mengisi ruang belajar ini.</p>

            <a href="{{ route('articles.create') }}" class="btn-primary">
                + Buat Catatan
            </a>
        </div>

    @endif
</section>

{{-- ACCOUNT INFORMATION --}}
<section class="dashboard-account">
    <div class="dashboard-account-heading">
        <div class="account-avatar">
            {{ strtoupper(substr($user->name, 0, 1)) }}
        </div>

        <div>
            <span class="section-eyebrow">PERSONAL INFORMATION</span>
            <h2>Informasi Akun</h2>
            <p>Informasi profil akun StudySpace kamu.</p>
        </div>
    </div>

    <div class="account-details">
        <div>
            <span>Nama Lengkap</span>
            <strong>{{ $user->name }}</strong>
        </div>

        <div>
            <span>Email</span>
            <strong>{{ $user->email }}</strong>
        </div>
    </div>
</section>

@endsection
