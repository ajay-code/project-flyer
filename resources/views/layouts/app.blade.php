<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{url('/css/app.css')}}" rel="stylesheet">
    @yield('links')

    <!-- Scripts -->
    <script>
        window.Laravel = { 'csrfToken': '{{csrf_token()}}' }
    </script>
</head>
<body>
    <div id="app">
        @include('layouts/partials/nav')

        <div class="container">
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{url('/js/app.js')}}"></script>
    @yield('scripts.footer')

    @include('layouts/partials/flash')

</body>
</html>
