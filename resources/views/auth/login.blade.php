@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="/css/custom/facebookbutton.css">
    <div class="center row">
        <div class="z-depth-4 card-panel col s12 offset-m1 m10 offset-l3 l6">
            <h4>Login</h4>
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
                        <label for="remember">Remember me</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 center">
                        <button class="btn-large waves-effect waves-light" type="submit" name="action">
                            Sign in
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6 l6 right-align">
                        <a href="{{ url('/register') }}">Register Now!</a>
                    </div>
                    <div class="input-field col s12 m6 l6 left-align">
                        <a href="{{ url('/password/reset') }}">Forgot password ?</a>
                    </div>
                </div>
            </form>
            <form action="{{ url('auth/facebook') }}" method="get">
                <div class="social-wrap a">
                    <button id="facebook" type="submit" formaction="{{ url('auth/facebook') }}">Facebook!</button>
                </div>
            </form>
        </div>
    </div>
@endsection
