@extends('layouts.app')
@section('content')
    <link href="/images/icons/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />
 <style>
     body {
         background-color: #ffffff;
     }
 </style>
<body>
<div class="container">
    <div class="row center">
<h1 class="orange-text center-align">Meet the team</h1>
        <div class="divider"></div>
    </div>
        <div class="row center">
    <div class="col m4 s12 l4 center-align">
        <img class="materialboxed circle responsive-img" width="400" src="/images/about-us/yovchobe.jpg">
        <div class="center">
            <strong style="font-size: 30px">Yovcho Kalev</strong><br>
            <strong style="font-size: 15px">Design,Front-end</strong><br>
            <a href="https://facebook.com/YovchoKalev">
                <img src="/images/icons/facebook.png"/></a>
            <a href="https://github.com/YovchoKalev">
                <img src="/images/icons/github.png"/></a>
            <a href="https://www.instagram.com/kalevbaby/">
            <img src="/images/icons/instagram.png"/></a>
        </div>

    </div>
    <div class="col m4 s12 l4 ">
        <img class="materialboxed circle responsive-img" width="400" src="/images/about-us/niki.jpg">
        <div class="center">
            <strong style="font-size: 30px">Nikolay Naydenov</strong><br>
            <strong style="font-size: 15px">Full-stack </strong><br>
            <a href="https://facebook.com/profile.php?id=100009002676266">
                <img src="/images/icons/facebook.png"/></a>
            <a href="https://github.com/nikolayynayydenov">
                <img src="/images/icons/github.png"/></a>
            <a href="https://www.linkedin.com/in/sevgin-mustafov-712bbbb9">
                <img src="/images/icons/linkedin.png"/></a>
        </div>
    </div>
    <div class="col m4 s12 l4 ">
        <img class="materialboxed circle responsive-img" width="400" src="/images/about-us/sevgito.jpg">
        <div class="center">
            <strong style="font-size: 30px">Sevgin Mustafov</strong><br>
            <strong style="font-size: 15px">Back-end</strong><br>
            <a href="https://www.facebook.com/Sevgin.Mustafov.1">
                <img src="/images/icons/facebook.png"/></a>
            <a href="https://github.com/sMustafov">
                <img src="/images/icons/github.png"/></a>
            <a href="https://www.linkedin.com/in/sevgin-mustafov-712bbbb9">
                <img src="/images/icons/linkedin.png"/></a>
        </div>
    </div>
</div>
</div>
</body>
@endsection