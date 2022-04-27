<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <!--<meta name="csrf-token" content="{{ csrf_token() }}">-->

    <!-- Site Title -->
    <title>{{ config('app.name', 'Spotify API') }}</title>

    <!-- Styles -->
    @section('styles')
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @show
</head>

<body>
    <header class="app-header">
        @include('parts.header')
    </header>

    <main class="app-main pt-4">
        @yield('content')
    </main>

    <footer class="app-footer">
        @include('parts.footer')
    </footer>

    @section('scripts')
        <script src="{{ asset('js/app.js') }}" defer></script>
    @show
</body>

</html>
