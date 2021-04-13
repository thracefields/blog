@extends('layouts.manage')

@section('content')
@card
@slot('title', 'Права за достъп')
<div class="is-clearfix">
    <a href="{{ route('permissions.create') }}" class="button is-info is-pulled-right">
        <span class="icon">
            <i class="fas fa-plus"></i>
        </span>
        <span>Добавяне на права</span>
    </a>
</div>
<div class="table-container">

    <table class="table is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th>Име (заглавие)</th>
                <th>Име</th>
                <th>Описание</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($permissions as $permission)
            <tr>
                <td data-label="Име (заглавие): ">{{ $permission->display_name }}</td>
                <td data-label="Име: ">{{ $permission->name }}</td>
                <td data-label="Описание: ">{{ $permission->description  }}</td>
                <td>
                    <div class="field is-grouped">
                        <p class="control">
                            <a href="{{ route('permissions.edit', $permission->name) }}" class="button is-primary">
                                <span class="icon">
                                    <i class="fas fa-edit"></i>
                                </span>
                            </a>
                        </p>
                        <p class="control">
                            <a target="_blank" href="{{ route('permissions.show', $permission->name) }}" class="button is-link">
                                <span class="icon">
                                    <i class="far fa-eye"></i>
                                </span>
                            </a>
                        </p>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endcard
@endsection
