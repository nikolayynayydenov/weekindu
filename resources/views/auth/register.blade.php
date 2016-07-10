@extends('layouts.app')

@section('content')

<div class="center row">
    <div class="card-panel z-depth-4 col s12 offset-m1 m10 offset-l3 l6">
        
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
    
    <h4>Register</h4>
    <p>Join the community for free!</p>
    
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
                <input type="password" name="password" pattern=".{8,}" required>
                <label for="password">Password (at least 8 characters)</label>
            </div>
        </div>  
    
        <div class="row">
            <div class="input-field col s12 m12 l12">
                <i class="material-icons prefix">lock_outline</i>
                <input type="password" name="password_confirmation" pattern=".{8,}" required>
                <label for="password_confirmation">Re-enter password</label>
            </div>
        </div>
    
        
        
         <!-- Modal Trigger -->
        <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Avatar</a>

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
                  <a href="#" class=" modal-action modal-close waves-effect waves-green btn-flat">Okay</a>
            </div>
        </div>
    
        {{csrf_field()}}
        <div class="row center-align">
            <p>{!! app('captcha')->display(); !!}</p>
        </div>

        <br><br>
    
        <button class="btn-large waves-effect waves-light" type="submit" name="action">
            Sign me up!
            <i class="material-icons right">send</i>
        </button>       
    </form>
    
        <p class="margin center medium-small sign-up">Already have an account? <a href="{{url('login')}}">Login</a></p>     


    </div>
</div>




@endsection
