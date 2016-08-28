@extends('layouts.app')
@section('content')
    <style>
        /* label color */
        .input-field label {
            color: #FF9800;
        }
        /* label focus color */
        .input-field input[type=text]:focus + label {
            color: #FF9800;
        }
        /* label underline focus color */
        .input-field input[type=text]:focus {
            border-bottom: 1px solid #FF9800;
            box-shadow: 0 1px 0 0 #FF9800;
        }
        /* valid color */
        .input-field input[type=text].valid {
            border-bottom: 1px solid #FF9800;
            box-shadow: 0 1px 0 0 #FF9800;
        }
        /* invalid color */
        .input-field input[type=text].invalid {
            border-bottom: 1px solid #FF9800;
            box-shadow: 0 1px 0 0 #FF9800;
        }
        /* icon prefix focus color */
        .input-field .prefix.active {
            color: #FF9800;
        }
        [type="checkbox"]:checked+label:before{
            border-right: 2px solid #FF9800;
            border-bottom: 2px solid #FF9800;
        }
        [type="checkbox"]:checked+label:after{
            border-right: 2px solid #FF9800;
            border-bottom: 2px solid #FF9800;
        }
        .input-field input[type=email]:focus:not([readonly]) {
            border-bottom: 1px solid #FF9800;
            box-shadow: 0 1px 0 0 #FF9800;
        }
        .input-field input[type=email]:focus + label {
            color: #FF9800;
        }
        .input-field input[type=password]:focus + label {
            color: #FF9800;
        }
        input[type=email]:focus:not([readonly]) + label{
            color: #FF9800;
        }
        .input-field input[type=password]:focus:not([readonly]) {
            border-bottom: 1px solid #FF9800;
            box-shadow: 0 1px 0 0 #FF9800;
        }
        body {
            background: url("/images/girlscar.jpg") no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
        .card-panel{
            background: rgba(255, 255,255,0.90);
        }
        .divider {
            height: 2px;
            background-color: #a3a3a3;
        }
        #facebook{
            background-color: #3b5998;
        }

        .container{
            width: 50%;
        }
    </style>
    {{--<link rel="stylesheet" href="/css/custom/slider.css">--}}
    <div class="center row z-depth-4 container">

        @if (count($errors->all()) > 0)
            @foreach ($errors->all() as $error)
                <div id="card-alert" class="card red">
                    <div class="card-content white-text">
                        <p><i class="mdi-alert-error"></i> ERROR : {{$error}}</p>
                    </div>
                </div>
            @endforeach
        @endif
        <div class="card-panel">
            <h4>Log in</h4>
            <form class="login-form" role="form" method="POST" action="{{ url('/login') }}">
                {!! csrf_field() !!}

                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <i class="material-icons prefix">email</i>
                        <input type="email" name="email" required>
                        <label for="email">E-mail</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <i class="material-icons prefix">lock_outline</i>
                        <input type="password" name="password" required>
                        <label for="password">Password</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12 m12 l12  login-text left-align">
                        <input type="checkbox" id="remember" name="remember">
                        <label class="grey-text" for="remember">Remember me</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 center">
                        <button class="btn-large waves-effect waves-light light-green" type="submit" name="action">
                            Sign in
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="center">
                        <a class="orange-text" href="{{ url('/register') }}">Register Now!</a>
                    </div>
                </div>
            </form>
            <div class="orange-text">Or</div>
            <form action="{{ url('auth/facebook') }}" method="get">
                <div class="social-wrap">
                    <button class="btn-large facebook" id="facebook" type="submit" formaction="{{ url('auth/facebook') }}">Log in with<img class="material-icons right" src="/images/icons/facebook-big.png"/></button>
                </div>
            </form>
        </div>
    </div>
@endsection
