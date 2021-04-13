@extends('layouts.manage')

@section('content')
@card
@slot('title', 'Добавяне на потребител')
<form method="POST" action="{{ route('users.store') }}">
    @csrf
    @honeypot
    <template>
        <input type="hidden" name="roles" :value="rolesSelected">
    </template>
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
        <label for="email" class="label">Имейл адрес</label>

        <div class="control">
            <input id="email" type="email" class="input @error('email') is-danger @enderror" name="email"
                value="{{ old('email') }}" required>
        </div>
        @error('email')
        <p class="help is-danger">{{ $message }}</p>
        @enderror
    </div>


    <div class="field">
        <label for="password" class="label">Парола</label>
        <div class="field">
            <b-radio name="password_options" v-model="password_options" native-value="auto">Генериране на
                нова
                парола</b-radio>
        </div>
        <div class="field">
            <b-radio name="password_options" v-model="password_options" native-value="manual">Ръчно добавяне
                на
                парола</b-radio>
            <div class="control">
                <input type="password" class="input @error('password') is-danger @enderror" name="password"
                    id="password" v-if="password_options == 'manual'" placeholder="Въведете нова парола" required>
                @error('password')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    <div class="field">
        <section class="hero is-light">
            <div class="hero-body">
                <div class="container">
                    <h2 class="title">Роли</h2>
                    @foreach ($roles as $role)
                    <div class="field">
                        <b-checkbox v-model="rolesSelected" :native-value="{{$role->id}}">{{$role->display_name}}
                        </b-checkbox>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
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
            message: '',
            password_options: 'auto',
            rolesSelected: {!! old('roles') ? old('roles') : '""' !!}
        }
    });
</script>
@endsection