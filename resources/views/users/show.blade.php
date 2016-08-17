@extends('layouts.app')
@section('content')
    <style>
        #names{
            font-weight: 600;
            font-size: 26px;
        }
        .event-title{
            font-weight: bold;
        }
        .info{
            margin: 0 auto;

        }
        body{
            background-image: url("/images/background-photo.png");
            background-position: center;

        }
    </style>
<div class="container">
    <div class="row">
        <div class="col offset-s1 s12 m4 l3">
        <img class="materialboxed circle" width="250" src="/images/user-avatars/{{$user->avatar}}">
    <div id="names">{{$user->first_name}} {{$user->last_name}} @if(isset($user->name)) ({{$user->name}}) @endif </div>
           <div>{{$user->email}}</div>
    </div>
        @if(empty($events))
    <div class="col s12 m7 l9">
    <h5 class="center">Events</h5>
        <ul class="collection">
                    @foreach($events as $event)
                        <li  class="collection-item avatar center">
                          <a href="{{url('/event/'.$event->id)}}">
                              @if($event->is_public === 1)
                                <i class="medium material-icons circle green ">lock_open</i>
                            @endif
                                @if($event->is_public === 0)
                                    <i class="material-icons circle red">lock</i>
                                @endif
                            <span class="title event-title">{{$event->title}}</span>
                            <p>{{$event->type}}<br>
                                {{$event->description}}
                            </p>
                          </a>
                        </li>
                    @endforeach
                </ul>


        @else
            <div class="col s12 m7 l9">
                <h5 class="center">Events</h5>
                <ul class="collection">
                    <li class="collection-item center">The user has not made any events yes</li>
                </ul>
        @endif

    </div>
</div>
    </div>
    </div>

@endsection