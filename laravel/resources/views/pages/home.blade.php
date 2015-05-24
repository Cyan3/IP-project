@extends('modul_app')

@section('header')
    <ul class="list-inline">
        <li class="selected-menu"><a href="home">Home</a></li>
        <li><a href="{{ url('/modul1') }}">Modul 1</a></li>
        <li><a href="{{ url('/modul2') }}">Modul 2</a></li>
        <li><a href="{{ url('/modul3') }}">Modul 3</a></li>
        <li><a href="{{ url('/punctaje') }}">Punctaje</a>
    </ul>
@stop
@section('contenter')
    <div class="jumbotron">
        <h1> Felicitari v-ati logat cu succes!</h1>
        <p>Acum puteti trece la pasii urmatori!</p>
        <p><a class="btn btn-primary btn-lg" href="{{ url('/modul1') }}" role="button">Learn more</a></p>
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