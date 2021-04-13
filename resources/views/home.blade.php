@extends('layouts.user')

@section('content')
@if (session('status'))
<div class="notification is-success">
    {{ session('status') }}
</div>
@endif
<div class="notification is-info">Привет отново!</div>
@endsection
