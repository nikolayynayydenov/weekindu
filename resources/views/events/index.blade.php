@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="/css/custom/showevents.css">
    <!-- Modal Trigger -->
    <a class="waves-effect waves-light btn modal-trigger modal-trigger-desktop white light-green-text hide-on-med-and-down" href="#modal1">Need help?</a>
    <a class="waves-effect waves-light btn modal-trigger modal-trigger-mobile white light-green-text show-on-medium-and-down s12 hide-on-med-and-up container" href="#modal1">Need Help??</a>

    <!-- Modal Structure -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>What is this?</h4>
            <p>This is the place where all the public events appear. On every event card you can see the date of the event, who made it. Click on "MORE" to see all the information of the event.</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Ok</a>
        </div>
    </div>
    <div class="container">
        <div class="row center">
            <div id="all" class="col offset-s2 s8 container-for-events">
                @if(count($events) > 0)
                    @foreach($events as $event)
                            <div class="card center-on hoverable ">
                                <a href="event/{{ $event->id }}">
                                    <div class="card-image">
                                        <img src="images/create-event/type/{{ $event->type_image }}">
                                    </div>
                                </a>
                                <div class="card-content">
                                    <div class="row">
                                        <p class="center">
                                            <a href="{{ url('/event/'.$event->id) }}">
                                                <strong class="center light-green-text">{{ $event->title }}</strong>
                                                <div class="divider"></div>
                                            </a>
                                        </p>
                                    </div>

                                    <div class="row">
                                        <div class="col left s12 show-on-small hide-on-med-and-up ">
                                            <img src="/images/user-avatars/{{ $event->user->avatar }}"
                                                 alt="/images/user-avatars/default.png" class="circle" width="80">
                                        </div>

                                        <div class="col left s12 show-on-small hide-on-med-and-up">
                                            <strong class="type-color" style="font-size: larger">{{ $event->type }}</strong>
                                            <p class="grey-text">
                                                <a href="{{ url('/user/'.$event->user->id) }}">
                                                    {{ $event->user->first_name.' '.$event->user->last_name}}
                                                </a>
                                                <div class="divider"></div>
                                                {{$event->date}}
                                                {{$event->time}}
                                            </p>
                                        </div>

                                        <div class="col s12 right show-on-small hide-on-med-and-up">
                                            <a href="{{ url('/event/'.$event->id) }}" class="btn orange">More</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col left show-on-medium-and-up hide-on-small-only">
                                            <img src="/images/user-avatars/{{ $event->user->avatar }}"
                                                 alt="no avatar" class="circle" width="80">
                                        </div>

                                        <div class="col left show-on-medium-and-up hide-on-small-only">
                                            <strong class="type-color" style="font-size: larger">{{ $event->type }}</strong>
                                            <p class="grey-text">
                                                <a href="{{ url('/user/'.$event->user->id) }}">
                                                    {{ $event->user->first_name.' '.$event->user->last_name}}
                                                </a>
                                                <div class="divider"></div>
                                                {{$event->date}}
                                                {{$event->time}}
                                            </p>
                                        </div>

                                        <div class="col right show-on-medium-and-up hide-on-small-only ">
                                            <a href="{{ url('/event/'.$event->id) }}" class="btn orange">More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                @endif
                <div class="center-align">
                    <i>{{ $events->render() }}</i>
                </div>
            </div>
        </div>
    </div>
@endsection