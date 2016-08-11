@extends('layouts.app')
@section('content')
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
    <div class="">
        <br>
        <div class="row">
            <div class="col offset-l6">
                <h4>{{ $event->title }}</h4>
            </div>
        </div>
        <div class="row z-depth-2">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s3"><a id="active" href="#test1">Attendance</a></li>
                    <li class="tab col s3"><a class="food" href="#test2">Food statistics</a></li>
                    <li class="tab col s3"><a href="#test3">Drinks statistics</a></li>
                    <li class="tab col s3"><a href="#test4">Extras</a></li>
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
            <div id="test4" class="col s12">
                <table class="centered">
                    <thead>
                    <tr>
                        <th data-field="id">Extra</th>
                        <th data-field="name">Parameters</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td>
                        @if(is_array(json_decode($event->extras) ))
                            @foreach(json_decode($event->extras) as $k=>$e)
                                {{ $k }}
                                <td style="color: green">
                                    @foreach($e as $ee)
                                        {{ $ee }}
                                    @endforeach
                                </td>
                            @endforeach
                        @endif

                            </td>
                    </tr>
                    <tr>
                        <td >Alan Kolev</td>
                        <td style="color: red">No</td>
                    </tr>
                    <tr>
                        <td>Jonathan Georgiev</td>
                        <td style="color: orange">Pending</td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('ul.tabs').tabs('select_tab', 'tab_id');
        });
    </script>
@endsection

