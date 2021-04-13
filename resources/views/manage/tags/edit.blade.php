@extends('layouts.manage')

@section('content')
@card
@slot('title', 'Редактиране на таг')
<form action="{{ route('manage.tags.update', $tag->slug) }}" method="POST">
    @csrf
    @method('PATCH')
    @honeypot
    <div class="field">
        <label for="name" class="label">Име</label>
        <div class="control">
            <input class="input" type="text" name="name" id="name" value="{{ $tag->name }}">
            @error('name')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="field">
        <button class="button is-info" type="submit">Редактирай!</button>
    </div>
</form>
@endcard
@endsection
