
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


        <div id="input-mod-2" class="col-md-12">
            <div class="row">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Year</th>
                        <th>Title</th>
                        <th>Authors</th>
                        <th>SpScore</th>
                        <th>IrScore</th>
                    </tr>
                    </thead>
                        <?php
                            foreach ($pubFromDB as $pub){
                                echo "<tr>";
                                echo "<td>" . $pub->year . "</td>";
                                echo "<td>" . $pub->title . "</td>";
                                echo "<td>";

                                $authors = getAuthors($pub->id);
                                foreach ($authors as $author) {
                                    echo $author->name . ', ';
                                }

                                echo "</td>";

                                echo "<td>" . $pub->spscore . "</td>";
                                echo "<td>" . $pub->irscore . "</td>";
                                echo "</tr>";
                            }
                        ?>
                     </tbody>

                </table>
            </div>
        </div>



    </div>
    {!!Form::open()!!}
    <div id="execut" class="col-md-12">
        <div class="from-group">
            {!! Form::submit('Pasul Urmator', array('class'=>'btn btn-primary'))!!}
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

<?php

function getAuthors($pubId)
{
    $authors = \Illuminate\Support\Facades\DB::table('pubauthors')->where('pub_id', '=', $pubId)->get();
    return $authors;
}


?>