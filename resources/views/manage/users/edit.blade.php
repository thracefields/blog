@extends('layouts.manage')


@section('content')
@card
@slot('title', 'Редактиране на потребител')
    
<form method="POST" action="{{ route('users.update', $user->id) }}">
    @csrf
    @method('PATCH')
    @honeypot
    <div class="field">
        <label for="name" class="label">Име</label>
        <div class="control">
            <input id="name" type="text" class="input @error('name') is-danger @enderror" name="name"
                value="{{ $user->name }}" required>
        </div>
        @error('name')
        <p class="help is-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="field">
        <label for="email" class="label">Имейл адрес</label>
        <div class="control">
            <input id="name" type="text" class="input @error('email') is-danger @enderror" name="email"
                value="{{ $user->email }}" required>
        </div>
        @error('email')
        <p class="help is-danger">{{ $message }}</p>
        @enderror
    </div>
    <template>
        <div class="field">
            <label for="password" class="label">Парола</label>
            <div class="field">
                <b-radio name="password_options" v-model="password_options" native-value="keep">Без промяна на
                    паролата</b-radio>
            </div>
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
    </template>
    <input type="hidden" name="roles" :value="rolesSelected" />
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
                Редактирай!
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
            password_options: 'keep',
            rolesSelected: {!! $user->roles->pluck('id') !!}
        }
    });
</script>
@endsection
