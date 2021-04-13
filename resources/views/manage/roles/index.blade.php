@extends('layouts.manage')

@section('content')
@card
<div class="is-clearfix">
    <a href="{{ route('roles.create') }}" class="button is-info is-pulled-right">
        <span class="icon">
            <i class="fas fa-plus"></i>
        </span>
        <span>Нова роля</span>
    </a>
</div>
@slot('title', 'Роли')
<div class="columns is-multiline">
    @foreach ($roles as $role)
    <div class="column is-half-desktop is-full-tablet">
        <div class="box">
            <h3 class="title is-3">
                {{ $role->display_name }}
            </h3>
            <h4 class="subtitle"><em>{{ $role->name }}</em></h4>
            <p>{{ $role->description }}</p>
            <hr>
            <div class="field is-grouped">
                <p class="control">
                    <a href="{{ route('roles.edit', $role->id) }}" class="button is-primary">
                        <span class="icon">
                            <i class="fas fa-edit"></i>
                        </span>
                    </a>
                </p>
                <p class="control">
                    <a target="_blank" href="{{ route('roles.show', $role->id) }}"
                        class="button is-link">
                        <span class="icon">
                            <i class="far fa-eye"></i>
                        </span>
                    </a>
                </p>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endcard
@endsection
