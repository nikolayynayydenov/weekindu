@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="/css/custom/showevents.css">
    <!-- Modal Trigger -->
    <a class="waves-effect waves-light btn modal-trigger modal-trigger-desktop orange hide-on-med-and-down" href="#modal1">Need Help?</a>
    <a class="waves-effect waves-light btn modal-trigger modal-trigger-mobile orange show-on-medium-and-down s12 hide-on-med-and-up container" href="#modal1">Need Help?</a>
    <style>
        .manage-button, .manage-button:hover, .manage-button:hover, .manage-button:focus{
            background:#2196f3;
        }
        .invitation-button, .invitation-button:hover, .invitation-button:hover, .invitation-button:focus{
            background:grey;
        }
        .deletebut {
            cursor: pointer;
            background: none;
            border: none;
        }

        .manage-button:after{
            background:#2196f3;
        }
        .manage-button:hover{
            background:#2196f3;

        }

        .deletebut {
            cursor: pointer;
            background: none;
            border: none;
            left: 0;
        }
        .deletebut:hover{
            background: none;
        }
        .deletebut:focus{
            background: none;
        }
        .pagination li.active{
            background-color: #2196f3;
            color: white;
        }
        body {
            background: url("/images/girlscar.jpg") no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
        .container-for-events{
            background-color: rgba(255, 255,255,0.60);
            border-radius: 7px;
        }
    </style>
    <!-- Modal Structure -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>What is this?</h4>
            <p>This is the place where all your events appear.On every event card you can see the invitation, the statistics or delete the event</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Ok</a>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div id="all" class="col offset-s2 s8 container-for-events">
                @if(count($events) > 0)
                    @foreach($events as $event)
                        <div class="col sl2 m12">
                            <div class="card hoverable center-on-small-only">
                                <a href="event/{{ $event->id }}">
                                    <div class="card-image">
                                        @if($event->type === 'Wedding')
                                            <img class="responsive-img" src="images/create-event/type/wedding.jpg">
                                        @endif
                                        @if($event->type === 'Conference')
                                            <img src="images/create-event/type/conference.jpg">
                                        @endif
                                        @if($event->type === 'Bachelor Party')
                                            <img src="images/create-event/type/bachelor-party.jpg">
                                        @endif
                                        @if($event->type === 'Birthday Party')
                                            <img src="images/create-event/type/birthday-party.jpg">
                                        @endif
                                        @if($event->type === 'Buisiness Meeting')
                                            <img src="images/create-event/type/buisiness-meeting.jpg">
                                        @endif
                                        @if($event->type === 'Camp')
                                            <img src="images/create-event/type/camp.jpg">
                                        @endif
                                        @if($event->type === 'Other')
                                            <img src="images/create-event/type/other.jpg">
                                        @endif
                                    </div>
                                </a>
                                <div class="card-content">
                                    <div class="row">
                                        <p class="center">
                                            <a href="{{ url('/event/'.$event->id) }}">
                                                <strong class="center blue-text">{{ $event->title }}</strong>
                                                <div class="divider"></div>
                                            </a>
                                    </div>

                                    <div class="row">
                                        <div class="col s10 m10 hide-on-small-only">
                                            <a href="{{ url('/statistics/'.$event->id) }}"
                                               class="btn  waves-effect manage-button white-text hide-on-small-only">Manage</a>
                                            <a href="{{ url('/invitation/'.$event->invitation_code) }}"
                                               class="btn waves-effect invitation-button hide-on-small-only">invitation</a>
                                        </div>
                                        <div class="col s6 m6 show-on-small hide-on-med-and-up">
                                            <a href="{{ url('/statistics/'.$event->id) }}"
                                               class="btn  waves-effect manage-button white-text show-on-small">Manage</a>
                                        </div>
                                        <div class="col s6 m6 show-on-small hide-on-med-and-up">
                                            <a href="{{ url('/invitation/'.$event->invitation_code) }}"
                                               class="btn waves-effect invitation-button show-on-small">Invitation</a>
                                        </div>
                                        <div class="col right hide-on-small-only">
                                            <form action="{{url('/event/'.$event->id )}}" method="post">
                                                {{ method_field('delete') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="deletebut" value=>
                                                    <i class="material-icons">delete</i>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="col show-on-small hide-on-med-and-up center-on-small-only">
                                            <form action="{{url('/event/'.$event->id )}}" method="post">
                                                {{ method_field('delete') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="deletebut" value=>
                                                    <i class="material-icons">delete</i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="center-align">
            <i>{{ $events->render() }}</i>
        </div>
    </div>
@endsection