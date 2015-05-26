
@extends('modul_app')
@section('header')
    <ul class="list-inline">
        <li><a href="home">Home</a></li>
        <li><a href="{{ url('/modul1') }}">Modul 1</a></li>
        <li><a href="{{ url('/modul2') }}">Modul 2</a></li>
        <li class="selected-menu"><a href="{{ url('/modul3') }}">Modul 3</a></li>
        <li><a href="{{ url('/punctaje') }}">Punctaje</a>
    </ul>
@stop

@section('contenter')

    <div class="row">
        <div id="steps" class="col-md-12">
            <div class="step col-md-3">
                <div class="number">1</div>
                <div class="line"></div>
            </div>
            <div class="step col-md-3">
                <div class="number">2</div>
                <div class="line"></div>
            </div>
            <div class="step active col-md-3">
                <div class="number">3</div>
                <div class="line"></div>
            </div>
            <div class="step col-md-3">
                <div class="number">4</div>
                <div class="line"></div>
            </div>
        </div>


        <!--<form action="welcome.php" method="post">
            Name: <input type="text" name="name"><br>
            E-mail: <input type="text" name="email"><br>
            <input type="submit">
        </form>-->



        </div>
        {!!Form::open()!!}
        <div id="execut" class="col-md-12">
            <div class="from-group">
                {!! Form::submit('Calculeaza', array('class'=>'btn btn-primary'))!!}
            </div>
        </div>
        {!!Form::close()!!}

    </div>
@stop

@section('Yfooter')
    <div class="row">
        <ul class="list-inline col-md-7">
            <li><a href="#">Despre Proiect</a>
            <li><a href="#">Creatori</a></li>
            <li><a href="#">Punctaje</a></li>
        </ul>
        <div class="rights">© 2015 – Toate drepturile sunt rezervate.</div>
    </div>
@stop