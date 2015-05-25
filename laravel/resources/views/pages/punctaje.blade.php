<?php
// copy file content into a string var
$json_file = file_get_contents('json/modul1.json');
$json_file2 = file_get_contents('json/modul2.json');
// convert the string to a json object
$jfo = json_decode($json_file);
$jfo2 = json_decode($json_file2);

$publics = $jfo->publications;
$publics2 = $jfo2->publications;
?>


@extends('modul_app')
@section('header')
    <ul class="list-inline">
        <li><a href="home">Home</a></li>
        <li><a href="{{ url('/modul1') }}">Modul 1</a></li>
        <li><a href="{{ url('/modul2') }}">Modul 2</a></li>
        <li><a href="{{ url('/modul3') }}">Modul 3</a></li>
        <li class="selected-menu"><a href="{{ url('/punctaje') }}">Punctaje</a>
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
            <div class="step col-md-3">
                <div class="number">3</div>
                <div class="line"></div>
            </div>
            <div class="step active col-md-3">
                <div class="number">4</div>
                <div class="line"></div>
            </div>
        </div>
    </div>

    <div id="input-mod-2" class="col-md-12">
        <div class="row">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Year</th>
                    <th>Title</th>
                    <th>ISBN</th>
                    <th>ISSN</th>
                    <th>AUTHORS</th>
                    <th>CITATIONS</th>
                    <th>POINTS</th>
                </tr>
                </thead>

                <tbody>
                <?php
                foreach ($publics as $pub) {
                    echo "<tr>";
                    echo "<td>" . $pub->year . "</td>";
                    echo "<td>" . $pub->title . "</td>";
                    echo "<td>" . $pub->isbn . "</td>";
                    echo "<td>" . $pub->issn . "</td>";
                    echo "<td>";
                    foreach ($pub->autori as $auth)
                        echo $auth . ", ";
                    echo "</td>";
                    echo "<td>13</td>";
                    echo "<td>5</td>";
                    echo "</tr>";
                }
                ?>

                </tbody>
            </table>
        </div>
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