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
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s3 blue-text"><a href="#all">All Events</a></li>
                    <li class="tab col s3 blue-text"><a href="#my">My Events</a></li>

                </ul>
            </div>
            <div id="all" class="col s12">
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
                                            <strong class="center blue-text">{{ $event->title }}</strong><br>
                                        <div class="divider"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col s10 m10 hide-on-small-only">
                                            <a href="{{ url('/event/'.$event->id) }}" class="btn  waves-effect manage-button white-text hide-on-small-only">Manage</a>
                                            <a href="{{ url('/invitation/'.$event->invitation_code) }}" class="btn waves-effect invitation-button hide-on-small-only">invitation</a>
                                        </div>

                                        <div class="col s6 m6 show-on-small hide-on-med-and-up">
                                            <a href="{{ url('/event/'.$event->id) }}" class="btn  waves-effect manage-button white-text show-on-small">Manage</a>
                                        </div>
                                        <div class="col s6 m6 show-on-small hide-on-med-and-up">
                                            <a href="{{ url('/invitation/'.$event->invitation_code) }}" class="btn waves-effect invitation-button show-on-small">Invitation</a>
                                        </div>

                                        <div class="col right hide-on-small-only">
                                            <form action="{{url('/event/'.$event->id )}}" method="post">

                                                {{ method_field('delete') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="deletebut" value=>
                                                    <i class="material-icons">delete</i></button>

                                            </form>
                                        </div>


                                        <div class="col show-on-small hide-on-med-and-up center-on-small-only">
                                            <form action="{{url('/event/'.$event->id )}}" method="post">

                                                {{ method_field('delete') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="deletebut" value=>
                                                    <i class="material-icons">delete</i></button>

                                            </form>
                                        </div>

                                    </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
            </div>

            @endif
            </div>
            <div id="my" class="col s12">moite</div>

        </div>

@endsection