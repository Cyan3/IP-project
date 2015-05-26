@extends('modul_app')
@section('header')
    <ul class="list-inline">
        <li><a href="home">Home</a></li>
        <li><a href="{{ url('/modul1') }}">Modul 1</a></li>
        <li><a href="{{ url('/modul2') }}">Modul 2</a></li>
        <li ><a href="{{ url('/modul3') }}">Modul 3</a></li>
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

        <?php



        foreach ($score as $score_db) {

            $pubFromDB = App::make('\App\Http\Controllers\modul4Controller')->getPubQuerry($score_db->pub_q_id);

            echo '<div id="modul-3" class="col-md-12">';
            echo '<div class="row">';
            echo '<div class="col-md-12 punctaje-finale-exec">';
            echo '<div class="col-md-12 punctaje-table-header">';
            echo '<div class="col-md-1 text-center"><p>Year</p></div>';
            echo '<div class="col-md-7 text-center"><p>Title</p></div>';
            echo '<div class="col-md-2 text-center"><p>Authors</p></div>';
            echo '<div class="col-md-1 text-center"><p>SpScore</p></div>';
            echo '<div class="col-md-1 text-center"><p>IrScore</p></div>';
            echo '</div>';
            echo '</div>';
            echo '<div class="col-md-12 punctaje-table-body">';


            foreach ($pubFromDB as $pub) {
                echo '<div class="col-md-12 text-center table-row">';
                if (is_null($pub->year)) {
                    echo '<div class="col-md-1 text-center"><p>null</p></div>';
                } else {
                    echo '<div class="col-md-1 text-center"><p>' . $pub->year . '</p></div>';
                }
                if (is_null($pub->title)) {
                    echo '<div class="col-md-7 text-center"><p>null</p></div>';
                } else {
                    echo '<div class="col-md-7 text-center"><p>' . $pub->title . '</p></div>';
                }

                echo '<div class="col-md-2 text-center"><p>';

                $authors = getAuthors($pub->id);
                foreach ($authors as $author) {
                    echo $author->name . ', ';
                }

                echo "</p></div>";
                if (is_null($pub->spscore)) {
                    echo '<div class="col-md-1 text-center"><p>null</p></div>';
                } else {
                    echo '<div class="col-md-1 text-center"><p>' . $pub->spscore . '</p></div>';
                }
                if (is_null($pub->irscore)) {
                    echo '<div class="col-md-1 text-center"><p>null</p></div>';
                } else {
                    echo '<div class="col-md-1 text-center"><p>' . $pub->irscore . '</p></div>';
                }
                echo "</div>";
            }

            echo '</div>';

            echo '<h3>Punctaje totale per executie: ' . $score_db->created_at . '</h3>';
            echo '<div class="col-md-12 punctaje-finale-exec">';
            echo '<div class="col-md-12 punctaje-table-header">';
            echo '<div class="col-md-3">';
            echo '<div class="punctaje-col-header col-md-12 text-center">';
            echo '<p>sumByCategoryIR</p>';
            echo '</div>';
            echo '<div class="punctaje-col-sub-header">';
            echo '<div class="col-md-3 text-center">A</div>';
            echo '<div class="col-md-3 text-center">B</div>';
            echo '<div class="col-md-3 text-center">C</div>';
            echo '<div class="col-md-3 text-center">D</div>';
            echo '</div>';
            echo '</div>';
            echo '<div class="col-md-3">';
            echo '<div class="punctaje-col-header col-md-12 text-center">';
            echo '<p>sumIRScore</p>';
            echo '</div>';
            echo '<div class="punctaje-col-sub-header">';
            echo '<div class="col-md-3 text-center">A</div>';
            echo '<div class="col-md-3 text-center">B</div>';
            echo '<div class="col-md-3 text-center">C</div>';
            echo '<div class="col-md-3 text-center">D</div>';
            echo '</div>';
            echo '</div>';
            echo '<div class="col-md-3">';
            echo '<div class="punctaje-col-header col-md-12 text-center">';
            echo '<p>sumSPScore</p>';
            echo '</div>';
            echo '<div class="punctaje-col-sub-header">';
            echo '<div class="col-md-3"></div>';
            echo '<div class="col-md-3"></div>';
            echo '<div class="col-md-3"></div>';
            echo '<div class="col-md-3"></div>';
            echo '</div>';
            echo '</div>';
            echo '<div class="col-md-3">';
            echo '<div class="punctaje-col-header col-md-12 text-center">';
            echo '<p>sumIRScore</p>';
            echo '</div>';
            echo '<div class="punctaje-col-sub-header">';
            echo '<div class="col-md-3"></div>';
            echo '<div class="col-md-3"></div>';
            echo '<div class="col-md-3"></div>';
            echo '<div class="col-md-3"></div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '<div class="col-md-12 punctaje-table-body">';
            echo '<div class="col-md-3">';
            echo '<div class="col-md-12">';



                if (is_null($score_db->sumbycategoryira)) {
                    echo '<div class="col-md-3 text-center"><p>0</p></div>';
                } else {
                    echo '<div class="col-md-3 text-center"><p>' . $score_db->sumbycategoryira . '</p></div>';
                }
                if (is_null($score_db->sumbycategoryirb)) {
                    echo '<div class="col-md-3 text-center"><p>0</p></div>';
                } else {
                    echo '<div class="col-md-3 text-center"><p>' . $score_db->sumbycategoryirb . '</p></div>';
                }
                if (is_null($score_db->sumbycategoryirc)) {
                    echo '<div class="col-md-3 text-center"><p>0</p></div>';
                } else {
                    echo '<div class="col-md-3 text-center"><p>' . $score_db->sumbycategoryirc . '</p></div>';
                }
                if (is_null($score_db->sumbycategoryird)) {
                    echo '<div class="col-md-3 text-center"><p>0</p></div>';
                } else {
                    echo '<div class="col-md-3 text-center"><p>' . $score_db->sumbycategoryird . '</p></div>';
                }


            echo '</div>';
            echo '</div>';
            echo '<div class="col-md-3">';
            echo '<div class="col-md-12">';

                if (is_null($score_db->sumbycategoryspa)) {
                    echo '<div class="col-md-3 text-center"><p>0</p></div>';
                } else {
                    echo '<div class="col-md-3 text-center"><p>' . $score_db->sumbycategoryspa . '</p></div>';
                }
                if (is_null($score_db->sumbycategoryspb)) {
                    echo '<div class="col-md-3 text-center"><p>0</p></div>';
                } else {
                    echo '<div class="col-md-3 text-center"><p>' . $score_db->sumbycategoryspb . '</p></div>';
                }
                if (is_null($score_db->sumbycategoryspc)) {
                    echo '<div class="col-md-3 text-center"><p>0</p></div>';
                } else {
                    echo '<div class="col-md-3 text-center"><p>' . $score_db->sumbycategoryspc . '</p></div>';
                }
                if (is_null($score_db->sumbycategoryspd)) {
                    echo '<div class="col-md-3 text-center"><p>0</p></div>';
                } else {
                    echo '<div class="col-md-3 text-center"><p>' . $score_db->sumbycategoryspd . '</p></div>';
                }

            echo '</div>';
            echo '</div>';
            echo '<div class="col-md-3">';
            echo '<div class="col-md-12">';

                if (is_null($score_db->sumspscore)) {
                    echo '<div class="col-md-3 text-center"><p>0</p></div>';
                } else {
                    echo '<div class="col-md-12 text-center"><p>' . $score_db->sumspscore . '</p></div>';
                }


            echo '</div>';
            echo '</div>';
            echo '<div class="col-md-3">';
            echo '<div class="col-md-12">';

                if (is_null($score_db->sumirscore)) {
                    echo '<div class="col-md-3 text-center"><p>0</p></div>';
                } else {
                    echo '<div class="col-md-12 text-center"><p>' . $score_db->sumirscore . '</p></div>';
                }


            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>


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


?>