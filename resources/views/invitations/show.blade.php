<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invitation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
</head>
<body>
    <div class="container">
        <form action="{{ url('/invitation') }}" method="post">
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
                           maxlength="255"
                           required>
                    <label for="guest-name">Your Email</label>
                </div>
            </div>

            <div class="input-field">
                <input type="checkbox" class="filled-in" id="filled-in-box" checked="checked" />
                <label for="filled-in-box">I will come</label>
            </div>

            @if($event->music)
                <div class="input-field col l4 m4 s12">
                    <select multiple>
                        <option value="" disabled selected>Choose music</option>
                        @foreach($event->music as $music)
                            <option value="{{ $music }}">{{ $music }}</option>
                        @endforeach
                    </select>
                </div>
            @endif

            @if($event->food)
                <div class="input-field col l4 m4 s12">
                    <select multiple>
                        <option value="" disabled selected>Choose food</option>
                        @foreach($event->food as $food)
                            <option value="{{ $food }}">{{ $food }}</option>
                        @endforeach
                    </select>
                </div>
            @endif

            @if($event->drinks)
                <div class="input-field col l4 m4 s12">
                    <select multiple>
                        <option value="" disabled selected>Choose drinks</option>
                        @foreach($event->drinks as $drink)
                            <option value="{{ $drink }}">{{ $drink }}</option>
                        @endforeach
                    </select>
                </div>
            @endif

            @if($event->extras)
                @foreach($event->extras as $name => $extra)
                    <div class="input-field col l4 m4 s12">
                        <select multiple>
                            <option value="" disabled selected>Choose {{ $name }}</option>
                            @foreach($extra as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
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
        $('select').material_select();
    </script>
</body>
</html>