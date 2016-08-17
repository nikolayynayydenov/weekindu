@extends('layouts.app')
@section('content')

    <link rel="stylesheet" href="/css/custom/show.css">
    <div class="row">
        <div class="col s12 m4 l2">
    <a class="btn waves-effect waves-light modal-trigger" href="#modal1">Why do I need this?</a>
        </div>
            <div class="col s12 m4 l8 center">
        <a class="btn invitation-button" href="{{ url('/invitation/'.$event->invitation_code) }}">Invitation</a>
    </div>

    <form action="{{url('/event/'.$event->id )}}" method="post">

        {{ method_field('delete') }}
        {{ csrf_field() }}
        <button type="submit" class="deletebut" value=>
            <i class="material-icons medium">delete</i></button>
    </form>
</div>




    <!-- Modal Structure -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <h3>Why do I need to enter the title, date and the description?</h3>
            <p style="font-weight: 700">Because, later, when we start sending the invitation, the date and the name of the event would be important</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Ok</a>
        </div>
    </div>
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
    @php
        $counter = 5
    @endphp
    <div class="">
        <br>
        <div class="row center">
            <h4>{{ $event->title }}</h4>
        </div>
        <div class="row z-depth-2">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s3"><a id="active" href="#test1">Attendance</a></li>
                    <li class="tab col s3"><a class="food" href="#test2">Food statistics</a></li>
                    <li class="tab col s3"><a href="#test3">Drinks statistics</a></li>
                    <li class="tab col s3"><a href="#tab4">Music statistics</a></li>
                    @if(is_object(json_decode($event->extras) ))
                        @foreach(json_decode($event->extras) as $key=>$values)
                            <li class="tab col s3"><a href="#test{{ $counter }}">{{ $key }}</a></li>
                            @php
                                $counter++
                            @endphp
                        @endforeach
                    @endif
                </ul>
            </div>
            <div id="test1" class="col s12">
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
            <div id="test2" class="col s12">
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
            <div id="test3" class="col s12">
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
                    <div id="test{{ $counter }}" class="col s12">
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
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @php
                        $counter++
                    @endphp
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

