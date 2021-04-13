<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    @include('layouts._includes.css')
    @yield('css')

    <!-- Scripts -->
    @include('layouts._includes.js-head')
    @yield('js-head')
</head>

<body>
    <div id="app">
        <!-- Nav -->
        @include('layouts._includes.nav.nav')

        <main class="l-main">
        <div class="columns is-multiline">
            <div class="column is-3-desktop is-full-tablet">
                <!-- Menu -->
                @include('layouts._includes.nav.menu')
            </div>
            <div class="column">
                @include('layouts._includes.notifications')
                @yield('content')
            </div>
        </div>
        </main>
        <!-- Footer -->
        @include('layouts._includes.footer')
    </div>
    <!-- Scripts -->
    @include('layouts._includes.js-body')
    @yield('js-body')
</body>

</html>
