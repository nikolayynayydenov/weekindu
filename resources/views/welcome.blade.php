<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
        <title>Welcome to weekindu</title>
        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
        {{--<link href="css/meterialize/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>--}}
        <link rel="stylesheet" href="/css/custom/welcome.css">
        <link rel="stylesheet" href="/css/materialize/palette.css">
    </head>
    <body>
        <nav class="dark-primary-color" role="navigation">
            <div class="nav-wrapper container">
                <a id="logo-container" href="{{url('/')}}" class="brand-logo white-text">Weekindu</a>
                <ul class="right hide-on-med-and-down">
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}" class="white-text">Login</a></li>
                        <li><a href="{{ url('/register') }}" class="white-text">Register</a></li>
                    @endif
                </ul>
                <a data-activates="nav-mobile"
                   class="button-collapse white-text pointer">
                    <i class="material-icons">menu</i>
                </a>
            </div>

            <ul id="nav-mobile" class="side-nav">
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @endif
            </ul>
        </nav>
        <div class="fullscreen-bg">
            <video loop muted autoplay  class="fullscreen-bg__video">
                <source src="/images/video5/fair.mp4" type="video/webm">
                <source src="/images/video5/fair.mp4" type="video/mp4">
            </video>
        </div>

        <div class="section no-pad-bot" id="index-banner">
            <div class="container">
                <br><br>
                <h1 class="header center light-green-text">Manage your events easily</h1>
                {{--<div class="row center">
                    <h5 class="header col s12 light white-text">Try for free the most advanced event manager around the web</h5>
                </div>--}}<br>
                <div class="row center">
                    <a href="{{ url('/login') }}" id="download-button" class="btn-large waves-effect waves-light orange">Get Started</a>
                </div>
                <br><br>
            </div>
        </div>
        <div class="container">
            <div class="section">
                <!--   Icon Section   -->
                <div class="row">
                    <div class="col s12 m4">
                        <div class="icon-block">
                            <h2 class="center light-green-text"><i class="material-icons">group</i></h2>
                            <h5 class="center white-text">Keep track of your guests</h5>
                            <p class="light white-text">With our platform, the non-attending guests are no longer an issue.Keep track of them in a very easy intuitive way</p>
                        </div>
                    </div>
                    <div class="col s12 m4">
                        <div class="icon-block">
                            <h2 class="center light-green-text"><i class="material-icons">shopping_basket</i></h2>
                            <h5 class="center white-text">Organise meals easily</h5>
                            <p class="light white-text">Wonder no more about what to order when you make a banquet.Using your platform, you are going to be able to ask and order the drinks and meals so everything would be set</p>
                        </div>
                    </div>
                    <div class="col s12 m4">
                        <div class="icon-block">
                            <h2 class="center light-green-text"><i class="material-icons">settings</i></h2>
                            <h5 class="center white-text">Many more</h5>
                            <p class="light center white-text">Register now, and explore Weekindu for free</p>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
        </div>
        <div class="section section-1">
            <h4 class="center light-green-text">Make an event!</h4>
            <div class="container">
                <div class="row">
                    <div class="col s12 l4 center">
                        <img class="responsive-img" border="5" src="/images/tutorial/slider.png">
                    </div>
                    <div class="col s12 l8">
                        <div class="flow-text black-text">
                            Create events fast and easy.
                            Choose from a variety of parameters like food, drinks and music.
                            You can even make your own parameters
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section section-2">
            <h4 class="center white-text">Send Invitations</h4>
            <div class="container">
                <div class="row">
                    <div class="col s12 l6">
                        <div class="flow-text white-text">
                            Send an invitation which is going to contain the information you filled
                            when you created the event. The users will  be able to tell you
                            what are they going to eat, drink etc.
                        </div>
                    </div>
                    <div class="col s12 l6 center">
                        <img class="responsive-img" border="5" src="/images/tutorial/invitation.png">
                    </div>
                </div>
            </div>
        </div>
        <div class="section section-1">
            <h4 class="center light-green-text">Manage Guests</h4>
            <div class="container">
                <div class="row">
                    <div class="col s12 l6 center">
                        <img class="responsive-img" border="5" src="/images/tutorial/attendance.png">
                    </div>
                    <div class="col s12 l6 ">
                        <div class="flow-text black-text">
                            See who is going to come and who won`t!
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section section-2">
            <h4 class="center white-text">Manage Parameters</h4>
            <div class="container">
                <div class="row">
                    <div class="col s12 l6">
                        <div class="flow-text white-text">
                            Know your guests taste!
                        </div>
                    </div>
                    <div class="col s12 l6 center">
                        <img class="responsive-img" border="5" src="/images/tutorial/foods.png">
                    </div>
                </div>
            </div>
        </div>
        <footer class="page-footer">
            <div class="container">
                 <div class="row">
                     <div class="col l6 s12">
                         <h5 class="white-text">Summary</h5>
                         <p class="white-text">
                             We are a team of SoftUni students.
                         </p>
                     </div>
                     <div class="col l3 s12">
                          <h5 class="white-text">Menu</h5>
                          <ul>
                              <li><a class="grey-text" href="{{ url('/event') }}">View Events</a></li>
                              <li><a class="grey-text" href="{{ url('/about-us') }}">About Us</a></li>
                          </ul>
                     </div>
                     <div class="col l3 s12">
                          <h5 class="white-text">User</h5>
                          <ul>
                              <li><a class="grey-text" href="{{ url('/login') }}">Login</a></li>
                              <li><a class="grey-text" href="{{ url('/register') }}">Register</a></li>
                          </ul>
                     </div>
                 </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                     Made by <a class="brown-text text-lighten-3" href="{{url('/about-us')}}">Trinity Targovishte</a>
                </div>
            </div>
        </footer>
    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
    <script src="/js/custom/jquery/welcome.js"></script>
    </body>
</html>