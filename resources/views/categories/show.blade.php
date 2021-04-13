@extends('layouts.app')
@section('content')
@permission('update-categories')
<div class="is-clearfix">
    <a class="button is-pulled-right" href="{{ route('manage.categories.edit', $category->slug) }}">
        <span class="icon">
            <i class="fas fa-edit"></i>
        </span>
        <span>Редактиране</span>
    </a>
</div>
@endpermission

<h2 class="title is-2 is-uppercase">Категория: <span class="has-text-primary">{{ $category->name }}</span></h2>
@if ($articles->count() > 0)

<div class="columns is-centered">
    <div class="column is-10">



        <div class="columns is-multiline">

            @foreach ($articles as $article)
            <div class="column is-half-desktop">
                <div class="card">
                    <div class="card-image">
                        @if ($article->getFirstMediaUrl('thumbs', 'thumb'))
                        <figure class="image">
                            <img src="{{ $article->getFirstMediaUrl('thumbs', 'thumb') }}" alt="">
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
                                href="{{ route('articles.show', $article->slug) }}">{{ $article->title }}</a>
                        </h4>
                        <h6 class="subtitle is-6">{{ $article->subtitle }}</h6>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div>{{ $articles->links() }}</div>
    </div>
</div>
@else
<div class="message is-info">
    <div class="message-body">
        Все още няма добавени статии към тази категория!
    </div>
</div>
@endif
</div>
@endsection