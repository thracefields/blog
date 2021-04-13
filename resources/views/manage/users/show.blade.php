@extends('layouts.manage')

@section('content')
@card
@slot('title', 'Подробности за потребител')
<div class="is-clearfix">
    <a href="{{ route('users.edit', $user->id) }}" class="button is-primary is-pulled-right">
        <span class="icon">
            <i class="fas fa-edit"></i>
        </span>
        <span>Редактиране</span>
    </a>
</div>
<div class="columns align-items-center">
    <div class="column">
        <h6 class="title is-6">Име</h6>
    </div>
    <div class="column">
        <p>{{ $user->name }}</p>
    </div>
</div>
<div class="columns">
    <div class="column">
        <h6 class="title is-6">Имейл адрес</h6>
    </div>
    <div class="column">
        <p>{{ $user->email }}</p>
    </div>
</div>
<div class="columns">
    <div class="column">
        <h6 class="title is-6">Регистриран на:</h6>
    </div>
    <div class="column">
        <p>{{ $user->created_at }}</p>
    </div>
</div>
<section class="hero is-light">
    <div class="hero-body">
        <div class="container">
            <h2 class="title">Роли</h2>
            @if($user->roles->count() > 0)
            <div class="content">
                <ul>
                    @foreach ($user->roles as $role)
                    <li>{{$role->display_name}} ({{$role->description}})</li>
                    @endforeach
                </ul>
            </div>
            @else
            <div class="notification is-warning">Потребителят все още няма добавени роли!</div>
            @endif
        </div>
    </div>
</section>
@endcard
@endsection
