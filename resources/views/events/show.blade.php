@extends('layouts.app')
@section('content')
    <style>
        body {
            background: url("/images/event-backgrounds/{{ $event->background_photo }}") no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        #event-container {
            background-color: rgba(255, 255,255,0.90);
            padding: 15px 25px 20px;
            border-radius: 8px;
        }

        #event-description {
            font-size: 2em;
        }

        .event-info {
            font-size: 1.1em;
            //font-weight: bold;
        }
    </style>

    <div class="container" id="event-container">
        <h2 class="center">{{ $event->title }}</h2>
        <p class="flow-text" id="event-description">{{ $event->description }}</p>

        <hr>

        <p class="flow-text event-info">
            A
            @if(!empty($event->type))
                <strong>{{ $event->type }}</strong>
            @else
                <strong>{{ $event->title }}</strong>
            @endif

            @if(!empty($event->date))
                that takes place on
                <strong>{{ $event->date }}</strong>
            @endif

            @if(!empty($event->location_string))
                at
                <strong>{{ $event->location_string }}</strong>
            @endif
        </p>

        @if(count($extras) > 0)
            <hr>

            <p class="flow-text event-info">
                There will be:<br>
                @if(array_key_exists('food', $extras))
                    <p>
                        Food:
                        {{--<strong>{{ implode(', ', $extras['food']) }}</strong>--}}
                        @foreach($extras['food'] as $food)
                            <div class="chip blue">
                                {{ $food }}
                            </div>
                        @endforeach
                    </p>

                @endif

                @if(array_key_exists('drinks', $extras))
                    <p>
                        Drinks:
                        {{--<strong>{{ implode(', ', $extras['drinks']) }}</strong>--}}
                        @foreach($extras['drinks'] as $drink)
                            <div class="chip blue">
                                {{ $drink }}
                            </div>
                        @endforeach
                    </p>
                @endif

                @if(array_key_exists('music', $extras))
                    <p>
                        Music:
                        {{--<strong>{{ implode(', ', $extras['music']) }}</strong>--}}
                        @foreach($extras['music'] as $music)
                            <div class="chip blue">
                                {{ $music }}
                            </div>
                        @endforeach
                    </p>
                @endif
            </p>
        @endif
    </div>
@endsection