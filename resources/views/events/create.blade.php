@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="/css/custom/slider.css">

<!-- The form that is going to be sent: -->

<form action="{{url('/event')}}" method="post" id="create-event-form" enctype="multipart/form-data">
    {{csrf_field()}}
</form>

    <div class="container">
        @if (count($errors->all()) > 0)
            @foreach ($errors->all() as $error)
                <div id="card-alert" class="card red">
                    <div class="card-content white-text">
                        <p><i class="mdi-alert-error"></i> ERROR : {{$error}}</p>
                    </div>
                </div>
            @endforeach
        @endif

        <div class="row">
            <div class="card-panel z-depth-1 slidee">
                <div class="row">
                    <div class="col l3 s12 m3">
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
                    <div class="col l9 s12 m9">
                        <div class="row">
                            <div class="col">
                                <span class="btn slider-button waves-effect" id="slider-prev-btn">Previous</span>
                                <span class="btn slider-button waves-effect" id="slider-next-btn">Next</span>
                                <span><button class="btn slider-button-create waves-effect" form="create-event-form" type="submit">Create Event!</button></span>
                            </div>
                            <div class="col right">
                                <a class="waves-effect waves-light btn modal-trigger white light-green-text" href="#modal1">Need help?</a>
                            </div>
                        </div>

                        <!-- Modal Structure -->
                        <div id="modal1" class="modal">
                            <div class="modal-content">
                                <h3>What is this?</h3>
                                <p id="content" style="font-weight: 700"></p>
                            </div>
                            <div class="modal-footer">
                                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Ok</a>
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

                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">schedule</i>
                                        <input type="date"
                                               class="datepicker"
                                               name="date"
                                               id="event-date"
                                               placeholder="Click to pick a date"
                                               form="create-event-form">
                                        <label for="event-date">Date</label>
                                    </div>

                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">schedule</i>
                                        <input type="text"
                                               class="timepicker"
                                               name="time"
                                               placeholder="Click to add time"
                                               form="create-event-form"
                                               id="event-time">
                                        <label for="event-time">Time</label>
                                    </div>

                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">description</i>
                                        <textarea id="event-description"
                                                  class="materialize-textarea"
                                                  name="description"
                                                  form="create-event-form"
                                                  required></textarea>
                                        <label for="event-description">Description</label>
                                    </div>

                                    <div class="switch section col">
                                        <span class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Only participants will see information about this event" data-tooltip-id="072f438c-4f1e-0b98-4bbf-af0f5f2f0763">Private event</span>
                                        <label>
                                            <input type="checkbox" form="create-event-form" name="is_public" checked>
                                            <span class="lever primary-color"></span>
                                        </label>
                                        <span class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Other people will be able to see the information about this event" data-tooltip-id="f225007d-48b8-0916-fe0c-d242cfd80a2a">Public event</span>
                                    </div>

                                    <div class="col s12">
                                        <h6>Background photo</h6>
                                        <input type="file"
                                               name="background_photo"
                                               accept="image/*"
                                               class="dropify"
                                               form="create-event-form"
                                               data-max-file-size="2M"
                                               data-max-width="100%">
                                    </div>
                                </div>
                            </div>

                            <div class="slider-item" id="type">
                                <h4>Type</h4>
                                <div class="rows"></div>
                            </div>

                            <div class="slider-item" id="dress-code">
                                <h4>Dress code</h4>
                                <h5>Which dress code is the recommended one for your event?</h5>
                                <div class="rows"></div>
                            </div>

                            <div class="slider-item" id="music">
                                <h4>Music</h4>
                                <h5>Which genres would be suitable for your event?</h5>
                                <div class="rows"></div>
                            </div>

                            <div class="slider-item" id="food">
                                <h4>Food</h4>
                                <h5>Which dishes can you provide?</h5>
                                <div class="rows"></div>
                            </div>

                            <div class="slider-item" id="drinks">
                                <h4>Drinks</h4>
                                <h5>Which drinks can you provide?</h5>

                                <div class="rows"></div>
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
                                <label for="create-event-map-checkbox" class="primary-text-color">Point on map the exact location on the map</label>

                                <div class="container-fluid" id="google-map" style="height:380px; display: none;"></div>
                            </div>

                            <div class="slider-item" id="extras">
                                <h5>Want to get more information about your guests?Type some questions for your guests as well as sample answers</h5>
                                <input  style="border-bottom: 1px solid #8BC34A;"
                                        class="extra-field"
                                       type="text"
                                       placeholder="e.g. Can you bring your own camera?"
                                       id="extra-params-field">

                                <div class="section">
                                    <ul class="collection" id="extra-params-container"></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA6WkG6e4Zk1xRfbdo-_I-IvzGv7p5k06M"></script>

@endsection
