@extends('layouts.app')
@section('content')

<div class="container">
    @if(count($events) > 0)
        <ul class="collection">
            @foreach($events as $event)
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
                <hr>
                <hr>
                <hr>
            @endforeach
        </ul>
    @endif
</div>

@endsection