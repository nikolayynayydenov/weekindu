<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>{{$event->title}}</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
        <link rel="stylesheet" href="/css/materialize/palette.css">
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <style>
            #main {
                margin-top: 20px;
            }

            #invitation-form{
                display: none;
            }

            .input-field label {
                color: #FF9800;
            }

            /* label focus color */
            .input-field input[type=text]:focus + label {
                color: #FF9800;
            }

            /* label underline focus color */
            .input-field input[type=text]:focus {
                border-bottom: 1px solid #FF9800;
                box-shadow: 0 1px 0 0 #FF9800;
            }

            /* valid color */
            .input-field input[type=text].valid {
                border-bottom: 1px solid #FF9800;
                box-shadow: 0 1px 0 0 #FF9800;
            }

            /* invalid color */
            .input-field input[type=text].invalid {
                border-bottom: 1px solid #FF9800;
                box-shadow: 0 1px 0 0 #FF9800;
            }

            /* icon prefix focus color */
            .input-field .prefix.active {
                color: #FF9800;
            }

            [type="checkbox"]:checked+label:before{
                border-right: 2px solid #FF9800;
                border-bottom: 2px solid #FF9800;
            }

            [type="checkbox"]:checked+label:after{
                border-right: 2px solid #FF9800;
                border-bottom: 2px solid #FF9800;
            }

            .input-field input[type=email]:focus:not([readonly]) {
                border-bottom: 1px solid #FF9800;
                box-shadow: 0 1px 0 0 #FF9800;
            }

            .input-field input[type=email]:focus + label {
                color: #FF9800;
            }

            .input-field input[type=password]:focus + label {
                color: #FF9800;
            }

            input[type=email]:focus:not([readonly]) + label{
                color: #FF9800;
            }

            .input-field input[type=password]:focus:not([readonly]) {
                border-bottom: 1px solid #FF9800;
                box-shadow: 0 1px 0 0 #FF9800;
            }

            .dropdown-content li>a, .dropdown-content li>span{
                color: #FF9800;
            }

            [type="checkbox"].filled-in:checked+label:after{
                background-color: #FF9800;


            }

            [type="checkbox"]:checked+label:before{
                border-right: 2px solid #FF9800;
                border-bottom: 2px solid #FF9800;
                border-right: 2px solid #FF9800;
                border-bottom: 2px solid #FF9800;
            }

            [type="checkbox"].filled-in:checked+label:after{
                border: 2px solid #FF9800;
                background-color: #FF9800;
            }

            body {
                background: url("/images/invitation.jpeg") no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;

            }

            .container{
                background: rgba(255, 255,255,0.90);
                margin-top: 20px;
                padding:20px 25px 20px;
                border-radius: 3px;
            }

            #invitation-form{
                border-radius: 4px;
            }

            #extras{
                display: none;
            }

            textarea.materialize-textarea:focus:not([readonly])+label{
                color:#FF9800;
            }

            .switch label input[type=checkbox]:checked+.lever{
                background-color:#FF9800 ;
            }

            .switch label input[type=checkbox]:checked+.lever:after{
                background-color:#FF9800 ;
            }
        </style>
    </head>
    <body>
        <nav class="default-primary-color">
            <div class="nav-wrapper">
                <div class="row">
                    <div class="col s12 m12 l12 center">
                        <a href="{{url('/')}}" class="waves-effect grey-text center"><b class="white-text">Weekindu</b></a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container center" id="main">
            <h5 class="orange-text center">
                Hello, <span class="light-green-text">{{ $event->user->first_name.' '.$event->user->last_name }}</span>
                invites you to
                <strong>{{ $event->title }}</strong>
            </h5>

            <p>
                <div class="center">{{ $event->description }}</div>
                <hr>
                <p class="center">
                    A
                    @if(!empty($event->type))
                        <strong class="light-green-text">{{ $event->type }}</strong>
                    @else
                        <strong>{{ $event->title }}</strong>
                    @endif

                    @if(!empty($event->date))
                        that takes place on
                        <strong class="light-green-text">{{ $event->date }}</strong>
                    @endif

                    @if(!empty($event->location_string))
                        at
                        <strong>{{ $event->location_string }}</strong>
                    @endif
                </p>

                @if(!empty($event->location_x))
                    <div id="google-map"
                         style="height:380px;"></div>
                @endif
            </p>

            <button class="btn light-green" id="start-button">I want to come</button>
        </div>

        <div class="container center" id="invitation-form">
            <button class="btn light-green" id="show-event-button">Show event</button>

            <form action="{{ url('/invitation') }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="invitation_code" value="{{ $event->invitation_code }}">
                <div class="row">
                    <div class="input-field col offset-l3 offset-m3 offset-s3 l6 m6 s6">
                        <input id="guest-name"
                               type="text"
                               class="validate"
                               name="guest_name"
                               maxlength="80"
                               required>
                        <label for="guest-name">Your Name</label>
                    </div>
                </div>
                <div class="switch">
                    <label>
                        I will not attend
                        <input type="checkbox"
                               class="filled-in"
                               id="accept-field"
                               name="accepted"/>
                        <span class="lever"></span>
                        I will attend
                    </label>
                </div>
                <div id="extras">
                    @if($event->extras)
                        @foreach($event->extras as $extra)
                            <div class="input-field row ">
                                <select class="extras-select-field col offset-s1 offset-m1 offset-l1 s10 m10 l10" multiple>
                                    <option disabled selected>{{ $extra->key }}</option>
                                    @foreach($extra->values as $value)
                                        <option value="{{ $value->value }}" class="extras-option">{{ $value->value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="input-field">
                    <input type="submit" class="btn light-green">
                </div>
            </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#accept-field').on('change', function (){
                    var isChecked = $(this).is(':checked');
                    if(isChecked === false){
                        $('#decline').show('slow');
                        $('#extras').hide('slow');
                    }
                    else{
                        $('#decline').hide('slow');
                        $('#extras').show('slow');
                    }
                });

                $('#start-button').click(function(){
                    $('#main').hide("fast");
                    $('#invitation-form').show("fast");
                });

                $('#show-event-button').click(function(){
                    $('#invitation-form').hide("fast");
                    $('#main').show("fast");
                });

                $('select').material_select();

                var extras = {}; // object that holds extra params

                $('.extras-select-field').on('change', function (event){
                    let selectedValuesJson = $(event.target).val();
                    let fieldName = $(event.target)
                        .children('option:selected:disabled')
                        .text();

                    extras[fieldName] = selectedValuesJson;
                });

                $('#invitation-form').on('submit', function (event){
                    let invitationForm = $(this);
                    let extrasFieldInForm = invitationForm.children('input[name=\'extras\']');
                    let extrasJson = JSON.stringify(extras);

                    if (extrasFieldInForm.length === 0) {
                        // The field doesn't exist in the form

                        let newHiddenField = $('<input>')
                                .attr('type', 'hidden')
                                .attr('name', 'extras')
                                .attr('value', extrasJson); // The hidden field that is going to contain the extras json

                        invitationForm.append(newHiddenField);
                    } else {
                        extrasFieldInForm.attr('value', extrasJson);
                    }
                });
            });

            function initMap() {
                var myLatLng = {lat: Number('{{$event->location_x}}'), lng: Number('{{$event->location_y}}')};
                    console.log(myLatLng);
                var map = new google.maps.Map(document.getElementById('google-map'), {
                    zoom: 15,
                    center: myLatLng,
                    scrollwheel:false
                });

                var marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map,
                    title: 'Hello World!'
                });
            }
        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6WkG6e4Zk1xRfbdo-_I-IvzGv7p5k06M&callback=initMap">
        </script>
    </body>
</html>