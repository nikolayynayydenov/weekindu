@extends('layouts.app')
@section('content')
    <style>
        .change-email {
            display: none;
            position: relative;
        }
        .change-password{
            display: none;  position: relative;


        }</style>
    <h1>View for edit user</h1>

    <form action="{{url('/register')}}" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="input-field col s12 l6">
                <i class="material-icons prefix">perm_identity</i>
                <input type="text" name="first_name" length="35" maxlength="35" value="{{$user->first_name}}" required>
                <label for="first_name" data-error="wrong" data-success="right">First name</label>
            </div>

            <div class="input-field col s12 l6">
                <i class="material-icons prefix">perm_identity</i>
                <input type="text" name="last_name" maxlength="35" length="35" value="{{$user->last_name}}" required>
                <label for="last_name">Last name</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12 m12 l12">
                <i class="material-icons prefix">person_pin</i>
                <input type="text" name="name" maxlength="20" value="{{$user->name}}" length="20">
                <label for="name">Nickname (optional)</label>
            </div>
        </div>
        <div class="row">
            <div class="col offset-l1 offset-m1 offset-s1 l3 m3 s3">
                <a class="waves-effect waves-light btn email-button">Change Email</a>
            </div>
            <div class="col offset-l1 offset-m1 offset-s1 l3 m3 s3">
                <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Avatar</a>

            </div>
            <div class="col offset-l1 offset-m1 offset-s1 l3 m3 s3">
                <a class="waves-effect waves-light btn password-button">Change password</a>
            </div>
        </div>

        <div class="row change-email">
            <div class="input-field col s4 m4 l4">
                <input type="password" name="password" pattern=".{8,}" placeholder="Enter your password"  required>
                <label for="password"></label>


                <input type="email" name="email" placeholder="Enter your new e-mail" required>
                <label for="email"></label>


                <input type="email" name="email" placeholder="Enter your new e-mail again" required>
                <label for="email"></label>
            </div>
        </div>

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

        <div class="row change-password">
            <div class="input-field col offset-s8 offset-m8 offset-l8 s4 m4 l4">

                <input type="password" name="password" pattern=".{8,}" placeholder="Enter your old password"  required>
                <input type="password" name="password" pattern=".{8,}" placeholder="Enter your new password"  required>
                <input type="password" name="password" pattern=".{8,}" placeholder="Enter your new password again"  required>

            </div>
        </div>









        <br><br>
<div class="row center">
        <button class="btn-large waves-effect waves-light" type="submit" name="action">
            Update
            <i class="material-icons right">send</i>
        </button>
</div>
    </form>
    <script>
        $('.email-button').click(function(){
            $('.change-email').toggle("slow");

        });
        $('.password-button').click(function(){
            $('.change-password').toggle("slow");
        });

    </script>
@endsection