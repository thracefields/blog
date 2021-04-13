@extends('layouts.manage')

@section('content')
@card
@slot('title')
Потребители
@endslot
<div class="is-clearfix">
    <a href="{{ route('users.create') }}" class="button is-info is-pulled-right">
        <span class="icon">
            <i class="fas fa-plus"></i>
        </span>
        <span>Нов потребител</span>
    </a>
</div>
<div class="table-container">
    <table class="table is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th>Име</th>
                <th>Имейл</th>
                <th>Роли</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td data-label="Име:">{{ $user->name }}</td>
                <td data-label="Имейл:">{{ $user->email }}</td>
                <td data-label="Роли:">
                    @if ($user->roles->count() > 0)
                    <div class="content">
                        <ul>
                            @foreach ($user->roles as $role)
                            <li>{{ $role->display_name }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @else
                    Няма роли!
                    @endif
                </td>
                <td>
                    <div class="field is-grouped">
                        <p class="control">
                            <a href="{{ route('users.edit', $user->id) }}" class="button is-primary">
                                <span class="icon">
                                    <i class="fas fa-edit"></i>
                                </span>
                            </a>
                        </p>
                        <p class="control">
                            <a target="_blank" href="{{ route('users.show', $user->id) }}" class="button is-link">
                                <span class="icon">
                                    <i class="far fa-eye"></i>
                                </span>
                            </a>
                        </p>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
{{ $users->links() }}
@endcard
@endsection