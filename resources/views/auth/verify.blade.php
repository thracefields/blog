@extends('layouts.app')

@section('content')
<h2 class="title is-2 has-accent">Потвърждаване на имейл адрес</h2>
@if (session('resent'))
<div class="notification is-success">Току-що ви беше изпратено писмо с линк за потвърждение на профила ви. </div>
@endif
<p>Ако все още не сте получили писмо с линк за потвърждение, кликнете <a href="{{ route('verification.resend') }}">тук</a>.

@endsection
