@extends('layouts.app')

@section('content')
<br><br>
<form action="{{url('/register')}}" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="input-field col s6">
            <i class="material-icons prefix">perm_identity</i>
            <input type="text" name="first_name" length="35" maxlength="35">
            <label for="first_name">First name</label>
        </div>
        
        <div class="input-field col s6">
            <i class="material-icons prefix">perm_identity</i>
            <input type="text" name="last_name" required maxlength="35" length="35">
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
            <input type="password" name="password" required minlenght="8">
            <label for="password">Password (at least 8 characters)</label>
        </div>
    </div>  
    
    <div class="row">
        <div class="input-field">
            <i class="material-icons prefix">lock_outline</i>
            <input type="password" name="password_confirmation" required minlenght="8">
            <label for="password_confirmation">Re-enter password</label>
        </div>
    </div>
    
    <div class="file-field input-field">
        <div class="btn">
            <span>Avatar</span>
            <input type="file" name="avatar" accept="image/*">
        </div>
        <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
        </div>
    </div>
    
    {{csrf_field()}}
    
    <button class="btn waves-effect waves-light" type="submit" name="action">
        Sign me up!
        <i class="material-icons right">send</i>
    </button>
       
</form>
@if (count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

@endsection
