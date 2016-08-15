<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>404 Error Page</title>
    <!-- For Windows Phone -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
    <link rel="stylesheet" href="/css/materialize/page-center.css">
    <link rel="stylesheet" href="/css/materialize/style_1.css">

</head>

<body class="cyan">
<div id="error-page">
    <div class="row">
        <div class="col s12">
            <div class="browser-window">
                <div class="top-bar">
                    <div class="circles">
                        <div id="close-circle" class="circle"></div>
                        <div id="minimize-circle" class="circle"></div>
                        <div id="maximize-circle" class="circle"></div>
                    </div>
                </div>
                <div class="content">
                    <div class="row">
                        @yield('error_message')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>