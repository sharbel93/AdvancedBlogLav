<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AmGraceSolutions - MANAGEMENT</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">--}}

    {{-- <link rel="stylesheet" href="//cdn.materialdesignicons.com/2.0.46/css/materialdesignicons.min.css">
    <!-- Buefy CSS -->
<link rel="stylesheet" href="https://unpkg.com/buefy/lib/buefy.min.css"> --}}

{{-- <!-- Buefy CSS -->
<link rel="stylesheet" href="https://unpkg.com/buefy/lib/buefy.min.css">

<!-- Buefy JavaScript -->
<script src="https://unpkg.com/buefy"></script> --}}
    @yield('styles')
</head>
<body>

       @include('_includes.nav.main')
        @include('_includes.nav.manage')
       <div class="management-area" id="app">
        @yield('content')
       </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>
       @include('_includes.notifications.toast')
     @yield('scripts')

</body>
</html>
