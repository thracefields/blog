@extends('layouts.app')

@section('content')
<div id="registration">
    <div class="columns is-centered">
        <div class="column is-10-tablet is-6-desktop">
            <div class="box">
                <h2 class="title is-2 has-accent is-uppercase">Регистрация</h2>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        @honeypot

                        <div class="field">
                            <label for="first-name" class="label">Име:</label>

                            <div class="control has-icons-left">
                                <input id="first-name" type="text"
                                    class="input @error('first_name') is-danger @enderror" name="first_name"
                                    value="{{ old('first_name') }}" required>
                                <span class="icon is-left">
                                    <i class="fas fa-id-card"></i>
                                </span>
                            </div>
                            @error('first_name')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="field">
                            <label for="last-name" class="label">Фамилия:</label>

                            <div class="control has-icons-left">
                                <input id="last-name" type="text" class="input @error('last_name') is-danger @enderror"
                                    name="last_name" value="{{ old('last_name') }}" required>
                                <span class="icon is-left">
                                    <i class="fas fa-id-card"></i>
                                </span>
                            </div>
                            @error('last_name')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="field">
                            <label for="email" class="label">Имейл адрес:</label>

                            <div class="control has-icons-left">
                                <input id="email" type="email" class="input @error('email') is-danger @enderror"
                                    name="email" value="{{ old('email') }}" required>
                                <span class="icon is-left">
                                    <i class="fas fa-envelope"></i>
                                </span>
                            </div>
                            @error('email')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="username" class="label">Потребителско име:</label>

                            <div class="control has-icons-left">
                                <input id="username" type="text" class="input @error('username') is-danger @enderror"
                                    name="username" value="{{ old('username') }}" required>
                                <span class="icon is-left">
                                    <i class="fas fa-id-card"></i>
                                </span>
                            </div>
                            @error('username')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="password" class="label">Парола:</label>

                            <div class="control has-icons-left">
                                <input id="password" type="password"
                                    class="input @error('password') is-danger @enderror" name="password" required>
                                <span class="icon is-small is-left">
                                    <i class="fas fa-lock"></i>
                                </span>
                            </div>
                            @error('password')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="password-confirm" class="label">Повторете паролата:</label>
                            <div class="control has-icons-left">
                                <input id="password-confirm" type="password" class="input" name="password_confirmation">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-lock"></i>
                                </span>
                            </div>
                        </div>

                        <div class="field">
                            <label for="password-confirm" class="label">Докажете, че не сте робот:</label>
                            @captcha
                            <div class="control">
                                <input type="text" id="captcha" class="input @error('captcha') is-danger @enderror" name="captcha" autocomplete="off">
                            </div>
                            @error('captcha')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <div class="control">
                                <button type="submit" class="button is-info is-fullwidth">
                                    Регистрирай се!
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection