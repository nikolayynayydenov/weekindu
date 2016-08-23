@extends('layouts.app')
@section('content')
    <style>
        .change-email-desktop {
            display: none;
            position: inherit;
        }

        .change-password-desktop {
            display: none;
            position: inherit;
        }
        .content {
            display: none;
            position: inherit;
        }

        .input-field .prefix.active{
            color: #a3a3a3;
        }
        /* label color */
        .input-field label {
            color: #a3a3a3;
        }
        /* label focus color */
        .input-field input[type=text]:focus + label {
            color: #2196f3;
        }
        /* label underline focus color */
        .input-field input[type=text]:focus {
            border-bottom: 1px solid #a3a3a3;
            box-shadow: 0 1px 0 0 #a3a3a3;
        }
        /* valid color */
        .input-field input[type=text].valid {
            border-bottom: 1px solid #a3a3a3;
            box-shadow: 0 1px 0 0 #a3a3a3;
        }
        /* invalid color */
        .input-field input[type=text].invalid {
            border-bottom: 1px solid #a3a3a3;
            box-shadow: 0 1px 0 0 #a3a3a3;
        }
        /* icon prefix focus color */
        .input-field .prefix.active {
            color: #a3a3a3;
        }
        .btn:hover, .btn-large:hover{
            background-color:#a3a3a3;
        }
        .btn, .btn-large{
            background-color:#a3a3a3;
        }
        .divider{
            height: 3px;
        }
 </style>
    <div class="container">
    <div class="row center">
    <h1>Edit Profile</h1>
    </div>
    <form action="{{ url('/user/'.$user->id) }}" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="input-field col s12 l6">
                <i class="material-icons prefix">perm_identity</i>
                <input type="text" name="first_name" length="35" maxlength="35" value="{{$user->first_name}}" >
                <label for="first_name" data-error="wrong" data-success="right">First name</label>
            </div>

            <div class="input-field col s12 l6">
                <i class="material-icons prefix">perm_identity</i>
                <input type="text" name="last_name" maxlength="35" length="35" value="{{$user->last_name}}" >
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
        <div class="row center hide-on-med-and-down">
            <div class="col s12 m4">
                <a class="waves-effect waves-light btn email-button-desktop accent-color ">Change Email</a>
            </div>
            <div class="col s12 m4">
                <a class="waves-effect waves-light btn password-button-desktop accent-color">Change password</a>
            </div>
            <div class="col s12 m4">
                <a class="waves-effect waves-light btn modal-trigger accent-color " href="#modal1">Change Avatar</a>
            </div>
        </div>
                <a class="waves-effect waves-light btn modal-trigger accent-color show-on-medium-and-down s12 hide-on-med-and-up " href="#modal1">Change Avatar</a>
                <br>
                <a id="but1" class="waves-effect waves-light btn  accent-color show-on-medium-and-down s12 hide-on-med-and-up mobile-buttons">Change Email</a>
                <br>
                <a id="but2" class="waves-effect waves-light btn  accent-color show-on-medium-and-down s12 hide-on-med-and-up mobile-buttons">Change password</a>






        <div class="row">
            <span class="input-field col s4 m4 l4 change-email-desktop">

                <input type="password" name="password_email" pattern=".{4,}" placeholder="Enter your password"  >
                <label for="password"></label>


                <input type="email" name="email" placeholder="Enter your new e-mail" >
                <label for="email"></label>


                <input type="email" name="email_confirmation" placeholder="Enter your new e-mail again" >
                <label for="email"></label>
            </span>

            <span class="change-password-desktop input-field offset-l4 offset-m4 offset-s4 col l4 s4 m4">

                <input type="password" name="old_password" pattern=".{4,}" placeholder="Enter your old password"  >
                <input type="password" name="password" pattern=".{4,}" placeholder="Enter your new password"  >
                <input type="password" name="password_confirmation" pattern=".{4,}" placeholder="Enter your new password again"  >

            </span>
        </div>
        <span class="input-field col s12 content" id="but1c">

                <input type="password" name="password_email" pattern=".{4,}" placeholder="Enter your password">
                <label for="password"></label>


                <input type="email" name="email" placeholder="Enter your new e-mail" >
                <label for="email"></label>


                <input type="email" name="email_confirmation" placeholder="Enter your new e-mail again" >
                <label for="email"></label>
            </span>

        <span class=" input-field offset-l4 offset-m4 offset-s4 col l4 s4 m4 content" id="but2c">

                <input type="password" name="old_password" pattern=".{4,}" placeholder="Enter your old password"  >
                <input type="password" name="password" pattern=".{4,}" placeholder="Enter your new password"  >
                <input type="password" name="password_confirmation" pattern=".{4,}" placeholder="Enter your new password again"  >

            </span>

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








        {{  method_field('PUT') }}
        {{csrf_field()}}

        <br>
        <br>
        <div class="row center">
                <button class="btn-large waves-effect waves-light blue" type="submit">
                    Update
                    <i class="material-icons right">send</i>
                </button>
        </div>
    </form>
    </div>
    <script>
        $('.email-button-desktop').click(function(){
            $('.change-email-desktop').slideToggle("slow");

        });

        $('.password-button-desktop').click(function(){
            $('.change-password-desktop').slideToggle("slow");
        });
        $('.mobile-buttons').click(function() {
            var id = this.id;
            var idcont = id + 'c';
            $('.content').hide('slow');
            $('#'+idcont).show('slow');
        })

    </script>
@endsection