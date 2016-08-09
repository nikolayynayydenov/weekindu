@extends('layouts.app')
@section('content')

    <link rel="stylesheet" href="/css/custom/slider.css">


<!-- The form that is going to be sent: -->

<form action="{{url('/event')}}" method="post" id="create-event-form">
    {{csrf_field()}}
</form>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



@endsection
