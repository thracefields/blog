@extends('layouts.manage')

@section('content')
@card
@slot('title', 'Начало')

<p class="notification is-info">Привет, <strong>{{ Auth::user()->name }}</strong>!</p>
@endcard
@endsection
