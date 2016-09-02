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
        .container{
            width: 50%;
        }
        #facebook{
            background-color: #3b5998;
        }
        </style>
<div class="center row container">
    <div class="card-panel">
        
    @if (count($errors->all()) > 0)
    <br><br>
        @foreach ($errors->all() as $error)
            <div id="card-alert" class="card red">
                <div class="card-content white-text">
                    <p><i class="mdi-alert-error"></i> ERROR : {{$error}}</p>
                </div>
            </div>
        @endforeach
    @endif
    
    <h4 class="light-green-text">Register</h4>
    <p class="black-text">Join the most advanced event manager for free!</p>
    
    <form action="{{url('/register')}}" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="input-field col s12 l6">
                <i class="material-icons prefix">perm_identity</i>
                <input type="text" name="first_name" length="35" maxlength="35" required>
                <label for="first_name" data-error="wrong" data-success="right">First name</label>
            </div>

            <div class="input-field col s12 l6">
                <i class="material-icons prefix">perm_identity</i>
                <input type="text" name="last_name" maxlength="35" length="35" required>
                <label for="last_name">Last name</label>
            </div>
        </div>
    
        <div class="row">
            <div class="input-field col s12 m12 l12">
                <i class="material-icons prefix">person_pin</i>
                <input type="text" name="name" maxlength="20" length="20">
                <label for="name">Nickname (optional)</label>
            </div>
        </div>
    
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
                <input type="password" name="password" pattern=".{5,}" required>
                <label for="password">Password (at least 5 characters)</label>
            </div>
        </div>  
    
        <div class="row">
            <div class="input-field col s12 m12 l12">
                <i class="material-icons prefix">lock_outline</i>
                <input type="password" name="password_confirmation" pattern=".{5,}" required>
                <label for="password_confirmation">Re-enter password</label>
            </div>
        </div>
        
         <!-- Modal Trigger -->
        <a class="waves-effect waves-light btn modal-trigger light-green" href="#modal1">Avatar</a>

        <!-- Modal Structure -->
        <div id="modal1" class="modal">
            <div class="modal-content">
                <h4>Choose Avatar</h4>
                <p>
                    <div class="file-field input-field">
                        <input type="file" name="avatar" accept="image/*" class="dropify" data-max-file-size="1M" data-max-width="100%">        
                    </div>
                </p>
            </div>
            <div class="modal-footer">
                  <a href="#" class=" modal-action modal-close waves-effect waves-light-green btn-flat">Okay</a>
            </div>
        </div>
    
        {{csrf_field()}}
        <div class="row center-align">
            <p>{!! app('captcha')->display(); !!}</p>
        </div>

        <br><br>
    
        <button class="btn-large waves-effect waves-light light-green" type="submit" name="action">
            Sign me up!
            <i class="material-icons right">send</i>
        </button>       
    </form>

    
        <p class="margin center medium-small sign-up">Already have an account? <a href="{{url('login')}}">Login</a></p>
        <div class="blue-text">Or</div>
        <form action="{{ url('auth/facebook') }}" method="get">
            <div class="social-wrap">
                <button class="btn-large facebook" id="facebook" type="submit" formaction="{{ url('auth/facebook') }}">Log in with<img class="material-icons right" src="/images/icons/facebook-big.png"/></button>
            </div>
        </form>
    </div>

    </div>
</div>




@endsection
