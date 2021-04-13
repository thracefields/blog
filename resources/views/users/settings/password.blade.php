@extends('layouts.user')

@section('content')
@card
@slot('title', 'Промяна на парола')
<form method="POST" action="{{ route('settings.password.update') }}">
    @csrf
    @method('PATCH')
    @honeypot

    <div class="field">
        <label for="password" class="label">Парола:</label>

        <div class="control has-icons-left">
            <input id="password" type="password" class="input @error('old_password') is-danger @enderror" name="old_password">
            <span class="icon is-small is-left">
                <i class="fas fa-lock"></i>
            </span>
        </div>

        @error('old_password')
        <p class="help is-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="field">
        <label for="new-password" class="label">Нова парола:</label>

        <div class="control has-icons-left">
            <input id="new-password" type="password" class="input @error('new_password') is-danger @enderror"
                name="new_password" >
            <span class="icon is-small is-left">
                <i class="fas fa-lock"></i>
            </span>
        </div>

        @error('new_password')
        <p class="help is-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="field">
        <label for="new-password-confirm" class="label">Потвърдете новата парола:</label>

        <div class="control has-icons-left">
            <input id="new-password-confirm" type="password" class="input" name="new_password_confirmation" >
            <span class="icon is-small is-left">
                <i class="fas fa-lock"></i>
            </span>
        </div>
    </div>

    <div class="field">
        <div class="control">
            <button type="submit" class="button is-info">
                Промени!
            </button>
        </div>
    </div>
</form>
@endcard
@endsection
