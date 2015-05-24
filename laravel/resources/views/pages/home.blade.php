@extends('basic')

@section('header')
    <div id="header" class="container">
        <div class="row">
            <div id="menu" class="col-md-12">
                <div class="nav col-md-6">
                    <ul class="list-inline">
                        <li class="selected-menu"><a href="home">Home</a></li>
                        <li><a href="modul1">Modul 1</a>
                        <li><a href="modul2">Modul 2</a></li>
                        <li><a href="modul3">Modul 3</a></li>
                        <li><a href="punctaje">Punctaje</a></li>
                    </ul>
                </div>
                <div id="user-menu" class="col-md-6">


                    <div class="dropdown user-menu">
                        <div class="user-name">John Doe</div>
                        <button class="user-img dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"
                                aria-expanded="true">

                            <img src="img/avatar.png">
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <li class="user-menu-item" role="presentation"><a role="menuitem" tabindex="-1" href="editare">Editare
                                    profil</a></li>
                            <li class="user-menu-item" role="presentation"><a role="menuitem" tabindex="-1" href="auth/logout">Iesire</a>
                            </li>
                        </ul>
                    </div>


                </div>

            </div>
        </div>
    </div>
@stop
@section('contenter')




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