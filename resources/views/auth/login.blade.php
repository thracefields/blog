@extends('layouts.app')

@section('content')
<div class="columns is-centered">
    <div class="column is-10-tablet is-5-desktop">
        <div class="box">
            @if (session('login'))
            <div class="notification is-danger">{{ session('login') }}</div>
            @endif
            <h2 class="title is-2 has-accent is-uppercase">Вход</h2>
            <form method="POST" action="{{ route('login') }}">
                @honeypot
                @csrf
                <div class="field">
                    <label for="email" class="label">Имейл адрес:</label>
                    <p class="control has-icons-left">
                        <input id="email" type="email" class="input @error('email') is-danger @enderror" name="email"
                            value="{{ old('email') }}" required autofocus>
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        @error('email')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </p>
                </div>

                <div class="field">
                    <label for="password" class="label">Парола:</label>

                    <p class="control has-icons-left">
                        <input id="password" type="password" class="input @error('password') is-danger @enderror"
                            name="password" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                        @error('password')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </p>
                </div>

                <div class="field">
                    <input class="is-checkradio is-primary" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">
                        Запомни ме!
                    </label>
                </div>

                <div class="field">
                    <div class="control has-text-centered">
                        <button type="submit" class="button is-info is-fullwidth">
                            Влез!
                        </button>
                    </div>
                </div>
            </form>
        </div>
        @if (Route::has('password.request'))
        <a class="has-text-centered is-block" href="{{ route('password.request') }}">
            Забравена парола?
        </a>
        @endif
        <a href="{{ route('register') }}" class="has-text-centered is-block">Нямате регистрация?</a>
    </div>
</div>
@endsection