@extends('layouts.manage')

@section('content')
@card
@slot('title', 'Редактиране на права')
<form method="POST" action="{{ route('permissions.update', $permission->name) }}">
    @csrf
    @method('PUT')
    @honeypot
    <div class="field">
        <label for="display-name" class="label">Име (заглавие)</label>

        <div class="control">
            <input id="display-name" type="text" class="input @error('display_name') is-danger @enderror"
                name="display_name" value="{{ $permission->display_name }}" required>
        </div>
        @error('display_name')
        <p class="help is-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="field">
        <label for="name" class="label">Име</label>

        <div class="control">
            <input id="name" type="text" class="input @error('name') is-danger @enderror" name="dispay_name"
                value="{{ $permission->name }}" required disabled>
        </div>
        @error('name')
        <p class="help is-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="field">
        <label for="description" class="label">Описание</label>

        <div class="control">
            <input id="description" type="text" class="input @error('description') is-danger @enderror"
                name="description" value="{{ $permission->description }}" required>
        </div>
        @error('description')
        <p class="help is-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="field">
        <div class="control">
            <button type="submit" class="button is-link">
                Редактирай!
            </button>
        </div>
    </div>
</form>
@endcard
@endsection