@extends('layouts.app')
@section('content')
<div class="container">
    @card
    @slot('title', 'Резултати от търсенето')
    @if ($articles->count() > 0)
    @foreach ($articles as $article)
    <div class="columns">
        <div class="column">

            <div class="article">
                <div class="columns is-centered">
                    <div class="column is-3">
                        @if ($article->getFirstMediaUrl('thumbs', 'thumb'))
                        <figure class="image">
                            <img src="{{ $article->getFirstMediaUrl('thumbs', 'thumb') }}" alt="">
                        </figure>
                        @else
                        <div class="hero is-light has-padding-20 is-unselectable">
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
                    </div>
                    <div class="column is-7">
                        <div>
                            <span class="icon has-text-brown">
                                <i class="fas fa-circle fa-xs"></i>
                            </span>
                            <span><a class="has-text-black"
                                    href="{{ route('categories.show', $article->category->slug) }}">{{ $article->category->name }}
                            </span></a><span class="has-text-grey"> |
                                {{ $article->published_at->diffForHumans() }}</span>
                        </div>
                        <h2 class="title is-4">
                            <a href="{{ route('articles.show', $article->slug) }}">{{ $article->title }}</a>
                        </h2>
                        <p class="subtitle is-6">{{ $article->subtitle}}</p>
                        @if($article->tags->count() > 0)
                        <div class="tags are-medium">
                            @foreach ($article->tags as $tag)
                            <span class="tag is-info">
                                <span class="icon">
                                    <i class="fas fa-tag"></i>
                                </span>
                                <a class="has-text-white"
                                    href="{{ route('tags.show', $tag->slug) }}">{{ $tag->name }}</a>
                            </span>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    <div class="is-divider-vertical"></div>
                    <div class="column is-hidden-mobile">
                        <div class="columns">
                            <div class="column is-narrow">
                                <span class="icon">
                                    <i class="fas fa-eye"></i>
                                </span>
                                <span>{{ views($article)->count() }}</span>
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column is-narrow">
                                <span class="icon has-text-info">
                                    <i class="fas fa-tag"></i>
                                </span>
                                <span>{{ $article->tags->count() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    {{ $articles->appends(request()->input())->links() }}
    @else
    <div class="message is-info">
        <div class="message-body">
            Няма намерени резултати!
        </div>
    </div>
    @endif
    @endcard
</div>
@endsection