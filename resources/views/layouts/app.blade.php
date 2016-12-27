<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Project Flyer</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}" >
    @yield('links')
    
</head>

<body>
    @include('layouts.partials.nav')

    <div class="container">
        @yield('content')
    </div>

    <script src="{{asset('js/app.js')}}"></script>
    @include('layouts.partials.flash')

    @yield('scripts.footer')
</body>

</html>