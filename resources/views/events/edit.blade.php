@extends('layouts.app')
@section('content')

<div class="row">
    <div class="card-panel z-depth-1">
        <h4 class="center">Edit: {event name}</h4>

        <div class="row">
            <form class="col s12" action="{{url('/event')}}" method="POST" enctype="multipart/form-data">            
                        
                {!! csrf_field() !!}
                <input type="hidden" name="_method" value="PUT">
                
                <div class="row section">
                    <div class="input-field col s12">
                        <input id="title" name="title" type="text" class="validate"
                               placeholder="e.g. &quot;John's birthday&quot;" value="{value from db}">
                        <label for="title">Title</label>
                    </div>
                </div>                
                
                <div class="row section">
                    <div class="input-field col s12">
                        <textarea id="description"
                                  name="description"
                                  class="materialize-textarea"
                                  placeholder="Tell us briefly what this event is going to be about"
                                  >{value from db}</textarea>
                        <label for="description">Add description</label>
                    </div>
                </div>

                <div class="switch section">                    
                    <span class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Only participants will see information about this event">Private</span>
                    <label>
                      <input type="checkbox">
                      <span class="lever"></span>                  
                    </label>
                    <span class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Other people will be able to see the information about this event">Public</span>
                </div>
                
                <div class="section">
                    <label for="datepicker-jquery-ui">You can specify the date of the event</label>
                    <input type="text" id="datepicker-jquery-ui">                    
                </div>                

                <div class="file-field input-field section">
                    Select a background photo:
                    <input type="file" name="cover_photo" accept="image/*" class="dropify" data-max-file-size="2M" data-max-width="100%">        
                </div>
                
                <div class="file-field input-field section">
                    <div class="btn purple darken-2">
                        <span>Images</span>
                        <input type="file" multiple>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="You can upload one or more images">
                    </div>
                </div>
                
                <div class="section">                    
                    <ul class="collection with-header" id="add-extra-params-container">
                        <li class="collection-header"><h4>Extra parameters:</h4></li>
                        <li class="collection-item">
                            <input type="text" placeholder="Type the name of new parameter">
                        </li>
                      </ul>

                    <span class="btn waves-effect green accent-4" id="add-extra-params-btn">Add extra parameters</span>
                </div>
                
                <input type="submit" class="btn waves-effect">
            </form>
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