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

    </head>
    <body>

        <nav class="indigo" role="navigation">
            <div class="nav-wrapper container">
                <a id="logo-container" href="{{url('/')}}" class="brand-logo white-text">Weekindu</a>
                <ul class="right hide-on-med-and-down">
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}" class="white-text">Login</a></li>
                        <li><a href="{{ url('/register') }}" class="white-text">Register</a></li>
                    @endif
                </ul>

                <ul id="nav-mobile" class="side-nav">
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @endif
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse white-text"><i class="material-icons">menu</i></a>
            </div>
        </nav>


        <div class="fullscreen-bg">
            <video loop muted autoplay poster="/images/video2/Snapshots/Drink-Wine.jpg" class="fullscreen-bg__video">
                <source src="/images/video2/WEBM/Drink-Wine.webm" type="video/webm">
                <source src="/images/video2/MP4/Drink-Wine.mp4" type="video/mp4">

            </video>
        </div>
        {{--<div class="homepage-hero-module">
            <div class="video-container">
                <div class="filter"></div>
                <video autoplay loop class="fillWidth">
                    <source src="/images/video/MP4/Round-Table.mp4" type="video/mp4" />Your browser does not support the video tag. I suggest you upgrade your browser.
                    <source src="/images/video/WEBM/Round-Table.webm" type="video/webm" />Your browser does not support the video tag. I suggest you upgrade your browser.
                </video>
                <div class="poster hidden">
                    <img src="/images/video/Snapshots/Round-Table.jpg" alt="">
                </div>
            </div>
        </div>--}}
        <div class="section no-pad-bot" id="index-banner">
            <div class="container">
                <br><br>
                <h1 class="header center orange-text">Manage your events easily</h1>
                <div class="row center">
                    <h5 class="header col s12 light white-text">Try for free the most advanced event manager around the web</h5>
                </div>
                <div class="row center">
                    <a href="{{ url('/event') }}" id="download-button" class="btn-large waves-effect waves-light orange">Get Started</a>
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
                            <h2 class="center indigo-text"><i class="material-icons">group</i></h2>
                            <h5 class="center white-text">Keep track of your guests</h5>

                            <p class="light white-text">With our platform, the non-attending guests are no longer an issue.Keep track of them in a very easy intuitive way</p>
                        </div>
                    </div>

                    <div class="col s12 m4">
                        <div class="icon-block">
                            <h2 class="center indigo-text"><i class="material-icons">shopping_basket</i></h2>
                            <h5 class="center white-text">Organise meals easily</h5>

                            <p class="light white-text">Wonder no more about what to order when you make a banquet.Using your platform, you are going to be able to ask and order the drinks and meals so everything would be set</p>
                        </div>
                    </div>

                    <div class="col s12 m4">
                        <div class="icon-block">
                            <h2 class="center indigo-text"><i class="material-icons">settings</i></h2>
                            <h5 class="center white-text">Many more</h5>

                            <p class="light center white-text">Register now, and explore weekindu for free</p>
                        </div>
                    </div>
                </div>

            </div>
            <br><br>


        </div>


        <footer class="page-footer indigo">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Materialize</a>
      </div>
    </div>
  </footer>
 <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>

        <script src="/js/custom/jquery/welcome.js"></script>


  </body>
</html>
