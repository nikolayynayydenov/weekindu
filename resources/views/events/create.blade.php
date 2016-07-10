@extends('layouts.app')

@section('content')

<div class="row">
    <div class="card-panel z-depth-1">
        <h4 class="center">Create a new event</h4>

        <div class="row">
            <form class="col s12" action="{{url('/event')}}" method="POST" enctype="multipart/form-data" id="create-event-form">            

                {!! csrf_field() !!}
                
                <div class="row">
                    <div class="input-field col s12">
                        <input id="title" name="title" type="text" class="validate" placeholder="e.g. &quot;John's birthday&quot;">
                        <label for="title">Title</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="description" name="description" class="materialize-textarea" placeholder="Tell us briefly what this event is going to be about"></textarea>
                        <label for="description">Add description</label>
                    </div>
                </div>
                
                <input type="submit" class="btn waves-effect hide-on-small-only">
                <div class="fixed-action-btn hide-on-med-and-up mobile-submit-button" style="bottom: 45px; right: 24px;">
                    <a class="btn-floating btn-large teal">
                        <i class="material-icons">trending_flat</i>
                    </a>
                </div>
            </form>
        </div>    
    </div>
</div>

@endsection
