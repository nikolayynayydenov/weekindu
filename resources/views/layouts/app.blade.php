<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Weekindu</title>
        <meta charset="utf-8"/>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
        <link rel="stylesheet" href="/css/dropify/dropify.min.css"/>
        <link rel="stylesheet" href="/css/materialize/palette.css"/>
        <link rel="stylesheet" href="/css/custom/main.css"/>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.12.0-rc.2/jquery-ui.js"></script>
    </head>
    <body id="app-layout">
        <nav class="dark-primary-color">
            <div class="nav-wrapper container">
                <div class="row">
                    <div class="col s12 m6 l2 center">
                        <a href="#" data-activates="mobile-demo" class="button-collapse grey-text"><i class="material-icons grey-text">menu</i></a>
                        <a href="{{url('/')}}" class="waves-effect white-text"><b>Weekindu</b></a>
                    </div>
                    <div class="col l6 hide-on-med-and-down">
                        <ul>
                            <li>
                                <a href="{{ url('/event') }}"
                                   class="waves-effect tooltipped white-text"
                                   data-position="bottom"
                                   data-delay="50"
                                   data-tooltip="View All events">All Events</a>
                            </li>
                            @if(!Auth::guest())
                                <li>
                                    <a href="{{ url('/user/my-events') }}"
                                       class="waves-effect tooltipped white-text"
                                       data-position="bottom"
                                       data-delay="50"
                                       data-tooltip="View My Events">My Events</a>
                                </li>
                            @endif
                            <li><a class="white-text" href="{{url('/about-us')}}">About us</a></li>
                        </ul>
                    </div>
                    <div class="col l4 m6 right-align hide-on-small-only">
                        <ul class="right">
                            @if (Auth::guest())
                                <li><a href="{{ url('/login') }}" class="white-text">Login</a></li>
                                <li><a href="{{ url('/register') }}" class="white-text">Register</a></li>
                            @else
                            <li class="waves-effect hide-on-med-and-down">
                                <div class="container-fluid valign-wrapper">
                                    <a class="tooltipped orange-text" data-tooltip="Create New Event" href="{{url('/event/create')}}">Create Event</a>
                                </div>
                            </li>
                            <li class="dropdown-button waves-effect light-green-text" data-activates="user-menu">
                                <div class="container-fluid valign-wrapper">
                                    <div class="col l6">
                                        <img src="/images/user-avatars/{{Auth::user()->avatar}}" class="circle responsive-img valign" width="40">
                                    </div>
                                    <div class="white-text">
                                        {{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->first_name }}
                                    </div>
                                    <ul id="user-menu" class="dropdown-content col l4 m8">
                                        <li><a href="{{ url('/user/'.auth()->user()->id)}}">Profile</a></li>
                                        <li><a href="{{ url('/user/'.auth()->user()->id.'/edit') }}">Edit Profile</a></li>
                                        <li><a href="{{ url('/logout') }}">Logout</a></li>
                                    </ul>
                                </div>
                            </li>
                        @endif
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="{{url('/home')}}">Home</a></li>
                <li><a href="{{url('/event')}}">Events</a></li>
                <li><a href="{{url('/event/create')}}">Create a new Event</a></li>
                @if (!Auth::guest())
                    <div class="hide-on-med-and-up">
                        {{--<li class="divider divider-color"></li>--}}
                        <li>
                            <div class="row valign-wrapper">
                                <div class="col s4 valign">
                                    <img src="/images/user-avatars/{{Auth::user()->avatar}}" class="circle responsive-img valign" width="40">
                                </div>
                                <div class="col s8 valign">
                                    {{ Auth::user()->name }}
                                </div>
                            </div>
                        </li>
                        <li><a href="{{url('/logout')}}">Logout</a></li>
                    </div>
                @endif
            </ul>
        </nav>
        <main>
            @yield('content')
        </main>
        <footer class="page-footer"><!-- Should be default-primary-color but it\s not working-->
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">Weekindu App</h5>
                        <p class="grey-text">Organise your event easily</p>
                    </div>
                    <div class="col l4 offset-l2 s12">
                        <h5 class="white-text">Navigation</h5>
                        <ul>
                            @if (Auth::guest())
                                <li><a class="grey-text" href="{{url('/login')}}">Login</a></li>
                                <li><a class="grey-text" href="{{url('/register')}}">Register</a></li>
                                <li><a class="grey-text" href="{{url('/about-us')}}">About us</a></li>
                            @else
                                <li><a class="grey-text" href="{{url('/event/create')}}">Create Event</a></li>
                                <li><a class="grey-text" href="{{ url('/user/'.auth()->user()->id)}}">Profile</a></li>
                                <li><a class="grey-text" href="{{ url('/user/'.auth()->user()->id.'/edit') }}">Edit Profile</a></li>
                                <li><a class="grey-text" href="{{url('/about-us')}}">About us</a></li>
                            @endif
                            <li><a class="grey-text" href="{{url('/event')}}">View All Events</a></li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    © 2016 Weekindu, All rights reserved
                    <a class="grey-text text-lighten-4 right" href="#!"><!-- More links --></a>
                </div>
            </div>
        </footer>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
    <script src="/js/custom/jquery/main.js" defer></script>
    <script src="/js/custom/jquery/slider.js"></script>
    <script src="/js/dropify/dropify.min.js"></script>
    <script src="/js/config/main.js"></script>
    <script src="/js/custom/jquery/ajax/request-guest-info.js"></script>
    </body>
</html>