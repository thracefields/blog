@extends('layouts.app')
@section('content')


@permission('update-articles')
<div class="is-clearfix">
    <a class="button is-pulled-right" href="{{ route('manage.articles.edit', $article->slug) }}">
        <span class="icon">
            <i class="fas fa-edit"></i>
        </span>
        <span>Редактиране</span>
    </a>
</div>
@endpermission

<div class="columns is-centered">
    <div class="column is-10">
        @card
        @slot('title', 'Статия')
        <article>

            <h1 class="title is-1">{{ $article->title }}</h1>
            <h3 class="subtitle">{{ $article->subtitle }}</h3>
            <div class="columns is-mobile is-multiline has-margin-top-20 has-margin-bottom-20">
                <div class="column is-narrow">
                    <a href="{{ route('categories.show', $article->category->slug) }}" class="has-text-brown">
                        <span class="icon has-text-brown">
                            <i class="fas fa-circle fa-xs"></i>
                        </span>
                        <span class="has-text-brown">{{ $article->category->name }}</span>
                    </a>
                </div>
                <div class="column is-narrow">
                    <span class="icon">
                        <i class="far fa-clock"></i>
                    </span>
                    <span>{{ $article->published_at->translatedFormat('j F Y г. G:i') }}</span>
                </div>
                <div class="column is-narrow">
                    <span class="icon">
                        <i class="fas fa-eye"></i>
                    </span>
                    <span>{{ views($article)->count() }}</span>
                </div>

                <div class="column is-narrow">
                    <span class="icon has-text-info">
                        <i class="fas fa-tag"></i>
                    </span>
                    <span>{{ $article->tags->count() }}</span>
                </div>
            </div>
            @if ($article->getFirstMediaUrl('thumbs', 'thumb'))
            <div class="columns is-centered">
                <div class="column is-narrow">
                    <figure>
                        <img src="{{ $article->getFirstMediaUrl('thumbs', 'thumb') }}" alt="">
                    </figure>
                </div>
            </div>
            @else
            <div class="hero is-light has-padding-100 is-unselectable">
                <div class="hero-body has-text-grey">
                    <div class="container has-text-centered">
                        <span class="icon is-large has-text-black">
                            <i class="fas fa-image fa-lg"></i>
                        </span>
                        <p>
                            Няма изображение!
                        </p>
                    </div>
                </div>
            </div>
            @endif
            <div class="content has-margin-top-20">@parsedown($article->content)</div>

            <footer class="has-margin-top-20">
                @if($article->tags->count() > 0)
                <div class="tags are-medium">
                    @foreach ($article->tags as $tag)
                    <span class="tag is-info">
                        <span class="icon">
                            <i class="fas fa-tag"></i>
                        </span>
                        <a class="has-text-white" href="{{ route('tags.show', $tag->slug) }}">{{ $tag->name }}</a>
                    </span>
                    @endforeach
                </div>
                @endif

            </footer>
        </article>
        @endcard
    </div>
</div>
@endsection