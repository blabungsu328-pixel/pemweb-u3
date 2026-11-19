
@extends('layouts.app')

@section('title', 'Detail Note - ' . $article->title)

@section('content')

<article class="detail-note">

    {{-- HEADER CATATAN --}}
    <header class="detail-note-header">
        <span class="section-eyebrow">LEARNING MATERIAL</span>

        <h1>{{ $article->title }}</h1>

        <div class="detail-note-meta">
            <span>
                <span class="meta-icon">▦</span>
                {{ $article->created_at->format('d M Y') }}
            </span>

            <span>
                <span class="meta-icon">✎</span>
                {{ $article->user->name }}
            </span>
        </div>
    </header>

    {{-- GAMBAR CATATAN --}}
    <div class="detail-note-image">
        <img src="{{ $article->image_url }}"
             alt="Gambar untuk {{ $article->title }}">
    </div>

    {{-- ISI CATATAN --}}
    <section class="detail-note-content">
        <div class="detail-content-heading">
            <span class="detail-content-icon">▤</span>
            <h2>Isi Catatan</h2>
        </div>

        <div class="detail-note-body">
            {!! nl2br(e($article->body)) !!}
        </div>
    </section>

    {{-- NAVIGASI --}}
    <footer class="detail-note-footer">
        <a href="{{ route('home') }}" class="btn-cancel">
            ← Kembali ke Home
        </a>

        <div class="detail-footer-actions">
            <a href="{{ route('articles.index') }}" class="btn-secondary">
                My Notes
            </a>

            @auth
                @if ($article->user_id === auth()->id())
                    <a href="{{ route('articles.edit', $article) }}"
                       class="btn-save">
                        Edit Catatan
                    </a>
                @endif
            @endauth
        </div>
    </footer>

</article>

@endsection
