@extends('layouts.app')
@section('content')

    <!-- Modal Trigger -->
    {{--<a class="waves-effect waves-light btn modal-trigger modal-trigger-desktop orange hide-on-med-and-down" href="#modal1">What?</a>
    <a class="waves-effect waves-light btn modal-trigger modal-trigger-mobile orange show-on-medium-and-down s12 hide-on-med-and-up container" href="#modal1">What?</a>--}}
<style>

    body {
        background: url("/images/girlscar.jpg") no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    .create-btn, .create-btn:focus, .create-btn:hover{
        width: 50%;
        height: 100px;
        background: #689F38;
        display: inline-block;
    }
    .events-btn, .events-btn:focus, .events-btn:hover{
        width: 50%;
        height: 100px;
        background: #8BC34A;
        display: inline-block;
    }
    .myprofile-btn, .myprofile-btn:focus, .myprofile-btn:hover{
        width: 100%;
        height: 100px;
        background:#DCEDC8;
        color:#689F38;
    }
    .editprofile-btn, .editprofile-btn:focus, .editprofile-btn:hover{
        width: 100%;
        height: 100px;
        background: #8BC34A;
        color: white;
    }
    .meettheteam-btn, .meettheteam-btn:focus, .meettheteam-btn:hover{
        width: 100%;
        height: 100px;
        background: #689F38;

    }
.main-row{
    background-color: rgba(117, 117,117,0.65);

}


</style>
    <div class="row  main-row">
    <div class="container ">
        <div class="col s12 m3">
                <div class="card lime darken-1">
                    <div class="card-content white-text center">
                        <img src="/images/icons/plus.png">
                    </div>
                    <div class="card-action center">
                        <a class="white-text" href="/event/create">Create Event</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m3">
                <div class="card red">
                    <div class="card-content white-text center">
                        <img src="/images/icons/laptop.png">
                    </div>
                    <div class="card-action white-text center">
                        <a href="/user/my-events">My events</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m3">
                <div class="card purple">
                    <div class="card-content white-text center">
                        <img src="/images/icons/rss.png">
                    </div>
                    <div class="card-action white-text center">
                        <a href="/event">All events</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m3">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text center">
                        <img src="/images/icons/emoticon.png">
                    </div>
                    <div class="card-action center">
                        <a href="/user/{{$user->id}}">My profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
