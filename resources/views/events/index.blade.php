@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="/css/custom/showevents.css">
    <div class="container">
    @if(count($events) > 0)
        <ul class="collection">
            <div class="row">

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
                                    <span class="card-title">{{ $event->title }}</span>
                                </div>
                            </a>
                            <div class="card-content row">
                                <div></div>
                                {{--<p>{{ $event->description }}</p>--}}
                                <a href="{{ url('/event/'.$event->id) }}" class="btn default-primary-color waves-effect col l4 m4 s4 manage-button">Manage</a>
                                <a href="{{ url('/invitation/'.$event->invitation_code) }}" class="btn accent-color waves-effect col l4 m4 s4 invitation-button">invitation</a>
                                <form action="{{url('/event/'.$event->id )}}" method="post">

                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="deletebut col offset-l3 offset-m3 offset-s3 l1 m1 s1" value=>
                                        <i class="material-icons">delete</i></button>

                                </form>
                            </div>
                            {{--<div class="card-action">

                            </div>--}}
                        </div>
                    </div>

            @endforeach
            </div>
        </ul>
    @endif
    </div>
@endsection