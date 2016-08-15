@extends('layouts.app')
@section('content')

    <a href="{{ url('/invitation/'.$event->invitation_code) }}">Invitation</a>
    {{--<div class="container">
        <h3>{{ $event->title }}</h3>
        <p>{{ $event->description }}</p>
        <div>{{ $event->date === '' ? '' : 'Date of event: ' . $event->date }}</div>
        <div>{{ $event->dress_code === '' ? '' : '(we can load the picture)Dress code: ' . $event->dress_code }}</div>
        <div>{{ $event->music === '' ? '' : '(we can load the picture)Music: ' . $event->music }}</div>

        @if(is_array($event->food))
            <ul class="collection">
                <li class="collection-header"><h4>Food: </h4></li>
            @foreach($event->food as $food_item)
                    <li class="collection-item">{{ $food_item }}</li>
            @endforeach
            </ul>
        @endif

        @if(is_array($event->drinks))
            <ul class="collection">
                <li class="collection-header"><h4>Drinks: </h4></li>
                @foreach($event->drinks as $drinks_item)
                    <li class="collection-item">{{ $drinks_item }}</li>
                @endforeach
            </ul>
        @endif

        <div>{{ $event->location === '' ? '' : 'Location: ' . $event->location_string }}</div>
    </div>--}}
    <link rel="stylesheet" href="/css/custom/show.css">
    @php
        $counter = 5
    @endphp
    <div class="">
        <br>
        <div class="row center showtitle">

                <h3>{{ $event->title }}</h3>

        </div>
        <div class="row z-depth-2">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s3"><a id="active" href="#tab1">Attendance</a></li>
                    <li class="tab col s3"><a class="food" href="#tab2">Food statistics</a></li>
                    <li class="tab col s3"><a href="#tab3">Drinks statistics</a></li>
                    <li class="tab col s3"><a href="#tab4">Music statistics</a></li>
                    @if(is_object(json_decode($event->extras) ))
                        @foreach(json_decode($event->extras) as $key=>$values)
                            <li class="tab col s3"><a href="#tab{{ $counter }}">{{ $key }}</a></li>
                            @php
                                $counter++
                            @endphp
                        @endforeach
                    @endif
                </ul>
            </div>
            <div id="tab1" class="col s12">
                <table class="centered">
                    <thead>
                    <tr>
                        <th data-field="id">Name</th>
                        <th data-field="name">Attending</th>
                        <th data-field="price">Additional info</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td>Alvin Ivanov</td>
                        <td style="color: green">Yes</td>
                        <td>I will be late with 15 minutes</td>
                    </tr>
                    <tr>
                        <td >Alan Kolev</td>
                        <td style="color: red">No</td>
                        <td>Sorry, I have an arrangement</td>
                    </tr>
                    <tr>
                        <td>Jonathan Georgiev</td>
                        <td style="color: orange">Pending</td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div id="tab2" class="col s12">
                <table class="centered">
                    <thead>
                    <tr>
                        <th data-field="Food">Food/Dish</th>
                        <th data-field="Quantity">Quantity</th>

                    </tr>
                    </thead>

                    <tbody>


                        @if(is_array($event->food))
                            @foreach($event->food as $food_item)
                        <tr>


                    <td>{{ $food_item }}</td>
                            <td>0</td>

                            </tr>
                            @endforeach
                        @endif


                    </tbody>
                </table>
            </div>
            <div id="tab3" class="col s12">
                <table class="centered">
                    <thead>
                    <tr>
                        <th data-field="Drink">Drink type</th>
                        <th data-field="Quantity">Quantity</th>

                    </tr>
                    </thead>

                    <tbody>


                    @if(is_array($event->drinks))
                        @foreach($event->drinks as $drinks_item)
                            <tr>


                                <td>{{ $drinks_item }}</td>
                                <td>0</td>

                            </tr>
                        @endforeach
                    @endif


                    </tbody>
                </table>
            </div>
            <div id="tab4" class="col s12">
                <table class="centered">
                    <thead>
                    <tr>
                        <th data-field="Musuc">Drink type</th>
                        <th data-field="Quantity">Percentage</th>

                    </tr>
                    </thead>

                    <tbody>


                    @if(is_array($event->music))
                        @foreach($event->music as $music_item)
                            <tr>


                                <td>{{ $music_item}}</td>
                                <td>0%</td>

                            </tr>
                        @endforeach
                    @endif


                    </tbody>
                </table>
            </div>



            @if(is_object(json_decode($event->extras) ))
                @php
                    $counter = 5
                @endphp
                @foreach(json_decode($event->extras) as $key=>$values)
                    <div id="tab{{ $counter }}" class="col s12">
                        <table class="centered">
                            <thead>
                            <tr>
                                <th data-field="name">Parameters</th>
                                <th data-field="quantity">Quantity</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($values as $value)
                                <tr>
                                <td>
                                    {{ $value }}
                                </td>
                                <td>
                                    0
                                </td>
                                </tr>
                                @php
                                    $counter++
                                @endphp
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
            @endif

        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('ul.tabs').tabs('select_tab', 'tab_id');
        });
    </script>
@endsection

