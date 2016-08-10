@extends('layouts.app')
@section('content')

    <link rel="stylesheet" href="/css/custom/chooseparams.css">


    <div class="row">
        <div class="col offset-s2">
            <div class="card-panel  action">
          <span>On this page you see diffrent event parameters.You have to choose some or all of them.If you choose a parameter you will then be asked to additionaly import data for the particular parameter.
          </span>
            </div>
        </div>
    </div>

    <div class="row z-depth-5 main-row">
        <div class="col offset-l1 s4 m2">
            <div class="card small hoverable on">
                <div class="card-image">
                    <img class="responsive-img" src="/public/images/paramsImages/dresscode.jpg">
                    <span class="card-title">Dress Code</span>
                </div>
                <div class="card-content">
                    <p>If you choose this as one of your parameters, you will be asked about the dress code of the event so later when the guests will be informed</p>
                </div>

            </div>
        </div>



        <div class="col offset-l2 s4 m2">
            <div class="card small hoverable">
                <div class="card-image">
                    <img src="/public/images/paramsImages/food.jpg">
                    <span class="card-title">Foods</span>
                </div>
                <div class="card-content">
                    <p>If you choose this as one of your parameters, you will be asked about the availible foods from which your guests will be able to choose from</p>
                </div>

            </div>
        </div>


        <div class="col offset-l2 s4 m2">
            <div class="card small hoverable">
                <div class="card-image">
                    <img src="/public/images/paramsImages/drinks.jpg">
                    <span class="card-title">Drinks</span>
                </div>
                <div class="card-content">
                    <p>If you choose this as one of your parameters, you will be asked about the availible drinks from which your guests will be able to choose from</p>

                </div>
            </div>

        </div>
    </div>
    <div class="row z-depth-5 main-row">
        <div class="col offset-l1 s4 m2">
            <div class="card small hoverable on">
                <div class="card-image">
                    <img class="responsive-img" src="/public/images/paramsImages/music.jpg">
                    <span class="card-title">Music</span>
                </div>
                <div class="card-content">
                    <p>If you are not sure what your guests listen to, you can choose this parameter. This way you will know what playlist to prepare</p>
                </div>

            </div>
        </div>



        <div class="col offset-l2 s4 m2">
            <div class="card small hoverable">
                <div class="card-image">
                    <img src="/public/images/paramsImages/location.gif">
                    <span class="card-title">TODO</span>
                </div>
                <div class="card-content">
                    <p>TODO</p>
                </div>

            </div>
        </div>


        <div class="col offset-l2 s4 m2">
            <div class="card small hoverable">
                <div class="card-image">
                    <img src="images/paramsImages/wat.jpg">
                    <span class="card-title">Location</span>
                </div>
                <div class="card-content">
                    <p>If you click here you will be able to make your own parameter</p>
                </div>
            </div>

        </div>
    </div>
<div class="row">
    <div class="col offset-l5">
    <button class="btn waves-effect waves-light btn-large" type="button" name="action" onclick="location.href='create'">Next
        <i class="material-icons right">send</i>
    </button>
    </div>
</div>


@endsection
