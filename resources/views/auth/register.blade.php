@extends('layouts.app')

@section('content')

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

<br><br>
<form action="{{url('/register')}}" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="input-field col s6">
            <i class="material-icons prefix">perm_identity</i>
            <input type="text" name="first_name" length="35" maxlength="35" required>
            <label for="first_name" data-error="wrong" data-success="right">First name</label>
        </div>
        
        <div class="input-field col s6">
            <i class="material-icons prefix">perm_identity</i>
            <input type="text" name="last_name" maxlength="35" length="35" required>
            <label for="last_name">Last name</label>
        </div>
    </div>
    
    <div class="row">
        <div class="input-field">
            <i class="material-icons prefix">person_pin</i>
            <input type="text" name="name" maxlength="20" length="20">
            <label for="name">Nickname (optional)</label>
        </div>
    </div>
    
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
            <input type="password" name="password" pattern=".{8,}" required>
            <label for="password">Password (at least 8 characters)</label>
        </div>
    </div>  
    
    <div class="row">
        <div class="input-field">
            <i class="material-icons prefix">lock_outline</i>
            <input type="password" name="password_confirmation" pattern=".{8,}" required>
            <label for="password_confirmation">Re-enter password</label>
        </div>
    </div>
    
    <div class="file-field input-field">
        <input type="file" name="avatar" accept="image/*" class="dropify" data-max-file-size="1M" data-max-width="100%">        
    </div>
    
    {{csrf_field()}}
    <br><br>
    
    <button class="btn waves-effect waves-light" type="submit" name="action">
        Sign me up!
        <i class="material-icons right">send</i>
    </button>
       
</form>

@endsection
