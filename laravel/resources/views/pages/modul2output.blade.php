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
                <div class="col-md-12 public-modul2-exec">
                    <div class="col-md-12 public-modul2-header">
                        <div class="col-md-3 text-center"><p>Title</p></div>
                        <div class="col-md-1 text-center"><p>Authors</p></div>
                        <div class="col-md-1 text-center"><p>CitiSeer</p></div>
                        <div class="col-md-1 text-center"><p>DBLP</p></div>
                        <div class="col-md-1 text-center"><p>Scholar</p></div>
                        <div class="col-md-1 text-center"><p>Scopus</p></div>
                        <div class="col-md-1 text-center"><p>NrScopus</p></div>
                        <div class="col-md-1 text-center"><p>NrDBLP</p></div>
                        <div class="col-md-1 text-center"><p>NrScholar</p></div>
                        <div class="col-md-1 text-center"><p>NrScopus</p></div>
                    </div>
                </div>
                <div class="col-md-12 public-modul2-body">
                    <?php
                    $pubs = App::make('\App\Http\Controllers\modul2Controller')->getPubFromBD();
                    foreach ($pubs as $pub) {
                        echo '<div id="pub-id-'.$pub->id.'" class="col-md-12 publication">';
                        echo '<div class="col-md-3 pub-title">';
                            echo $pub->title;
                        echo '</div>';
                        echo '<div class="col-md-1 pub-authors">';
                            $authors = App::make('\App\Http\Controllers\modul2Controller')->getAuthors($pub->id);
                            foreach ($authors as $author) {
                                echo $author->name . ', ';
                            }
                        echo '</div>';
                        echo '<div class="col-md-1 pub-is-citiseer">';
                            echo App::make('\App\Http\Controllers\modul2Controller')->isInDB($pub->i_citiseer);
                        echo '</div>';
                        echo '<div class="col-md-1 pub-is-dblp">';
                            echo App::make('\App\Http\Controllers\modul2Controller')->isInDB($pub->i_dblp);
                        echo '</div>';
                        echo '<div class="col-md-1 pub-is-scholar">';
                            echo App::make('\App\Http\Controllers\modul2Controller')->isInDB($pub->i_scholar);
                        echo '</div>';
                        echo '<div class="col-md-1 pub-is-scopus">';
                            echo App::make('\App\Http\Controllers\modul2Controller')->isInDB($pub->i_scopus);
                        echo '</div>';

                        echo '<div class="col-md-1 pub-nr-citiseer">';
                            echo '<button class="btn btn-default" data-pub="'.$pub->id.'" data-db="citiseer">';
                                echo App::make('\App\Http\Controllers\modul2Controller')->getNrCit($pub, 'CitiSeer');
                            echo '</button>';
                        echo '</div>';
                        echo '<div class="col-md-1 pub-nr-dblp">';
                            echo '<button class="btn btn-default" data-pub="'.$pub->id.'" data-db="dblp">';
                                echo App::make('\App\Http\Controllers\modul2Controller')->getNrCit($pub, 'DBLP');
                            echo '</button>';
                        echo '</div>';
                        echo '<div class="col-md-1 pub-nr-scholar">';
                            echo '<button class="btn btn-default" data-pub="'.$pub->id.'" data-db="scholar">';
                                echo App::make('\App\Http\Controllers\modul2Controller')->getNrCit($pub, 'Scholar');
                            echo '</button>';
                        echo '</div>';
                        echo '<div class="col-md-1 pub-nr-scopus">';
                            echo '<button class="btn btn-default" data-pub="'.$pub->id.'" data-db="scopus">';
                                echo App::make('\App\Http\Controllers\modul2Controller')->getNrCit($pub, 'Scopus');
                            echo '</button>';
                        echo '</div>';
                        echo '</div>';
                        $citiseer = App::make('\App\Http\Controllers\modul2Controller')->getCitFromBD($pub, 'CitiSeer');
                        $dblp = App::make('\App\Http\Controllers\modul2Controller')->getCitFromBD($pub, 'DBLP');
                        $scholar = App::make('\App\Http\Controllers\modul2Controller')->getCitFromBD($pub, 'Scholar');
                        $scopus = App::make('\App\Http\Controllers\modul2Controller')->getCitFromBD($pub, 'Scopus');

                        echo '<div class="col-md-12 publication-citations">';
                            echo '<div id="cit-of-pub-id-'.$pub->id.'-citiseer" class="col-md-12 pub-citation pub-citation-citiseer">';
                                if (count($citiseer) == 0) {
                                    echo '<div class="col-md-12">';
                                    echo '<h3>Nu exista citatii in baza de date CitiSeer</h3>';
                                    echo '</div>';
                                } else {
                                    echo '<div class="col-md-12 publication-citations-header">
                                            <div class="col-md-3 text-center"><p>Titlu</p></div>
                                            <div class="col-md-3 text-center"><p>Autori</p></div>
                                            <div class="col-md-3 text-center"><p>Locatia</p></div>
                                          </div>';
                                    echo '<div class="col-md-3 publication-citations-body">';
                                        foreach ($citiseer as $cit) {
                                            echo '<div class="col-md-3 text-center">' . $cit->name . '</div>';
                                            $citAuthors = App::make('\App\Http\Controllers\modul2Controller')->getCitAuthor($cit->id);
                                            echo '<div class="col-md-3 text-center">';
                                            foreach ($citAuthors as $citAuthor) {
                                                echo $citAuthor->name . ', ';
                                            }
                                            echo '</div>';
                                            echo '<div class="col-md-3 text-center">' . $cit->location . '</div>';

                                        }
                                    echo '</div>';
                                }
                            echo '</div>';
                            echo '<div id="cit-of-pub-id-'.$pub->id.'-dblp" class="col-md-12 pub-citation pub-citation-dblp">';
                                if (count($dblp) == 0) {
                                    echo '<div class="col-md-12">';
                                    echo '<h3>Nu exista citatii in baza de date DBLP</h3>';
                                    echo '</div>';
                                } else {
                                    echo '<div class="col-md-12 publication-citations-header">
                                            <div class="col-md-3 text-center"><p>Titlu</p></div>
                                            <div class="col-md-3 text-center"><p>Autori</p></div>
                                            <div class="col-md-3 text-center"><p>Locatia</p></div>
                                          </div>';
                                    echo '<div class="col-md-3 publication-citations-body">';
                                    foreach ($dblp as $cit) {
                                        echo '<div class="col-md-3 text-center">' . $cit->name . '</div>';
                                        $citAuthors = App::make('\App\Http\Controllers\modul2Controller')->getCitAuthor($cit->id);
                                        echo '<div class="col-md-3 text-center">';
                                        foreach ($citAuthors as $citAuthor) {
                                            echo $citAuthor->name . ', ';
                                        }
                                        echo '</div>';
                                        echo '<div class="col-md-3 text-center">' . $cit->location . '</div>';
                                    }
                                    echo '</div>';
                                }
                            echo '</div>';
                            echo '<div id="cit-of-pub-id-'.$pub->id.'-scholar" class="col-md-12 pub-citation pub-citation-scholar">';
                                if (count($scholar) == 0) {
                                    echo '<div class="col-md-12">';
                                    echo '<h3>Nu exista citatii in baza de date Google Scholar</h3>';
                                    echo '</div>';
                                } else {
                                    echo '<div class="col-md-12 publication-citations-header">
                                            <div class="col-md-3 text-center"><p>Titlu</p></div>
                                            <div class="col-md-3 text-center"><p>Autori</p></div>
                                            <div class="col-md-3 text-center"><p>Locatia</p></div>
                                          </div>';
                                    echo '<div class="col-md-3 publication-citations-body">';
                                        foreach ($scholar as $cit) {
                                            echo '<div class="col-md-3 text-center">' . $cit->name . '</div>';
                                            $citAuthors = App::make('\App\Http\Controllers\modul2Controller')->getCitAuthor($cit->id);
                                            echo '<div class="col-md-3 text-center">';
                                            foreach ($citAuthors as $citAuthor) {
                                                echo $citAuthor->name . ', ';
                                            }
                                            echo '</div>';
                                            echo '<div class="col-md-3 text-center">' . $cit->location . '</div>';

                                        }
                                    echo '</div>';
                                }
                            echo '</div>';
                            echo '<div id="cit-of-pub-id-'.$pub->id.'-scopus" class="col-md-12 pub-citation pub-citation-scopus">';
                                if (count($scopus) == 0) {
                                    echo '<div class="col-md-12">';
                                    echo '<h3>Nu exista citatii in baza de date Scopus</h3>';
                                    echo '</div>';
                                } else {
                                    echo '<div class="col-md-12 publication-citations-header">
                                            <div class="col-md-3 text-center"><p>Titlu</p></div>
                                            <div class="col-md-3 text-center"><p>Autori</p></div>
                                            <div class="col-md-3 text-center"><p>Locatia</p></div>
                                          </div>';
                                    echo '<div class="col-md-3 publication-citations-body">';
                                        foreach ($scopus as $cit) {
                                            echo '<div class="col-md-3 text-center">' . $cit->name . '</div>';
                                            $citAuthors = App::make('\App\Http\Controllers\modul2Controller')->getCitAuthor($cit->id);
                                            echo '<div class="col-md-3 text-center">';
                                            foreach ($citAuthors as $citAuthor) {
                                                echo $citAuthor->name . ', ';
                                            }
                                            echo '</div>';
                                            echo '<div class="col-md-3 text-center">' . $cit->location . '</div>';
                                        }
                                    echo '</div>';
                                }

                            echo '</div>';

                        echo '</div>';
                    }

                    ?>
                </div>

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