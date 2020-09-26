@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
            <div class="card mt4" style="margin-top: 30px;">
                <div class="card-header">НАЧАЛО</div>

                <div class="card-body">
                    <p>Добре дошъл, <strong>{{Auth::user()->name}}</strong></p>
                </div>

                <a href="{{route('contacts')}}">КОНТАКТИ ---- КЛИКНИ ТУК за връзка с админите!</a>
            </div>
        </div>
    </div>
</div>
@endsection
