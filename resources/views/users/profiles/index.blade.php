@extends('layouts.user')

@section('content')
@card

@slot('title', 'Профил')
<div class="buttons is-right">
    <a href="{{ route('profiles.show', Auth::user()->profile->slug) }}" class="button is-info" target="_blank">
        <span class="icon">
            <i class="fas fa-eye"></i>
        </span>
        <span>Публичен профил</span>
    </a>
    <a href="{{ route('profiles.edit', Auth::user()->profile->slug) }}" class="button is-primary">
        <span class="icon">
            <i class="fas fa-edit"></i>
        </span>
        <span>Редактиране</span>
    </a>
</div>

<div class="columns is-centered align-items-center-mobile">
    <div class="column is-narrow">
        {!! Avatar::create(Auth::user()->name)->toSvg() !!}
    </div>
    <div class="column">
        <div class="columns is-vcentered">
            <div class="column is-narrow">
                <h4 class="title is-4 ">{{ Auth::user()->name }}</h4>
                <h6 class="subtitle is-6">Присъединяване: {{ Auth::user()->created_at->diffForHumans() }}</h6>
            </div>
            {{-- <div class="column is-narrow">
                <a href="{{ route('profiles.show', Auth::user()->profile->slug) }}">{{ '@' . Auth::user()->username }}</a>
            </div> --}}
        </div>

        <div class="columns">
            <div class="column">
                <h6 class="title is-6">Имейл адрес:</h6>
            </div>
            <div class="column">
                <p>{{ Auth::user()->email }}</p>
            </div>
        </div>

        @isset($profile->settlement)
        <div class="columns align-items-center">
            <div class="column">
                <h6 class="title is-6">Населено място:</h6>
            </div>
            <div class="column">
                <span class="icon has-text-info">
                    <i class="fas fa-thumbtack"></i>
                </span>
                <span>{{ $profile->settlement }}</span>
            </div>
        </div>
        @endisset
        @isset($profile->about_me)
        <div class="columns align-items-center">
            <div class="column">
                <h6 class="title is-6">За мен:</h6>
            </div>
            <div class="column">
                <p>{{ $profile->about_me }}</p>
            </div>
        </div>
        @endisset
    </div>
</div>
@empty($profile->name || $profile->settlement)
<div class="message is-info">
    <div class="message-body">
        Профилът все още не е попълнен!
    </div>
</div>
@endempty
@endcard
<hr>
@endsection
