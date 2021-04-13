@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="title is-2">Профил</h2>
    <div class="box has-padding-30">
        <div class="columns is-centered">
            <div class="column is-narrow">
                {!! Avatar::create($user->name)->toSvg() !!}
            </div>
            <div class="column">
                <div class="columns is-vcentered">
                    <div class="column is-narrow">
                        <h4 class="title is-4 ">{{ $user->name }}</h4>
                    </div>
                    <div class="column is-narrow">
                        <a href="{{ route('profiles.show', $user->profile->slug) }}">{{ '@' . $user->username }}</a>
                    </div>
                </div>
                <p class="subtitle">Присъединяване: {{ $user->created_at->diffForHumans() }}</p>
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
    </div>
</div>
@endsection
