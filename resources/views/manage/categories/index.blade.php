@extends('layouts.manage')

@section('content')
@card
@slot('title', 'Категории')
<div class="is-clearfix">
    <a href="{{ route('manage.categories.create') }}" class="button is-info is-pulled-right">
        <span class="icon">
            <i class="fas fa-plus"></i>
        </span>
        <span>Нова категория</span>
    </a>
</div>
@if($categories->count() > 0)
<div class="table-container">
    <table class="table is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th>Име</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td data-label="Име: ">{{ $category->name }}</td>
                <td>
                    <a href="{{ route('manage.categories.edit', $category->slug) }}" class="button is-primary">
                        <span class="icon">
                            <i class="fas fa-edit"></i>
                        </span>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
{{ $categories->links() }}
@else
<div class="message is-info">
    <div class="message-body">
        Все още няма добавени категории!</div>
</div>
@endif
@endcard
@endsection