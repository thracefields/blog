@extends('layouts.app')
@section('content')

<div class="container mb-4">

    @card
    @slot('title', 'Търсене')
    <form method="GET" action="{{ route('search') }}">

        <div class="field has-addons">
            <div class="control is-expanded">
                <input class="input @error('q')is-danger @enderror" name="q" type="text" placeholder="Напишете нещо...">
            </div>
            <div class="control">
                <button type="submit" class="button is-info">
                    <span class="icon">
                        <i class="fas fa-search"></i>
                    </span>
                    <span>Търси</span>
                </button>
            </div>
        </div>
        @error('q')
        <p class="help is-danger">{{ $message }}</p>
        @enderror
    </form>
    @endcard
</div>

<div class="columns is-desktop is-variable is-2">

    <aside class="column is-3-desktop">
        <div class="panel is-brown">
            <div class="panel-heading">Категории</div>
            @foreach ($categories as $category)
            <a class="panel-block" href="{{ route('categories.show', $category->slug) }}">
                <span class="icon has-text-brown">
                    <i class="fas fa-circle fa-xs"></i>
                </span>
                <span class="has-text-brown">{{ $category->name }}</span>
            </a>
            @endforeach
            <div class="panel-block">
                <a href="{{ route('categories.index') }}" class="button is-brown is-outlined is-fullwidth">Всички
                    категории</a>
            </div>
        </div>
        <div class="panel is-info">
            <div class="panel-heading">Тагове</div>
            @foreach ($tags as $tag)
            <a class="panel-block" href="{{ route('tags.show', $tag->slug) }}">
                <span class="icon has-text-info">
                    <i class="fas fa-tag"></i>
                </span>
                <span>{{ $tag->name }} <span class="tag">{{ $tag->articles->count() }}</span></span>
            </a>
            @endforeach
            <div class="panel-block">
                <a href="{{ route('tags.index') }}" class="button is-info is-outlined is-fullwidth">Всички тагове</a>
            </div>
        </div>
    </aside>

    <div class="column">


        <div class="is-divider"></div>
        <h3 class="title is-3">Водещи статии</h3>
        <div class="columns is-multiline">

            @foreach ($featuredArticles as $featuredArticle)
            <div class="column is-half">
                <div class="card">
                    <div class="card-image">
                        @if ($featuredArticle->getFirstMediaUrl('thumbs', 'thumb'))
                        <figure class="image">
                            <img src="{{ $featuredArticle->getFirstMediaUrl('thumbs', 'thumb') }}" alt="">
                        </figure>
                        @else
                        <div class="hero is-light has-padding-60 is-unselectable">
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
                    <div class="card-content">

                        <h4 class="title is-4"><a class="has-text-black"
                                href="{{ route('articles.show', $featuredArticle->slug) }}">{{ $featuredArticle->title }}</a>
                        </h4>
                        <h6 class="subtitle is-6">{{ $featuredArticle->subtitle }}</h6>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="is-divider"></div>
        <h3 class="title is-3">Последни статии</h3>
        <div class="columns is-multiline">
            @foreach ($latestArticles as $latestArticle)
            <div class="column is-half-desktop">
                <div class="card">

                    <div class="card-image">
                        @if ($latestArticle->getFirstMediaUrl('thumbs', 'thumb'))
                        <figure class="image">
                            <img src="{{ $latestArticle->getFirstMediaUrl('thumbs', 'thumb') }}" alt="">
                        </figure>
                        @else
                        <div class="hero is-light has-padding-60 is-unselectable">
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

                    <div class="card-content">
                        <div class="content">

                            <a class="title is-4"
                                href="{{ route('articles.show', $latestArticle->slug) }}">{{ $latestArticle->title }}</a>


                        </div>
                        <div class="has-text-centered">
                            <a href="/bulma-clean-theme/2020/05/08/creating-a-docs-site-with-bulma-clean-theme/"
                                class="button is-primary">Прочети повече</a>
                        </div>
                    </div>
                    <footer class="card-footer">
                        <p class="card-footer-item"><strong>Публикувано:&nbsp;</strong>
                            {{ $latestArticle->published_at->diffForHumans() }}</p>
                    </footer>
                </div>
            </div>
            @endforeach
        </div>

        @endsection