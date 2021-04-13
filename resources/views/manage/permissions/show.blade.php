@extends('layouts.manage')

@section('content')
@card
@slot('title', 'Подробности за права')
<div class="is-clearfix">
    <a href="{{ route('permissions.edit', $permission->name) }}" class="button is-primary is-pulled-right">
        <span class="icon">
            <i class="fas fa-edit"></i>
        </span>
        <span>Редактиране</span>
    </a>
</div>
<div class="columns align-items-center">
    <div class="column">
        <h6 class="title is-6">Име (заглавие)</h6>
    </div>
    <div class="column">
        <p>{{ $permission->display_name }}</p>
    </div>
</div>
<div class="columns">
    <div class="column">
        <h6 class="title is-6">Име</h6>
    </div>
    <div class="column">
        <p>{{ $permission->name }}</p>
    </div>
</div>
<div class="columns">
    <div class="column">
        <h6 class="title is-6">Описание</h6>
    </div>
    <div class="column">
        <p>{{ $permission->description }}</p>
    </div>
</div>
@endcard
@endsection
