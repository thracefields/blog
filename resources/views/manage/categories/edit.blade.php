@extends('layouts.manage')

@section('content')
@card
@slot('title', 'Редактиране на категория')
<form action="{{ route('manage.categories.update', $category->slug) }}" method="POST">
    @csrf
    @method('PUT')
    @honeypot
    <div class="field">
        <label for="name" class="label">Име</label>
        <div class="control">
            <input class="input  @error('name') is-danger @enderror" type="text" name="name" id="name"
                value="{{ $category->name }}">
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