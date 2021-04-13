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

</head>

<body>
    <div id="app">
        <!-- Nav -->
        @include('layouts._includes.nav.nav')

        <!-- Main -->
        <main class="l-main">
            @include('layouts._includes.notifications')
            @yield('content')
        </main>

        <!-- Footer -->
        @include('layouts._includes.footer')
    </div>
    </div>
    <!-- Scripts -->
    @include('layouts._includes.js-body')
    @yield('js-body')
</body>

</html>