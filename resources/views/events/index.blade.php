@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="/css/custom/showevents.css">
    <!-- Modal Trigger -->
    <a class="waves-effect waves-light btn modal-trigger modal-trigger-desktop orange hide-on-med-and-down" href="#modal1">What?</a>
    <a class="waves-effect waves-light btn modal-trigger modal-trigger-mobile orange show-on-medium-and-down s12 hide-on-med-and-up container" href="#modal1">What?</a>

    <!-- Modal Structure -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>What is this?</h4>
            <p>This is the place where all your events appear.On every event card you can see the invitation, the statistics and delete the event</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Ok</a>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div id="all" class="col s12">
                @if(count($events) > 0)

                    @foreach($events as $event)

                        <div class="col sl2 m12">
                            <div class="card hoverable ">
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
                                            </a>
                                        <div class="divider"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col left">
                                                <img src="/images/user-avatars/{{ $event->user->avatar }}" alt="no avatar" class="circle" width="80">
                                        </div>
                                        <div class="col left">
                                            <strong class="blue-text" style="font-size: larger">{{$event->type}}</strong>
                                                <p class="grey-text">{{ $event->user->first_name.' '.$event->user->last_name}}<br>
                                                    {{$event->date}}
                                                </p>
                                            </div>
                                        {{--<p class="col">
                                            {{$event->description}}
                                        </p>--}}
                                        <div class="col right">
                                            <a href="{{ url('/event/'.$event->id) }}" class="btn blue">More</a>
                                        </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    @endforeach
                @endif
                </div>


            </div>
        </div>

    {{ $events->render() }}
@endsection