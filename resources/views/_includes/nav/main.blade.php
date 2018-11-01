
<nav class="navbar has-shadow" role="navigation" aria-label="main navigation" >

         <div class="container" >

{{-- <div class="navbar-start">
       <a href="{{ route('home') }}">
               <img src="{{ asset('images/logo.png') }}" alt="amgrace logo" width="112" height="50" >
               </a>
</div> --}}

<div class="navbar-brand">
    <a class="navbar-item is-paddingless brand-item" href="{{ route('home') }}">
        <img src="{{ asset('images/logo.png') }}" alt="amgrace logo" width="112" height="50" >
    </a>

    @if (Request::segment(1) == "manage")

    <a class="navbar-item is-hidden-desktop"  id="admin-slideout-button">
        <span class="icon"><i class="fa fa-arrow-circle-right"></i></span>
    </a>
    @endif

    {{--<div class="navbar-burger burger" data-target="navbarTarget">--}}
        {{--<span></span>--}}
        {{--<span></span>--}}
        {{--<span></span>--}}
    {{--</div>--}}
    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
       data-target="navbarTarget">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
    </a>

    {{--<button class="button navbar-burger">--}}
        {{--<span></span>--}}
        {{--<span></span>--}}
        {{--<span></span>--}}
    {{--</button>--}}
</div>
             {{--<div class="navbar-menu">--}}
                 {{----}}
             {{--</div>--}}

                 {{--<div class="navbar-start">--}}
                     {{--<a href="" class="navbar-item is-tab  is-active">Learn</a>--}}
                     {{--<a href="" class="navbar-item is-tab ">Discuss</a>--}}
                     {{--<a href="" class="navbar-item is-tab ">Share</a>--}}
                 {{--</div>--}}

<div id="navbarTarget" class="navbar-menu">
    <div class="navbar-start">
        {{--<a href="" class="navbar-item is-tab is-hidden-mobile m-l-10">Learn</a>--}}
        {{--<a href="" class="navbar-item is-tab is-hidden-mobile">Discuss</a>--}}
        {{--<a href="" class="navbar-item is-tab is-hidden-mobile">Share</a>--}}
        <a href="" class="navbar-item is-tab  is-active">Learn</a>
        <a href="" class="navbar-item is-tab ">Discuss </a>
        <a href="" class="navbar-item is-tab ">Share</a>
    </div>

    <div class="navbar-end navbar-menu" style="overflow:visible">
        {{--<div class="navbar-item">--}}

                @guest
                    <a href="{{ route('login') }}" class="navbar-item ">Login</a>
                    <a href="{{ route('register') }}" class="navbar-item ">Join the Community</a>
                  {{--<a href="{{ route('login') }}" class="navbar-item is-tab">Login</a>--}}
                    {{--<a href="{{ route('register') }}" class="navbar-item is-tab">Join the Community</a>--}}
                @else
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">  Hey {{ Auth::user()->name }}</a>

                    <div class="navbar-dropdown is-right">
                       <a href="#" class="navbar-item">
                           <span class="icon"> <i class="fa fa-fw fa-user-circle  m-r-10  "></i>
                           </span>Profile
                       </a>
                        <a href="#" class="navbar-item">
                                    <span class="icon">
                                        <i class="fa fa-fw   m-r-10 fa-bell"></i>
                                    </span> Notifications
                        </a>
                                <a href="{{route('manage.dashboard')}}" class="navbar-item">
                                    <span class="icon">
                                        <i class="fa fa-fw   m-r-10 fa-cog"></i>
                                    </span> Manage
                                </a>
                        <hr class="navbar-divider">
                            <a href="{{route('logout')}}" class="navbar-item"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                          <span class="icon">
                            <i class="fa fa-fw fa-sign-out-alt m-r-5"></i>
                          </span>Logout
                            </a>
                                @include('_includes.forms.logout')
                            {{--<li><a href="#">  <span class="icon"> <i class="fa fa-fw   m-r-10 fa-sign-out-alt"></i> </span> Logout</a></li>--}}
                    </div>
                    </div>
                @endguest
        </div>

        </div>
        </div>
        </div>
        </nav>

