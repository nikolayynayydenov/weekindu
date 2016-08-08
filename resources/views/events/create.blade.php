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

<div class="row">
    <div class="row accent-color z-depth-5" id="showhide" onclick="">showhide</div>
    <div class="card-panel z-depth-1 grey transparent">
        <div class="row">
            <div class="col l3 s12 m12">
                <div class="collection" id="slider-links">
                    <a class="collection-item slider-link-item waves-effect" id="slider-link-basics">Basics</a>
                    <a class="collection-item slider-link-item waves-effect" id="slider-link-type">Type</a>
                    <a class="collection-item slider-link-item waves-effect" id="slider-link-dress-code">Dress Code</a>
                    <a class="collection-item slider-link-item waves-effect" id="slider-link-music">Music</a>
                    <a class="collection-item slider-link-item waves-effect" id="slider-link-food">Food</a>
                    <a class="collection-item slider-link-item waves-effect" id="slider-link-drinks">Drinks</a>
                    <a class="collection-item slider-link-item waves-effect" id="slider-link-location">Location</a>
                    <a class="collection-item slider-link-item waves-effect" id="slider-link-extras">Extras</a>
                </div>


            </div>
            <div class="col l9 s12 m12">
                <div class="row">
                    <div class="col s12 m12 l12">
                        <span class="btn default-primary-color waves-effect " id="slider-prev-btn">Previous</span>
                        <span class="btn default-primary-color waves-effect " id="slider-next-btn">Next</span>
                        <span><button class="btn default-primary-color" form="create-event-form" type="submit">Create Event!</button></span>
                </div>
                    </div>

                <div class="container-fluid" id="slider-container">
                    <div class="slider-item" id="basics">
                        <div class="row">
                            <div class="input-field col l12 s10 m12">
                                <i class="material-icons prefix">view_day</i>
                                <input id="event-title"
                                       type="text"
                                       class="validate"
                                       name="title"
                                       form="create-event-form"
                                       maxlength="80"
                                       length="80"
                                       required>
                                <label for="event-title">Title</label>
                            </div>

                            <div class="input-field col l12 s12 m12">
                                <i class="material-icons prefix">schedule</i>
                                <input type="date"
                                       class="datepicker"
                                       name="date"
                                       id="event-date"
                                       placeholder="Click to pick a date"
                                       form="create-event-form">
                                <label for="event-date">Date</label>
                            </div>

                            <div class="input-field col l12 s12 m12">
                                <i class="material-icons prefix">description</i>
                                <textarea id="event-description"
                                          class="materialize-textarea"
                                          name="description"
                                          form="create-event-form"
                                          required></textarea>
                                <label for="event-description">Description</label>
                            </div>

                            <div class="switch section">
                                <span class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Only participants will see information about this event" data-tooltip-id="072f438c-4f1e-0b98-4bbf-af0f5f2f0763">Private</span>
                                <label>
                                    <input type="checkbox" form="create-event-form" name="is_public">
                                    <span class="lever primary-color"></span>
                                </label>
                                <span class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Other people will be able to see the information about this event" data-tooltip-id="f225007d-48b8-0916-fe0c-d242cfd80a2a">Public</span>
                            </div>
                        </div>
                    </div>

                    <div class="slider-item" id="type">
                        <h4>Choose type</h4>
                    </div>

                    <div class="slider-item" id="dress-code">
                        <h4>Is there a dress code?</h4>
                    </div>

                    <div class="slider-item" id="music">
                        <h4>What kind of music will there be?</h4>
                    </div>

                    <div class="slider-item" id="food">
                        <h4>Food?</h4>
                        <h5>(select several)</h5>
                    </div>

                    <div class="slider-item" id="drinks">
                        <h4>And what about drinks?</h4>
                        <h5>(select several)</h5>
                    </div>
                    <div class="slider-item" id="location">
                        <div class="row">
                            <div class="input-field col l12 s10 m12">
                                <i class="material-icons prefix">location_on</i>
                                <input id="event-location-text-field"
                                       type="text"
                                       class="validate"
                                       name="location_string"
                                       form="create-event-form"
                                       placeholder="Type address"
                                       maxlength="80"
                                       length="80">
                                <label for="event-location-text-field">Location</label>
                            </div>
                        </div>

                        <input type="checkbox"
                               id="create-event-map-checkbox">
                        <label for="create-event-map-checkbox">Point on map</label>

                        <div class="container-fluid" id="google-map" style="height:380px; display: none;"></div>
                    </div>

                    <div class="slider-item" id="extras">
                        <input type="text" placeholder="Type the name of new parameter and press enter" id="extra-params-field">
                        <!-- <span class="btn waves-effect green accent-4" id="extra-params-btn">Add extra parameter</span> -->

                        <div class="section">
                            <ul class="collection with-header" id="extra-params-container">
                                <li class="collection-header"><h4>Extra parameters:</h4></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA6WkG6e4Zk1xRfbdo-_I-IvzGv7p5k06M"></script>

@endsection
