@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <section class="card" style="margin-bottom: 1.5rem;">
        <h2 style="margin-top: 0; margin-bottom: 0.4rem;">Portal Berita</h2>
        <p class="muted" style="margin-top: 0;">
            Kumpulan berita dan artikel terbaru yang dipublikasikan di sistem.
        </p>

        @guest
            <p class="muted" style="margin-bottom: 0;">
                Kamu belum login. Untuk menulis atau mengelola artikel, silakan
                <a href="{{ route('login') }}">Login</a> atau
                <a href="{{ route('register') }}">Register</a>.
            </p>
        @endguest

        @auth
            <p class="muted" style="margin-bottom: 0;">
                Kamu login sebagai <strong>{{ auth()->user()->name }}</strong>.
                Kelola tulisanmu di halaman <a href="{{ route('articles.index') }}">Artikel</a> atau
                <a href="{{ route('articles.create') }}">Tambah Artikel Baru</a>.
            </p>
        @endauth
    </section>

    <section class="card">
        <div style="display: flex; justify-content: space-between; align-items: center; gap: 1rem; flex-wrap: wrap; margin-bottom: 1.1rem;">
            <h3 style="margin: 0;">Berita Terbaru</h3>
            <a href="{{ route('articles.index') }}" class="btn btn-secondary">Lihat Semua Artikel &rarr;</a>
        </div>

        @if ($articles->isNotEmpty())
            <div class="row">
                @foreach ($articles as $article)
                    <article class="card" style="padding: 1rem; display: flex; flex-direction: column; gap: 0.75rem;">
                        <a href="{{ route('articles.show', $article) }}" style="display: block; overflow: hidden; border-radius: 10px;">
                            <img src="{{ $article->image_url }}"
                                 alt="Gambar {{ $article->title }}"
                                 style="width: 100%; height: 180px; object-fit: cover; display: block;">
                        </a>

                        <div style="display: flex; flex-direction: column; gap: 0.45rem; flex: 1;">
                            <h4 style="margin: 0; font-size: 1.05rem; line-height: 1.35;">
                                <a href="{{ route('articles.show', $article) }}" style="color: var(--text);">
                                    {{ $article->title }}
                                </a>
                            </h4>

                            <p class="muted" style="margin: 0; font-size: 0.84rem;">
                                {{ $article->created_at->format('d M Y') }} &bull; {{ $article->user->name }}
                            </p>

                            <p style="margin: 0.25rem 0 0.5rem; font-size: 0.92rem; color: var(--muted);">
                                {{ \Illuminate\Support\Str::limit($article->body, 130) }}
                            </p>

                            <div style="margin-top: auto;">
                                <a href="{{ route('articles.show', $article) }}" style="font-size: 0.88rem; font-weight: 600;">
                                    Baca selengkapnya &rarr;
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <p class="muted" style="margin-bottom: 0;">
                Belum ada berita yang tersedia.
                @auth
                    Silakan buat berita baru di menu <a href="{{ route('articles.create') }}">Tambah Artikel</a>.
                @endauth
            </p>
        @endif
    </section>
@endsection