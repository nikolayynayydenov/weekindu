@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="/css/custom/showevents.css">
    @if(count($events) > 0)
        <ul class="collection">
            <div class="row">

            @foreach($events as $event)

                    <div class="col l2 s4 m2">
                        <div class="card hoverable small">
                            <div class="card-image">
                                @if($event->type === 'Wedding')
                                    <a href="event/{{ $event->id }}">
                                    <img class="responsive-img" src="images/create-event/type/wedding.jpg">
                                    </a>
                                @endif
                                @if($event->type === 'Conference')
                                    <a href="event/{{ $event->id }}">
                                    <img src="images/create-event/type/conference.jpg">
                                    </a>
                                @endif
                                @if($event->type === 'Bachelor Party')
                                    <a href="event/{{ $event->id }}">
                                    <img src="images/create-event/type/bachelor-party.jpg">
                                    </a>
                                @endif
                                @if($event->type === 'Birthday Party')
                                    <a href="event/{{ $event->id }}">
                                    <img src="images/create-event/type/birthday-party.jpg">
                                    </a>
                                @endif
                                @if($event->type === 'Buisiness Meeting')
                                    <a href="event/{{ $event->id }}">
                                    <img src="images/create-event/type/buisiness-meeting.jpg">
                                    </a>
                                @endif
                                @if($event->type === 'Camp')
                                    <a href="event/{{ $event->id }}">
                                    <img src="images/create-event/type/camp.jpg">
                                    </a>
                                @endif
                                @if($event->type === 'Other')
                                    <a href="event/{{ $event->id }}">
                                    <img src="images/create-event/type/other.jpg">
                                    </a>
                                @endif
                                <span class="card-title">{{ $event->title }}</span>
                            </div>

                            <div class="card-content">
                                <p>{{ $event->description }}</p>
                            </div>
                        </div>
                    </div>

            @endforeach
            </div>
        </ul>
    @endif

@endsection