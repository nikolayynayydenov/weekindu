<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invitation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
    <link rel="stylesheet" href="/css/materialize/palette.css">
    <style>
        .invitation-check{
            display: none;
        }
        .music{
            display: none;
        }
        .food{
            display: none;
        }
        .drinks{
            display: none;
        }
        .extras{
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="primary-text-color">Hello, you have been invited to <strong class="secondary-text-color">{{ $event->title }}</strong></h1>

        <form action="{{ url('/invitation') }}" method="post" id="invitation-form">
            {{ csrf_field() }}

            <div class="row name center">
                <h2>Before we continue, please enter your name and check if you are going to attend.</h2>
                <div class="input-field col l12 m12 s12">
                    <input id="guest-name"
                           type="text"
                           class="validate"
                           name="guest_name"
                           maxlength="80"
                           required>
                    <label for="guest-name">Your Name</label>
                </div>

                <a class="btn name-button">Next</a>
            </div>
                {{--<div class="input-field col l6 m12 s12">
                    <input id="guest-email"
                           type="email"
                           class="validate"
                           name="guest_email"
                           maxlength="255"
                           required>
                    <label for="guest-name">Your Email</label>
                </div>--}}


            <div class="input-field center invitation-check">
                <h2>Are you going to attend?</h2>

                <input type="checkbox"
                       class="filled-in"
                       id="filled-in-box"

                       name="accepted" />
                <label for="filled-in-box">I will come</label>
                <a class="btn check-button">Next</a>
            </div>

            @if($event->music)
                <div class="input-field col l12 m12 s12 music">
                    <h2>What music do you like?</h2>

                    <select name="music" multiple>
                        <option value="" disabled selected>Choose music</option>
                        @foreach($event->music as $music)
                            <option value="{{ $music }}">{{ $music }}</option>
                        @endforeach
                    </select>
                    <a class="btn music-button">Next</a>

                </div>
            @endif

            @if($event->food)
                <div class="input-field col l4 m4 s12 food">
                    <h2>What would you like to eat?</h2>
                    <select name="food" multiple>
                        <option value="" disabled selected>Choose food</option>
                        @foreach($event->food as $food)
                            <option value="{{ $food }}">{{ $food }}</option>
                        @endforeach
                    </select>
                    <a class="btn food-button">Next</a>

                </div>
            @endif

            @if($event->drinks)
                <div class="input-field col l12 m12 s12 drinks">
                    <h2>What would you like to drink?</h2>
                    <select name="drinks" multiple>
                        <option value="" disabled selected>Choose drinks</option>
                        @foreach($event->drinks as $drink)
                            <option value="{{ $drink }}">{{ $drink }}</option>
                        @endforeach
                    </select>
                    <a class="btn drink-button">Next</a>

                </div>
            @endif
            <div class="">
            @if($event->extras)

                @foreach($event->extras as $extra)
                    <div class="input-field col l4 m4 s12">
                        <select class="extras-select-field" multiple>
                            <option value="{{ $extra->key }}" disabled selected>{{ $extra->key }}</option>
                            @foreach($extra->values as $value)
                                <option value="{{ $value->value }}"
                                        class="extras-option">{{ $value->value }}</option>
                            @endforeach
                        </select>
                    </div>
                @endforeach
                </div>
            @endif

            {{--<div class="input-field">
                <input type="submit" class="btn">
            </div>--}}
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
    <script>
        $(document).ready(function (){
            $('select').material_select();
            $('.name-button').click(function() {
               $('.name').hide('slow');
                $('.invitation-check').show('slow');
            });
            $('.check-button').click(function() {
                $('.invitation-check').hide('slow');
                $('.music').show('slow');
            });
            $('.music-button').click(function() {
                $('.music').hide('slow');
                $('.food').show('slow');
            });
            $('.food-button').click(function() {
                $('.food').hide('slow');
                $('.drinks').show('slow');
            });
            $('.drink-button-button').click(function() {
                $('.drinks').hide('slow');
                $('.extras').show('slow');
            });
        });

    </script>
</body>
</html>