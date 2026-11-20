
@extends('layouts.app')

@section('title', 'Daftar Artikel')

@section('content')
<section class="card">
    <div class="row" style="justify-content: space-between; align-items: center;">
        <h2 style="margin-top: 0;">Daftar Artikel</h2>
        <a href="{{ route('articles.create') }}">+ Tambah Artikel</a>
    </div>

    @if (session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    @if ($articles->isNotEmpty())
        <div class="row">
            @foreach ($articles as $article)
                <article class="card">
                    <img
                        src="{{ $article->image_url }}"
                        alt="Thumbnail {{ $article->title }}"
                        style="width: 100%; height: 180px; object-fit: cover; border-radius: 8px;"
                    >

                    <h3>
                        <a href="{{ route('articles.show', $article) }}">
                            {{ $article->title }}
                        </a>
                    </h3>

                    <p class="muted">
                        Oleh {{ $article->user->name }}
                        &bull;
                        {{ $article->created_at->format('d M Y') }}
                    </p>

                    <p>
                        {{ \Illuminate\Support\Str::limit($article->body, 150) }}
                    </p>

                    <a href="{{ route('articles.show', $article) }}">
                        Baca Selengkapnya
                    </a>

                    @if (auth()->id() === $article->user_id)
                        <div style="margin-top: 1rem;">
                            <a href="{{ route('articles.edit', $article) }}">Edit</a>

                            <form
                                action="{{ route('articles.destroy', $article) }}"
                                method="POST"
                                style="display: inline;"
                                onsubmit="return confirm('Yakin ingin menghapus artikel ini?')"
                            >
                                @csrf
                                @method('DELETE')
                                <button type="submit">Hapus</button>
                            </form>
                        </div>
                    @endif
                </article>
            @endforeach
        </div>

        <div style="margin-top: 1rem;">
            {{ $articles->links() }}
        </div>
    @else
        <p class="muted">Belum ada artikel yang tersedia.</p>
    @endif
</section>
@endsection
