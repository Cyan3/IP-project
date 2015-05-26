<?php


if (isset($_GET['execJAR'])) {
    chdir('C:\wamp\www\Back-End\laravel\public\grupa2');
    exec('java -jar modul2.jar input.json');
}
?>
@extends('modul_app')
@section('header')
    <ul class="list-inline">
        <li><a href="home">Home</a></li>
        <li><a href="{{ url('/modul1') }}">Modul 1</a></li>
        <li class="selected-menu"><a href="{{ url('/modul2') }}">Modul 2</a></li>
        <li><a href="{{ url('/modul3') }}">Modul 3</a></li>
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
                        <th>Title</th>
                        <th>Authors</th>
                        <th>isIndexedCitiSeer</th>
                        <th>isIndexedDBLP</th>
                        <th>isIndexedScholar</th>
                        <th>isIndexedScopus</th>
                        <th>NrScopus</th>
                        <th>NrDBLP</th>
                        <th>NrScholar</th>
                        <th>NrScopus</th>

                    </tr>
                    </thead>

                    <tbody>

                    <?php
                    $pubs = App::make('\App\Http\Controllers\modul2Controller')->getPubFromBD();
                    foreach ($pubs as $pub) {
                        echo '<tr>';
                        echo '<th>';
                        echo $pub->title;
                        echo '</th>';
                        echo '<th>';
                        $authors = App::make('\App\Http\Controllers\modul2Controller')->getAuthors($pub->id);
                        foreach ($authors as $author) {
                            echo $author->name . ', ';
                        }
                        echo '</th>';
                        echo '<th>';
                        echo App::make('\App\Http\Controllers\modul2Controller')->isInDB($pub->i_citiseer);
                        echo '</th>';
                        echo '<th>';
                        echo App::make('\App\Http\Controllers\modul2Controller')->isInDB($pub->i_dblp);
                        echo '</th>';
                        echo '<th>';
                        echo App::make('\App\Http\Controllers\modul2Controller')->isInDB($pub->i_scholar);
                        echo '</th>';
                        echo '<th>';
                        echo App::make('\App\Http\Controllers\modul2Controller')->isInDB($pub->i_scopus);
                        echo '</th>';

                        echo '<th>';
                        echo App::make('\App\Http\Controllers\modul2Controller')->getNrCit($pub, 'CitiSeer');
                        echo '</th>';
                        echo '<th>';
                        echo App::make('\App\Http\Controllers\modul2Controller')->getNrCit($pub, 'DBLP');
                        echo '</th>';
                        echo '<th>';
                        echo App::make('\App\Http\Controllers\modul2Controller')->getNrCit($pub, 'Scholar');
                        echo '</th>';
                        echo '<th>';
                        echo App::make('\App\Http\Controllers\modul2Controller')->getNrCit($pub, 'Scopus');
                        echo '</th>';
                        echo '</tr>';
                        $citiseer = App::make('\App\Http\Controllers\modul2Controller')->getCitFromBD($pub, 'CitiSeer');
                        $dblp = App::make('\App\Http\Controllers\modul2Controller')->getCitFromBD($pub, 'DBLP');
                        $scholar = App::make('\App\Http\Controllers\modul2Controller')->getCitFromBD($pub, 'Scholar');
                        $scopus = App::make('\App\Http\Controllers\modul2Controller')->getCitFromBD($pub, 'Scopus');

                        echo '<tr>';
                        if (count($citiseer) == 0) {
                            echo '<th>';
                            echo 'Nu exista citaii in baza de date CitiSeer';
                            echo '</th>';
                        } else {
                            echo '<tr>
                                                <th>Titlu</th>
                                                <th>Autori</th>
                                                <th>Locatia</th>
                                            </tr>';
                            foreach ($citiseer as $cit) {
                                echo '<th>' . $cit->name . '</th>';
                                $citAuthors = App::make('\App\Http\Controllers\modul2Controller')->getCitAuthor($cit->id);
                                echo '<th>';
                                foreach ($citAuthors as $citAuthor) {
                                    echo $citAuthor->name . ', ';
                                }
                                echo '</th>';
                                echo '<th>' . $cit->location . '</th>';

                            }

                        }


                        echo '</tr>';
                        echo '<tr>';
                        if (count($dblp) == 0) {
                            echo '<th>';
                            echo 'Nu exista citaii in baza de date DBLP';
                            echo '</th>';
                        } else {
                            echo '<tr>
                                                <th>Titlu</th>
                                                <th>Autori</th>
                                                <th>Locatia</th>
                                            </tr>';
                            foreach ($dblp as $cit) {
                                echo '<th>' . $cit->name . '</th>';
                                $citAuthors = App::make('\App\Http\Controllers\modul2Controller')->getCitAuthor($cit->id);
                                echo '<th>';
                                foreach ($citAuthors as $citAuthor) {
                                    echo $citAuthor->name . ', ';
                                }
                                echo '</th>';
                                echo '<th>' . $cit->location . '</th>';

                            }

                        }


                        echo '</tr>';
                        echo '<tr>';
                        if (count($scholar) == 0) {
                            echo '<th>';
                            echo 'Nu exista citaii in baza de date Google Scholar';
                            echo '</th>';
                        } else {
                            echo '<tr>
                                                <th>Titlu</th>
                                                <th>Autori</th>
                                                <th>Locatia</th>
                                            </tr>';
                            foreach ($scholar as $cit) {
                                echo '<th>' . $cit->name . '</th>';
                                $citAuthors = App::make('\App\Http\Controllers\modul2Controller')->getCitAuthor($cit->id);
                                echo '<th>';
                                foreach ($citAuthors as $citAuthor) {
                                    echo $citAuthor->name . ', ';
                                }
                                echo '</th>';
                                echo '<th>' . $cit->location . '</th>';

                            }

                        }


                        echo '</tr>';
                        echo '<tr>';
                        if (count($scopus) == 0) {
                            echo '<th>';
                            echo 'Nu exista citaii in baza de date Scopus';
                            echo '</th>';
                        } else {
                            echo '<tr>
                                                <th>Titlu</th>
                                                <th>Autori</th>
                                                <th>Locatia</th>
                                            </tr>';
                            foreach ($scopus as $cit) {
                                echo '<th>' . $cit->name . '</th>';
                                $citAuthors = App::make('\App\Http\Controllers\modul2Controller')->getCitAuthor($cit->id);
                                echo '<th>';
                                foreach ($citAuthors as $citAuthor) {
                                    echo $citAuthor->name . ', ';
                                }
                                echo '</th>';
                                echo '<th>' . $cit->location . '</th>';
                            }
                        }
                        echo '</tr>';
                    }

                    ?>
                    </tbody>
                </table>
            </div>
        </div>

        {!! Form::open() !!}
        <div id="execut" class="col-md-12">
            <div class="from-group">
                {!! Form::submit('Next', array('class'=>'btn btn-primary'))!!}
            </div>
        </div>
        {!! Form::close() !!}
        <div id="output-mod-2" class="col-md-12">
            <div id="tab2" class="row">

            </div>

        </div>


        <div id="spinner"
             style="z-index: 999; display: none; background-color: black; opacity: 0.4; position: fixed; width: 100%; top:0; left:0; height: 1000px; text-align: center; padding-top: 200px;">
            <i class="fa fa-spinner fa-pulse" style="color: white; font-size: 30px;"></i></div>
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

<?php

function getAuthors($pubId)
{

    $authors = \Illuminate\Support\Facades\DB::table('pubauthors')->where('pub_id', '=', $pubId)->get();
    return $authors;
}


1?>