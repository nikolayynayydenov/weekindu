{{--<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invitation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
    <link rel="stylesheet" href="/css/materialize/palette.css">
</head>
<body>
<div class="container">
    <h1 class="primary-text-color">Hello, you have been invited to <strong class="secondary-text-color">{{ $event->title }}</strong></h1>

    @if (count($errors->all()) > 0)
        <br><br>
        @foreach ($errors->all() as $error)
            <div id="card-alert" class="card red">
                <div class="card-content white-text">
                    <p><i class="mdi-alert-error"></i> ERROR : {{$error}}</p>
                </div>
            </div>
        @endforeach
    @endif

    <form action="{{ url('/invitation') }}" method="post" id="invitation-form">

        {{ csrf_field() }}

        <input type="hidden"
               name="invitation_code"
               value="{{ $event->invitation_code }}">

        <div class="row">
            <div class="input-field col l6 m12 s12">
                <input id="guest-name"
                       type="text"
                       class="validate"
                       name="guest_name"
                       maxlength="80"
                       required>
                <label for="guest-name">Your Name</label>
            </div>

            <div class="input-field col l6 m12 s12">
                <input id="guest-email"
                       type="email"
                       class="validate"
                       name="guest_email"
                       maxlength="255">
                <label for="guest-name">Your Email</label>
            </div>
        </div>

        <div class="input-field">
            <input type="checkbox"
                   class="filled-in"
                   id="filled-in-box"
                   checked="checked"
                   name="accepted" />
            <label for="filled-in-box">I will come</label>
        </div>

        @if($event->extras)
            @foreach($event->extras as $extra)
                <div class="input-field col s12">
                    <select class="extras-select-field" multiple>
                        <option disabled selected>{{ $extra->key }}</option>
                        @foreach($extra->values as $value)
                            <option value="{{ $value->value }}"
                                    class="extras-option">{{ $value->value }}</option>
                        @endforeach
                    </select>
                </div>
            @endforeach
        @endif

        <div class="input-field">
            <input type="submit" class="btn">
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
<script>
    $(document).ready(function() {
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
</script>
</body>
</html>--}}


<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>{{$event->title}}</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
        <link rel="stylesheet" href="/css/materialize/palette.css">
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <style>
            #map {
                height: 100%;
            }
            #invitation-form{
                display: none;
            }
            .input-field label {
                color: #2196f3;
            }
            /* label focus color */
            .input-field input[type=text]:focus + label {
                color: #2196f3;
            }
            /* label underline focus color */
            .input-field input[type=text]:focus {
                border-bottom: 1px solid #2196f3;
                box-shadow: 0 1px 0 0 #2196f3;
            }
            /* valid color */
            .input-field input[type=text].valid {
                border-bottom: 1px solid #2196f3;
                box-shadow: 0 1px 0 0 #2196f3;
            }
            /* invalid color */
            .input-field input[type=text].invalid {
                border-bottom: 1px solid #2196f3;
                box-shadow: 0 1px 0 0 #2196f3;
            }
            /* icon prefix focus color */
            .input-field .prefix.active {
                color: #2196f3;
            }
            [type="checkbox"]:checked+label:before{
                border-right: 2px solid #2196f3;
                border-bottom: 2px solid #2196f3;
            }
            [type="checkbox"]:checked+label:after{
                border-right: 2px solid #2196f3;
                border-bottom: 2px solid #2196f3;
            }
            .input-field input[type=email]:focus:not([readonly]) {
                border-bottom: 1px solid #2196f3;
                box-shadow: 0 1px 0 0 #2196f3;
            }
            .input-field input[type=email]:focus + label {
                color: #2196f3;
            }
            .input-field input[type=password]:focus + label {
                color: #2196f3;
            }
            input[type=email]:focus:not([readonly]) + label{
                color: #2196f3;
            }
            .input-field input[type=password]:focus:not([readonly]) {
                border-bottom: 1px solid #2196f3;
                box-shadow: 0 1px 0 0 #2196f3;
            }
            .dropdown-content li>a, .dropdown-content li>span{
                color: #2196f3;
            }
            [type="checkbox"].filled-in:checked+label:after{
                background-color: #2196f3;


            }
            [type="checkbox"]:checked+label:before{
                border-right: 2px solid #2196f3;
                border-bottom: 2px solid #2196f3;
                border-right: 2px solid #2196f3;
                border-bottom: 2px solid #2196f3;
            }
            [type="checkbox"].filled-in:checked+label:after{
                border: 2px solid #2196f3;
                background-color: #2196f3;
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

            }
            #invitation-form{
                border-radius: 4px;
            }
            .container-inv{
                border-radius: 5px;
            }
            #decline{
                
            }
            #extras{
                display: none;
            }
            textarea.materialize-textarea:focus:not([readonly])+label{
                color:#2196f3;
            }
            .switch label input[type=checkbox]:checked+.lever{
                background-color:#2196f3 ;
            }
            .switch label input[type=checkbox]:checked+.lever:after{
                background-color:#2196f3 ;

            }
        </style>
    </head>
    <body>
    <nav class="default-primary-color">
        <div class="nav-wrapper">
            <div class="row">
                <div class="col s12 m12 l12 center">
                    <a href="{{url('/')}}" class="waves-effect grey-text center"><b class="blue-text">WeekindU</b></a>
                </div>
            </div>
        </div>
    </nav>
    <div id="main">
        <h1 class="primary-text-color container center container" style="font-size: x-large">Hello, {host} invites you to his {{$event->type}},
            <strong class="">{{ $event->title }}</strong>
        </h1>

        @if (count($errors) > 0)
            <ul class="collection danger-color">
                @foreach ($errors->all() as $error)
                    <li class="collection-item">{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="container">
            <div class="container-fluid" id="google-map" style="height:380px;"></div>
            <div class="row">
                <div class="col s12 m12 l12 center">
                    <div class="card-panel blue">
                        <span class="white-text">{{$event->date}}</span>
                    </div>
                </div>
                <div class="col s12 m12 l12 center">
                    <div class="card-panel white">
                        <span class="blue-text">{{$event->description}}</span>
                    </div>
                </div>
                <div class="col">
                    <h5 class="blue-text">Reccommended dress code:</h5>
                    <div class="row">
                        <div class="col s12 m6">
                            <div class="card hoverable center-on-small-only">
                                <div class="card-image">
                                    @if($event->dress_code === 'Street Wear')
                                        <img class="responsive-img" src="/images/create-event/dress-code/streetwear.jpg">
                                    @elseif($event->dress_code === 'Casual')
                                        <img src="/images/create-event/dress-code/casual.jpg">
                                    @elseif($event->dress_code === 'Buisiness Casual')
                                        <img src="/images/create-event/dress-code/buisinesscasual.jpg">
                                    @elseif($event->dress_code === 'Smart Casual')
                                        <img src="/images/create-event/dress-code/smartcasual.jpg">
                                    @elseif($event->dress_code === 'Formal')
                                        <img src="/images/create-event/dress-code/formal.jpg">
                                    @else($event->type === 'Camp')
                                        <img src="/images/paramsimages/dresscode.jpg">
                                    @endif
                                </div>

                                <div class="card-content">
                                    <div class="row">
                                        <p class="center">
                                            <strong class="center blue-text">{{ $event->dress_code }}</strong><br>
                                        <div class="divider"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6 center">{host} asks you to fill some polls about your tastes.Please click the button below to start.<br>
                            <button class="btn blue" id="start-button">Start</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="center">
        <div class="card-panel blue">
                      <span class="white-text">Enter your name and choose an option.Then fill all the fields.
                      </span>
        </div>
    </div>
    <div class="container container-inv center">
    <form action="{{ url('/invitation') }}" method="post" id="invitation-form">
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
        <div id="decline">
            <div class="card-panel blue center s12 m3 l3">
                      <span class="white-text">Please type why you are not going to attend
                      </span>
                </div>
            <label for="decline">
                <textarea style="border-bottom: 1px solid #2196f3"
                      placeholder="E.g I have a meeting"
                      id="decline"
                      class="materialize-textarea"
                      name="why-decline"
                      form="invitation-form"
                      required></textarea>
            </label>

        </div>
        <div class="input-field">
            <input type="submit" class="btn blue">
        </div>
    </form>
</div>



    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#accept-field').on('change', function (){
                var isChecked = $(this).is(':checked');
                if(isChecked ===false){
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
                center: myLatLng
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

{{--<div class="input-field col l6 m12 s12">
                    <input id="guest-email"
                           type="email"
                           class="validate"
                           name="guest_email"
                           maxlength="255">
                    <label for="guest-name">Your Email</label>
                </div>--}}