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
        <p class="flow-text center" id="event-description">{{ $event->description }}</p>

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

        @if(count($extras) > 0 ||
         !empty($event->dress_code) ||
         !empty($event->location_x))
            <hr>
                <div class="row">
                    <div class="col s12 m4 l4">
                        @if(!empty($event->dress_code))
                            <strong>Recommended dress code:</strong>
                            <div class="row">
                                <div class="col s12">
                                    <div class="card">
                                        <div class="card-image">
                                            @if(file_exists($event->dress_code_image_full_path))
                                                <img class="responsive-img" src="{{ $event->dress_code_image_path }}"
                                            @else
                                                <img src="/images/create-event/dress-code/other.png"
                                                     @endif
                                                     alt="no image"
                                                     class="dress-code-image">
                                        </div>
                                        <div class="card-content center">
                                            <div>
                                                <strong class="center">
                                                    {{ $event->dress_code }}
                                                </strong>
                                            </div>
                                            <div class="divider"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                <div class="col s12 m4 l4">
                    @if(count($extras) > 0)
                        <p class="flow-text event-info center">
                            <strong>There will be:</strong><br>
                        @if(array_key_exists('food', $extras))
                            <p>
                                Food:
                            {{--<strong>{{ implode(', ', $extras['food']) }}</strong>--}}
                            @foreach($extras['food'] as $food)
                                <div class="chip blue white-text">
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
                                        <div class="chip blue white-text">
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
                                                <div class="chip blue white-text">
                                                    {{ $music }}
                                                </div>
                                                @endforeach
                                                </p>
                                                @endif
                                                </p>
                                                @endif
                </div>
                <div class="col s12 m4 l4">
                    @if(!empty($event->location_x))
                        <div class="fill"
                             id="google-map">
                        </div>
                    @endif

                    @if(!empty($event->location_string))
                        Location:
                        <strong>{{ $event->location_string }}</strong>
                    @endif
                </div>
            </div>
        @endif
    </div>
@endsection

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDom14MVl0y2bpQYkAAShMOYnq0TBlflo0"></script>
<script>
    var myCenter = new google.maps.LatLng({{ $event->location_x or ''}}, {{ $event->location_y or ''}});

    function initialize() {
        var mapProp = {
            center: myCenter,
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("google-map"), mapProp);

        var marker = new google.maps.Marker({
            position: myCenter
        });

        marker.setMap(map);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>