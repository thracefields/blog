@extends('layouts.manage')

@section('content')
@card
@slot('title', 'Тагове')
<div class="is-clearfix">
    <a href="{{ route('manage.tags.create') }}" class="button is-info is-pulled-right">
        <span class="icon">
            <i class="fas fa-plus"></i>
        </span>
        <span>Нов таг</span>
    </a>
</div>
@if($tags->count() > 0)
<div class="table-container">
    <table class="table is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th>Име</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tags as $tag)
            <tr>
                <td data-label="Име:">{{ $tag->name }}</td>
                <td>
                    <div class="buttons">

                        <a href="{{ route('manage.tags.edit', $tag->slug) }}" class="button is-primary">
                            <span class="icon">
                                <i class="fas fa-edit"></i>
                            </span>
                        </a>
                        <form action="{{ route('manage.tags.destroy', $tag->slug) }}" method="POST">
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
</div>
{{ $tags->links() }}
@else
<div class="message is-info">
    <div class="message-body">
        Все още няма добавени тагове. Добавете първия!</p>
    </div>
</div>
@endif
@endcard

@endsection