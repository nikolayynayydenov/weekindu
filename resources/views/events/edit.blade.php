@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="card-panel z-depth-1">
            <h4 class="center">Edit: {{ $event->title }}</h4>

            <div class="row">
                <form class="col s12" action="{{ url('/event') }}" method="POST" enctype="multipart/form-data">

                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="PUT">

                    <div class="row section">
                        <div class="input-field col l4 m4 s12">
                            <input id="title" name="title" type="text" class="validate"
                                   placeholder="e.g. &quot;John's birthday&quot;" value="{{ $event->title }}">
                            <label for="title">Title</label>
                        </div>

                        <div class="input-field col l4 m4 s12">
                            <input id="date" name="date" type="date" class="datepicker"
                                   placeholder="e.g. &quot;John's birthday&quot;"
                                   value="{{ $event->date }}">
                            <label for="date">Date</label>
                        </div>

                        <div class="col l4 m4 s12">
                            <div class="switch section">
                                <span class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Only participants will see information about this event">Private</span>
                                <label>
                                    @if ($event->is_public)
                                        <input type="checkbox" checked>
                                    @else
                                        <input type="checkbox">
                                    @endif

                                    <span class="lever"></span>
                                </label>
                                <span class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Other people will be able to see the information about this event">Public</span>
                            </div>
                        </div>
                    </div>

                    <div class="row section">
                        <div class="input-field col s12">
                        <textarea id="description"
                                  name="description"
                                  class="materialize-textarea"
                                  placeholder="Tell us briefly what this event is going to be about"
                        >{{ $event->description }}</textarea>
                            <label for="description">Description</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col l4 m4 s12">
                            <select class="icons">
                                <option value="" disabled selected>Choose your option</option>
                                <option value="" data-icon="/images/create-event/type/camp.jpg" class="circle">Camp</option>
                                <option value="" data-icon="/images/create-event/type/conference.jpg" class="circle">Conference</option>
                                <option value="" data-icon="/images/create-event/type/wedding.jpg" class="circle">Wedding</option>
                            </select>
                            <label>Images in select</label>
                        </div>
                        <div class="col l4 m4 s12"></div>
                        <div class="col l4 m4 s12"></div>
                    </div>

                    <input type="submit" class="btn waves-effect" value="Update">
                </form>
            </div>
        </div>
    </div>
</div>


<!--Hello from edit

<div class="row">
    <div class="card-panel z-depth-1">
        <h4 class="center">Create a new event</h4>

        <div class="row">
            <form class="col s12" action="{{url('/event')}}" method="POST" enctype="multipart/form-data">            

                {!! csrf_field() !!}
                
                <div class="row">
                    <div class="input-field col s12">
                        <input id="title" name="title" type="text" class="validate" placeholder="e.g. &quot;John's birthday&quot;">
                        <label for="title">Title</label>
                    </div>
                </div>

                <div class="switch">
                    <span class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Only participants will see information about this event">Private</span>
                    <label>
                      <input type="checkbox">
                      <span class="lever"></span>                  
                    </label>
                    <span class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Other people will be able to see the information about this event">Public</span>
                </div>

                <br><br>

                 <div class="row">
                    <div class="input-field col s12 container-fluid">
                        <input id="participants" name="participants" type="text" class="validate" placeholder="Who would you like to invite?">
                        <label for="participants">Participants</label>
                    </div>
                </div>               

                <div class="file-field input-field">
                    <input type="file" name="cover_photo" accept="image/*" class="dropify" data-max-file-size="2M" data-max-width="100%">        
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="description" name="description" class="materialize-textarea" placeholder="Tell us briefly what this event is going to be about"></textarea>
                        <label for="description">Add description</label>
                    </div>
                </div>
                
                <input type="submit">
            </form>
        </div>    
    </div>
</div>

<script defer>
$("#participants").autocomplete({
    source: "/user/get-json",
    minLength: 1,
    select: function (event, ui){
    }        
}).data('ui-autocomplete')._renderItem = function (ul, item){        
    return $('<li>').addClass('avatar')
        .append('<img src="/images/user-avatars/' + item.avatar + '" width="40" class="circle">')
        .append('<span class="title"> ' + item.fullName + (item.name ? ' (' + item.name + ')' : '') + '</span>')
        .appendTo(ul);
};
</script>-->

@endsection