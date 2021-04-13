@extends('layouts.manage')

@section('content')
@card
@slot('title', 'Добавяне на нова роля')
<form method="POST" action="{{ route('roles.store') }}">
    @csrf
    @honeypot

    <div class="field">
        <label for="display-name" class="label">Име (заглавие)</label>

        <div class="control">
            <input id="display-name" type="text" class="input @error('display_name') is-danger @enderror"
                name="display_name" value="{{ old('display_name') }}" required>
        </div>
        @error('display_name')
        <p class="help is-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="field">
        <label for="name" class="label">Име</label>

        <div class="control">
            <input id="name" type="text" class="input @error('name') is-danger @enderror" name="name"
                value="{{ old('name') }}" required>
        </div>
        @error('name')
        <p class="help is-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="field">
        <label for="description" class="label">Описание</label>

        <div class="control">
            <input id="description" type="text" class="input @error('description') is-danger @enderror"
                name="description" value="{{ old('description') }}" required>
        </div>
        @error('description')
        <p class="help is-danger">{{ $message }}</p>
        @enderror
    </div>
    <template>
        <input type="hidden" :value="permissionsSelected" name="permissions">
    </template>
    
    <section class="hero is-light mt-2 mb-2">
        <div class="hero-body">
            <div class="container">
                <h2 class="title">Права</h2>
                <template>
                    @foreach ($permissions as $permission)
                    <div class="field">
                        <b-checkbox v-model="permissionsSelected" :native-value="{{$permission->id}}">
                            {{$permission->display_name}} <em>({{$permission->description}})</em></b-checkbox>
                    </div>
                    @endforeach
                </template>
            </div>
        </div>
    </section>
    <div class="field">
        <div class="control">
            <button type="submit" class="button is-link">
                Добави!
            </button>
        </div>
    </div>
</form>
@endcard
@endsection
@section('js-body')
<script>
    new Vue({
        el: '#app',
        data: {
            permissionsSelected: []
        }
    });
</script>
@endsection
