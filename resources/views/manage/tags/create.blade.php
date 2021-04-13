@extends('layouts.manage')

@section('content')
@card
@slot('title', 'Нов таг')
<form action="{{ route('manage.tags.store') }}" method="POST">
    @csrf
    <div class="field">
        <label for="name" class="label">Име</label>
        <div class="control">
            <input class="input @error('name') is-danger @enderror" type="text" name="name" id="name">
            @error('name')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="field">
        <button class="button is-info" type="submit">Добави!</button>
    </div>
</form>
@endcard
@endsection