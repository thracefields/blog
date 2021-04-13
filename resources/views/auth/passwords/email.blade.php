@extends('layouts.app')

@section('content')
@if (session('status'))
<div class="notification is-success">
    {{ session('status') }}
</div>
@endif
<div class="columns is-centered">
    <div class="column is-10-tablet is-5-desktop">
        <div class="box">
            <h2 class="title is-2 has-accent is-uppercase">Забравена парола</h2>

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                @honeypot

                <div class="field">
                    <label for="email" class="label">Имейл адрес</label>

                    <div class="control has-icons-left">
                        <input id="email" type="email" class="input @error('email') is-danger @enderror" name="email"
                            value="{{ $email ?? old('email') }}" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                    </div>

                    @error('email')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <div class="control">
                        <button type="submit" class="button is-info is-fullwidth">
                            Възстанови!
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
