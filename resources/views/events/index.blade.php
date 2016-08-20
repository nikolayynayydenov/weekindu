@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="/css/custom/showevents.css">
    <!-- Modal Trigger -->
    <a class="waves-effect waves-light btn modal-trigger modal-trigger-desktop accent-color hide-on-med-and-down" href="#modal1">What is this?</a>
    <a class="waves-effect waves-light btn modal-trigger modal-trigger-mobile accent-color show-on-medium-and-down s12 hide-on-med-and-up" href="#modal1">What is this?</a>

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
    @if(count($events) > 0)


            @foreach($events as $event)

                    <div class="col sl2 m5">
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
                                    <strong class="center orange-text">{{ $event->title }}</strong><br>
                                    <div class="divider"></div>
                                </div>

                                    <div class="row">
                                        <div class="col s10 m10 ">
                                <a href="{{ url('/event/'.$event->id) }}" class="btn default-primary-color waves-effect manage-button">Manage</a>
                                        {{--</div>
                                        <div class="col">--}}
                                            <a href="{{ url('/invitation/'.$event->invitation_code) }}" class="btn accent-color waves-effect invitation-button">invitation</a>
                                        </div>
                                        <div class="col right">
                                            <form action="{{url('/event/'.$event->id )}}" method="post">

                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="deletebut " value=>
                                        <i class="material-icons">delete</i></button>

                                </form>
                                        </div>
                                    </div>
                                </p>

                            </div>
                        </div>
                    </div>

            @endforeach
            </div>

    @endif

@endsection