
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


    <div class="navbar-end navbar-menu" style="overflow:visible">
        <div class="navbar-item">
            <div class="field is-grouped">
                @if (Auth::guest())
                    <a href="{{ route('login') }}" class="navbar-item is-tab">Login</a>
                    <a href="{{ route('register') }}" class="navbar-item is-tab">Join the Community</a>
                @else

                    <button class="dropdown navbar-item is-aligned-right is-tab is-hoverable " style="border:none;
                    background-color:white;">
                        Hey {{ Auth::user()->name }}
                        <span class="icon">
                            <i class="fas fa-caret-down"></i>
                        </span>
                        <ul class="dropdown-menu has-dropdown " style="overflow: visible;">
                            <li><a href="#">
                                    <span class="icon"> <i class="fa fa-fw fa-user-circle  m-r-10  "></i> </span>  Profile</a></li>
                            <li>
                                <a href="#">
                                    <span class="icon">
                                        <i class="fa fa-fw   m-r-10 fa-bell"></i>
                                    </span> Notifications
                                </a>
                            </li>
                            <li>
                                <a href="{{route('manage.dashboard')}}">
                                    <span class="icon">
                                        <i class="fa fa-fw   m-r-10 fa-cog"></i>
                                    </span> Manage
                                </a>
                            </li>
                            <li class="separator"></li>
                            <li class="seperator"></li>
                            <li><a href="{{route('logout')}}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                  <span class="icon">
                    <i class="fa fa-fw fa-sign-out-alt m-r-5"></i>
                  </span>
                                    Logout
                                </a>
                                {{--@include('_includes.forms.logout')--}}
                            </li>
                            {{--<li><a href="#">  <span class="icon"> <i class="fa fa-fw   m-r-10 fa-sign-out-alt"></i> </span> Logout</a></li>--}}
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