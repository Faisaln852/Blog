<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>


    <link href="{{ asset('dependencies/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('dependencies/css/user_custom.css')}}" rel="stylesheet">


    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div id="app">

        @include('layouts.inc.frontendnavbar')

        <main class="py-4">
            @yield('content')
        </main>
        @include('layouts.inc.frontendfooter')
    </div>
    <!-- Scripts -->
    <script src="{{ asset('dependencies/js/jquery.min.js') }}"></script>
    <script src="{{ asset('dependencies/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('dependencies/js/popper.min.js') }}" defer></script>
    @yield('scripts')
</body>

</html>