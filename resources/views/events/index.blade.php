@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="/css/custom/showevents.css">
    @if(count($events) > 0)
        <ul class="collection">
            <div class="row">

            @foreach($events as $event)

                    <div class="col l2 s4 m2">
                        <div class="card hoverable small">
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
                            <div class="card-content">
                                <p>{{ $event->description }}</p>
                            </div>
                            <form action="{{url('/event/'.$event->id )}}" method="post" id="delete-event-form">
                                <input type="hidden" name="_method" value="DELETE">
                                {{ csrf_field() }}
                                <input type="submit" value="Delete" class="btn danger-color">
                            </form>
                        </div>
                    </div>

            @endforeach
            </div>
        </ul>
    @endif

@endsection