@extends('layouts.manage')

@section('content')
@card
@slot('title', 'Роля')
<div class="is-clearfix">
    <a href="{{ route('roles.edit', $role->id) }}" class="button is-success is-pulled-right">
        <span class="icon">
            <i class="fas fa-edit"></i>
        </span>
        <span>Редактиране</span>
    </a>
</div>
<h1 class="title">{{ $role->display_name }} <small><em>( {{ $role->name }} )</em> </small></h1>
<h5 class="subtitle">{{ $role->description }}</h5>
<section class="hero is-light">
    <div class="hero-body">
        <div class="container">
            <h2 class="title">Права</h2>
            <div class="content">
                <ul>
                    @foreach ($role->permissions as $permission)
                    <li>{{$permission->display_name}} <em>( {{ $permission->description }} )</em></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
@endcard
@endsection
