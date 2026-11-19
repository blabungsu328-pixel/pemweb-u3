
@extends('layouts.app')

@section('title', 'My Notes')

@section('content')

{{-- PAGE HEADER --}}
<section class="notes-header">
    <div>
        <span class="section-eyebrow">YOUR PERSONAL LIBRARY</span>
        <h1>My Notes</h1>
        <p>
            Simpan, kelola, dan temukan kembali catatan
            pembelajaranmu dengan mudah.
        </p>
    </div>

    <a href="{{ route('articles.create') }}" class="btn-primary">
        + Buat Catatan Baru
    </a>
</section>

{{-- SUCCESS MESSAGE --}}
@if (session('success'))
    <div class="flash">
        {{ session('success') }}
    </div>
@endif

{{-- NOTES LIST --}}
<section class="notes-section">

    <div class="section-heading">
        <div>
            <h2>Semua Catatan</h2>
            <p>Daftar materi dan catatan yang tersedia.</p>
        </div>

        <span class="notes-count">
            {{ $articles->total() }} Catatan
        </span>
    </div>

    @if ($articles->isNotEmpty())

        <div class="notes-grid">

            @foreach ($articles as $article)

                <article class="note-card">

                    {{-- IMAGE --}}
                    <a href="{{ route('articles.show', $article) }}"
                       class="note-image">
                        <img src="{{ $article->image_url }}"
                             alt="Gambar {{ $article->title }}">
                    </a>

                    {{-- CONTENT --}}
                    <div class="note-content">

                        <span class="note-label">
                            LEARNING MATERIAL
                        </span>

                        <h3>
                            <a href="{{ route('articles.show', $article) }}">
                                {{ $article->title }}
                            </a>
                        </h3>

                        <p class="note-description">
                            {{ \Illuminate\Support\Str::limit($article->body, 110) }}
                        </p>

                        <div class="note-information">
                            <span>
                                {{ $article->created_at->format('d M Y') }}
                            </span>

                            <span>
                                {{ $article->user->name }}
                            </span>
                        </div>

                        <div class="note-actions">

                            <a href="{{ route('articles.show', $article) }}"
                               class="note-view">
                                Buka Materi →
                            </a>

                            @if ($article->user_id === auth()->id())

                                <div class="note-owner-actions">

                                    <a href="{{ route('articles.edit', $article) }}"
                                       class="note-edit">
                                        Edit
                                    </a>

                                    <form action="{{ route('articles.destroy', $article) }}"
                                          method="POST"
                                          class="inline"
                                          onsubmit="return confirm('Yakin ingin menghapus catatan ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="note-delete">
                                            Hapus
                                        </button>
                                    </form>

                                </div>

                            @endif

                        </div>
                    </div>

                </article>

            @endforeach

        </div>

        {{-- PAGINATION --}}
        <div class="notes-pagination">
            {{ $articles->links() }}
        </div>

    @else

        <div class="empty-state">
            <div class="empty-icon">✎</div>

            <h3>Belum Ada Catatan</h3>

            <p>
                Kamu belum memiliki catatan pembelajaran.
                Yuk, buat catatan pertamamu!
            </p>

            <a href="{{ route('articles.create') }}" class="btn-primary">
                + Buat Catatan
            </a>
        </div>

    @endif

</section>

@endsection
