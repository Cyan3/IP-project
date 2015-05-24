<?php
// copy file content into a string var
$json_file = file_get_contents('json/modul1.json');
$json_file2 = file_get_contents('json/modul2.json');
// convert the string to a json object
$jfo = json_decode($json_file);
$jfo2 = json_decode($json_file2);

$publics = $jfo->publications;
$publics2 = $jfo2->publications;
if (isset($_GET['execJAR'])){
    chdir('C:\wamp\www\Back-End\laravel\public\grupa2');
    exec('java -jar modul2.jar input.json');
}

?>
@extends('modul_app')
@section('header')
    <ul class="list-inline">
        <li><a href="modul1">Modul 1</a></li>
        <li class="selected-menu"><a href="modul2">Modul 2</a></li>
        <li><a href="modul3">Modul 3</a></li>
        <li><a href="#">Punctaje</a>
    </ul>
@stop

@section('contenter')
    <div class="row">
        <div id="steps" class="col-md-12">
            <div class="step col-md-3">
                <div class="number">1</div>
                <div class="line"></div>
            </div>
            <div class="step active col-md-3">
                <div class="number">2</div>
                <div class="line"></div>
            </div>
            <div class="step col-md-3">
                <div class="number">3</div>
                <div class="line"></div>
            </div>
            <div class="step col-md-3">
                <div class="number">4</div>
                <div class="line"></div>
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
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    foreach($publics as $pub){
                        echo "<tr>";
                        echo "<td>".$pub->year."</td>";
                        echo "<td>".$pub->title."</td>";
                        echo "<td>".$pub->isbn."</td>";
                        echo "<td>".$pub->issn."</td>";
                        echo "<td>";
                        foreach($pub->autori as $auth)
                            echo $auth.", ";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>

        <div id="execut-mod-2" class="col-md-12">
            <button id="execBTN" type="button"  onclick="executeJAR()" class="btn btn-primary btn-lg">Executa</button>
        </div>
        <div id="output-mod-2" class="col-md-12">
            <div id="tab2" class="row">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Year</th>
                        <th>Title</th>
                        <th>ISBN</th>
                        <th>ISSN</th>
                        <th>AUTHORS</th>
                        <th>INDEXED</th>
                        <th>CITATIONS</th>
                        <th>REFERENCES</th>

                    </tr>
                    </thead>

                    <tbody>
                    <?php


                    foreach($publics2 as $pub){
                        $publ = \App\Publication::create([
                                'usr_id' => Auth::user()->id,
                                'name' => $pub->title,
                                'yearReleased' => $pub->year,
                                'isbn' => (int)$pub->isbn,
                                'issn' => (int)$pub->issn,
                                'score' => 0,
                                'categoryScore' => 0
                        ]);

                        echo "<tr>";
                        echo "<td>".$pub->year."</td>";
                        echo "<td>".$pub->title."</td>";
                        echo "<td>".$pub->isbn."</td>";
                        echo "<td>".$pub->issn."</td>";
                        echo "<td>";
                        foreach($pub->authors as $auth){
                            echo $auth.", ";
                            \App\PubAuthor::create([
                                    'pub_id' => $publ->id,
                                    'name' => $auth
                            ]);
                        }

                        echo "</td>";
                        echo "<td>".$pub->indexed."</td>";



                    }
                    ?>

                    </tbody>
                </table>
            </div>

        </div>
        <div class="col-md-12" id="next-mod-btn">
            <a type="button" class="btn btn-primary btn-lg" href="modul3">Next <i class="glyphicon glyphicon-chevron-right"></i></a>
        </div>

        <div id="spinner" style="z-index: 999; display: none; background-color: black; opacity: 0.4; position: fixed; width: 100%; top:0; left:0; height: 1000px; text-align: center; padding-top: 200px;"><i class="fa fa-spinner fa-pulse" style="color: white; font-size: 30px;"></i></div>
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