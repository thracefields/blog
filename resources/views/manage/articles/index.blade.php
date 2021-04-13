@extends('layouts.manage')


@section('content')
@card
@slot('title', 'Статии')
<div class="is-clearfix">
    <a href="{{ route('manage.articles.create') }}" class="button is-info is-pulled-right">
        <span class="icon">
            <i class="fas fa-plus"></i>
        </span>
        <span>Нова статия</span>
    </a>
</div>
<table class="table is-hoverable is-fullwidth">
    <thead>
        <tr>
            <th>Заглавие:</th>
            <th>Съдържание:</th>
            <th>Публикуване:</th>
            <th>Статус:</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articles as $article)
        <tr>
            <td data-label="Заглавие:">{{ Str::words($article->title, 6, '...') }}</td>
            <td data-label="Съдържание:">
                {{ Str::words(strip_tags(parsedown($article->content)), 16, '...') }}
            </td>
            <td data-label="Публикуване:">{{ $article->published_at->format('j.m.Y') }}</td>
            <td data-label="Статус:">
                @if($article->published_at <= Carbon\Carbon::now()) <span class="has-text-success">
                    Публикувана!</span>
                    @else
                    <span class="has-text-danger">Очаква публикуване!</span>
                    @endif
            </td>
            <td>
                <div class="buttons">
                    <a class="button is-info" target="_blank" href="{{ route('articles.show', $article->slug)  }}">
                        <span class="icon">
                            <i class="fas fa-eye"></i>
                        </span>
                    </a>
                    <a class="button is-primary" href="{{ route('manage.articles.edit', $article->slug) }}">
                        <span class="icon">
                            <i class="fas fa-edit"></i>
                        </span>
                    </a>
                    <form action="{{ route('manage.articles.destroy', $article->slug) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        @honeypot
                        <button class="button is-danger" type="submit">
                            <span class="icon">
                                <i class="fas fa-trash"></i>
                            </span>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $articles->links() }}
@endcard
@endsection