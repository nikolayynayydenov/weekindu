@extends('layouts.app')

@section('content')
<br><br>
<div class="row" style="display: table; margin: auto;">
    <div class="z-depth-4 card-panel center">
        <form class="login-form" role="form" method="POST" action="{{ url('/login') }}">
            {!! csrf_field() !!}
            <h4>Login</h4>
            <div class="row">
                <div class="input-field">
                    <i class="material-icons prefix">email</i>
                    <input type="email" name="email" required>
                    <label for="email">E-mail</label>
                </div>
            </div>
            
            <div class="row">
                <div class="input-field">
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
                <div class="input-field col s6 m6 l6">
                    <p class="margin medium-small"><a href="{{ url('/register') }}">Register Now!</a></p>
                </div>
                <div class="input-field col s6 m6 l6">
                      <p class="margin right-align"><a href="{{ url('/password/reset') }}">Forgot password ?</a></p>
                </div>          
            </div>
        </form>
    </div>
</div>
@endsection
