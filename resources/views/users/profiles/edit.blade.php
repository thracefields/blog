@extends('layouts.user')

@section('content')
<h2 class="title is-2">Редактиране на профил</h2>
<form method="POST" action="{{ route('profiles.update', $profile->slug) }}">
    @csrf
    @method('PATCH')
    @honeypot
    <div class="field">
        <label for="name" class="label">Име:</label>
        <p class="control">
            <input type="text" class="input" value="{{ Auth::user()->name }}" disabled id="name">
        </p>
    </div>
    <div class="field">
        <label for="name" class="label">Имейл адрес:</label>
        <p class="control">
            <input type="text" class="input" value="{{ Auth::user()->email }}" disabled id="email">
        </p>
    </div>
    <div class="field">
        <label for="settlement" class="label">Населено място:</label>
        <p class="control">
            <input type="text" class="input" name="settlement" value="{{ $profile->settlement }}" id="settlement">
        </p>
    </div>
    <div class="field">
        <label for="about-me" class="label">За мен:</label>
        <p class="control">
            <textarea name="about_me" cols="30" rows="10" name="about_me"
                class="textarea">{{ $profile->about_me }}</textarea>
        </p>
    </div>
    <div class="field">
        <p class="control">
            <button class="button is-info" type="submit">Редактирай!</button>
        </p>
    </div>
</form>
@endsection
