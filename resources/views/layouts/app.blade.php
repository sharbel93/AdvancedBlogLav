<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AmGraceSolutions') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    {{-- <link rel="stylesheet" href="//cdn.materialdesignicons.com/2.0.46/css/materialdesignicons.min.css">
    <!-- Buefy CSS -->
<link rel="stylesheet" href="https://unpkg.com/buefy/lib/buefy.min.css"> --}}
</head>
<body>
    <div id="app">

     <nav class="navbar has-shadow" role="navigation" aria-label="main navigation" >

         <div class="container" >

             {{-- <div class="navbar-start">
                    <a href="{{ route('home') }}">
                            <img src="{{ asset('images/logo.png') }}" alt="amgrace logo" width="112" height="50" >
                            </a>
             </div> --}}

             <div class="navbar-brand">

                    <a class="navbar-item" href="{{ route('home') }}">
                            <img src="{{ asset('images/logo.png') }}" alt="amgrace logo" width="112" height="50" >
                            </a>
                            <div class="navbar-burger burger" data-target="navbarTarget">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                  </div>
             </div>
             <div id="navbarTarget" class="navbar-menu">
                    <div class="navbar-start">
                            <a href="" class="navbar-item is-tab is-hidden-mobile m-l-10">Learn</a>
                            <a href="" class="navbar-item is-tab is-hidden-mobile">Discuss</a>
                            <a href="" class="navbar-item is-tab is-hidden-mobile">Share</a>
                    </div>


                 <div class="navbar-end" style="overflow:visible">
                    <div class="navbar-item">
                            <div class="field is-grouped">
                                    @if (!Auth::guest())
                                    <a href="#" class="navbar-item is-tab">Login</a>
                                    <a href="#" class="navbar-item is-tab">Join the Community</a>
                                    @else

                                       <button class="dropdown navbar-item is-aligned-right  is-tab" style="border:none; background-color:white;">Hey Sharbel <span class="icon"> <i class="fas fa-caret-down"></i> </span>
                                      <ul class="dropdown-menu">
                                              <li><a href="#">
                                                  <span class="icon"> <i class="fa fa-fw fa-user-circle  m-r-10  "></i> </span>  Profile</a></li>
                                              <li><a href="#">  <span class="icon"> <i class="fa fa-fw   m-r-10 fa-bell"></i> </span> Notifications</a></li>
                                              <li><a href="#">  <span class="icon"> <i class="fa fa-fw   m-r-10 fa-cog"></i> </span> Settings</a></li>
                                              <li class="separator"></li>
                                              <li><a href="#">  <span class="icon"> <i class="fa fa-fw   m-r-10 fa-sign-out-alt"></i> </span> Logout</a></li>
                                      </ul>
                                      </button>
                                    @endif
                            </div>
                    </div>
                 </div>
             </div>
             </div>
            </div>
     </nav>

        @yield('content')


    </div>
    {{-- <!-- Buefy JavaScript -->
<script src="https://unpkg.com/buefy"></script> --}}
</body>
</html>
