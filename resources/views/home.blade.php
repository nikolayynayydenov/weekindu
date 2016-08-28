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
        width: 100%;
        height: 100px;
        background: #689F38;

    }
    .events-btn, .events-btn:focus, .events-btn:hover{
        width: 100%;
        height: 100px;
        background: #8BC34A;
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



</style>
    <div class="container">
        <button onclick="location.href='event/create'" class="btn create-btn hoverable waves-effect valign">Create Event</button>
        <br>
        <br>
        <button onclick="location.href='event'" class="btn events-btn hoverable waves-effect">Events</button>
        <br>
        <br>
        <button onclick="location.href='user/{{$user->id}}'" class="btn myprofile-btn hoverable waves-effect">My profile</button>
        <br>
        <br>
        <button onclick="location.href='user/{{$user->id}}/edit'" class="btn editprofile-btn hoverable waves-effect">Edit profile</button>
        <br>
        <br>
        <button onclick="location.href='about-us'" class="btn meettheteam-btn hoverable waves-effect">Meet the team</button>

    </div>
@endsection