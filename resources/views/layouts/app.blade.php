<!DOCTYPE html>
<html lang="en">
<head>
    <title>Weekindu</title>
    <meta charset="utf-8"/>    
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
    <link rel="stylesheet" href="/css/dropify/dropify.min.css"/>
    <link rel="stylesheet" href="/css/meterialize/palette.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body id="app-layout">
    <nav class="default-primary-color">
        <div class="nav-wrapper container">
            <div class="row">

                <div class="col s12 m6 l2 center">
                    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>                                
                    <a href="{{url('/')}}" class="waves-effect"><b>Weekindu</b></a>
                </div>
                <div class="col l6 hide-on-med-and-down">
                    <ul>
                        <li><a href="{{ url('/event') }}" class="waves-effect">Events</a></li>
                    </ul>
                </div>
                <div class="col l4 m6 right-align hide-on-small-only">
                    <ul class="right">                    
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown-button waves-effect" data-activates="user-menu">
                                <div class="container-fluid valign-wrapper">
                                    <div class="col l6">
                                        <img src="/images/user-avatars/{{Auth::user()->avatar}}" class="circle responsive-img valign" width="40">
                                    </div>
                                    <div>
                                        {{ Auth::user()->name }}
                                    </div>
                                    
                                    <ul id="user-menu" class="dropdown-content col l4 m8">
                                        <li><a href="{{url('/logout')}}">Logout</a></li>
                                    </ul>
                                </div> 
                            </li>
                        @endif
                    </ul>
                </div>

                
            </div>
        </div>
        
        <ul class="side-nav primary-text-color" id="mobile-demo">
            <li><a href="{{url('/home')}}">Home</a></li>
            <li><a href="{{url('/event')}}">Events</a></li>
            @if (!Auth::guest())
                <div class="hide-on-med-and-up">
                    <li class="divider"></li>
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
    
    <div class="container">
        <br>
        @yield('content')
    </div>


    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>    
    <script src="/js/jquery/main.js"></script>
    <script src="/js/dropify/dropify.min.js"></script>
</body>
</html>
