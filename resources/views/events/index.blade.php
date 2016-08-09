@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="/css/custom/showevents.css">
    @if(count($events) > 0)
        <ul class="collection">
            @foreach($events as $event)
                <div class="row row-hoverable">
                    <div class="col s12 m7">
                        <div class="card">
                            <div class="card-image">
                                @if($event->type === 'Wedding')
                                    <img src="images/create-event/type/wedding.jpg">
                                @endif
                                @if($event->type === 'Conference')
                                    <img src="images/create-event/type/conference.jpg">
                                @endif
                                @if($event->type === 'Bachelor-party')
                                    <img src="images/create-event/type/bachelor-party.jpg">
                                @endif
                                @if($event->type === 'Birthday-party')
                                    <img src="images/create-event/type/birthday-party.jpg">
                                @endif
                                @if($event->type === 'Buisiness-meeting')
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

                            <div class="card-content">
                                <p>{{ $event->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </ul>
    @endif

@endsection