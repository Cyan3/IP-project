
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


        <div id="modul-3" class="col-md-12">
            <div class="row">
                <div class="col-md-12 punctaje-finale-exec">
                    <div class="col-md-12 punctaje-table-header">
                        <div class="col-md-1 text-center"><p>Year</p></div>
                        <div class="col-md-7 text-center"><p>Title</p></div>
                        <div class="col-md-2 text-center"><p>Authors</p></div>
                        <div class="col-md-1 text-center"><p>SpScore</p></div>
                        <div class="col-md-1 text-center"><p>IrScore</p></div>
                    </div>
                </div>
                <div class="col-md-12 punctaje-table-body">
                        <?php
                            foreach ($pubFromDB as $pub){
                                echo '<div class="col-md-12 text-center table-row">';
                                if(is_null($pub->year)){
                                    echo '<div class="col-md-1 text-center"><p>null</p></div>';
                                }else{
                                    echo '<div class="col-md-1 text-center"><p>'.$pub->year.'</p></div>';
                                }
                                if(is_null($pub->title)){
                                    echo '<div class="col-md-7 text-center"><p>null</p></div>';
                                }else{
                                    echo '<div class="col-md-7 text-center"><p>'.$pub->title.'</p></div>';
                                }

                                echo '<div class="col-md-2 text-center"><p>';

                                    $authors = getAuthors($pub->id);
                                    foreach ($authors as $author) {
                                        echo $author->name . ', ';
                                    }

                                echo "</p></div>";
                                if(is_null($pub->spscore)){
                                    echo '<div class="col-md-1 text-center"><p>null</p></div>';
                                }else{
                                    echo '<div class="col-md-1 text-center"><p>'.$pub->spscore.'</p></div>';
                                }
                                if(is_null($pub->irscore)){
                                    echo '<div class="col-md-1 text-center"><p>null</p></div>';
                                }else{
                                    echo '<div class="col-md-1 text-center"><p>'.$pub->irscore.'</p></div>';
                                }
                                echo "</div>";
                            }
                        ?>
                </div>

                <h3>Punctaje totale per executie</h3>
                <div class="col-md-12 punctaje-finale-exec">
                    <div class="col-md-12 punctaje-table-header">
                        <div class="col-md-3">
                            <div class="punctaje-col-header col-md-12 text-center">
                                <p>sumByCategoryIR</p>
                            </div>
                            <div class="punctaje-col-sub-header">
                                <div class="col-md-3 text-center">A</div>
                                <div class="col-md-3 text-center">B</div>
                                <div class="col-md-3 text-center">C</div>
                                <div class="col-md-3 text-center">D</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="punctaje-col-header col-md-12 text-center">
                                <p>sumIRScore</p>
                            </div>
                            <div class="punctaje-col-sub-header">
                                <div class="col-md-3 text-center">A</div>
                                <div class="col-md-3 text-center">B</div>
                                <div class="col-md-3 text-center">C</div>
                                <div class="col-md-3 text-center">D</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="punctaje-col-header col-md-12 text-center">
                                <p>sumSPScore</p>
                            </div>
                            <div class="punctaje-col-sub-header">
                                <div class="col-md-3"></div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3"></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="punctaje-col-header col-md-12 text-center">
                                <p>sumIRScore</p>
                            </div>
                            <div class="punctaje-col-sub-header">
                                <div class="col-md-3"></div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 punctaje-table-body">
                        <div class="col-md-3">
                            <div class="col-md-12">
                                <?php
                                    foreach($score_db as $query){
                                        if(is_null($query->sumbycategoryira)){
                                            echo '<div class="col-md-3 text-center"><p>0</p></div>';
                                        }else{
                                            echo '<div class="col-md-3 text-center"><p>'.$query->sumbycategoryira.'</p></div>';
                                        }
                                        if(is_null($query->sumbycategoryirb)){
                                            echo '<div class="col-md-3 text-center"><p>0</p></div>';
                                        }else{
                                            echo '<div class="col-md-3 text-center"><p>'.$query->sumbycategoryirb.'</p></div>';
                                        }
                                        if(is_null($query->sumbycategoryirc)){
                                            echo '<div class="col-md-3 text-center"><p>0</p></div>';
                                        }else{
                                            echo '<div class="col-md-3 text-center"><p>'.$query->sumbycategoryirc.'</p></div>';
                                        }
                                        if(is_null($query->sumbycategoryird)){
                                            echo '<div class="col-md-3 text-center"><p>0</p></div>';
                                        }else{
                                            echo '<div class="col-md-3 text-center"><p>'.$query->sumbycategoryird.'</p></div>';
                                        }

                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="col-md-12">
                                <?php
                                foreach($score_db as $query){
                                    if(is_null($query->sumbycategoryspa)){
                                        echo '<div class="col-md-3 text-center"><p>0</p></div>';
                                    }else{
                                        echo '<div class="col-md-3 text-center"><p>'.$query->sumbycategoryspa.'</p></div>';
                                    }
                                    if(is_null($query->sumbycategoryspb)){
                                        echo '<div class="col-md-3 text-center"><p>0</p></div>';
                                    }else{
                                        echo '<div class="col-md-3 text-center"><p>'.$query->sumbycategoryspb.'</p></div>';
                                    }
                                    if(is_null($query->sumbycategoryspc)){
                                        echo '<div class="col-md-3 text-center"><p>0</p></div>';
                                    }else{
                                        echo '<div class="col-md-3 text-center"><p>'.$query->sumbycategoryspc.'</p></div>';
                                    }
                                    if(is_null($query->sumbycategoryspd)){
                                        echo '<div class="col-md-3 text-center"><p>0</p></div>';
                                    }else{
                                        echo '<div class="col-md-3 text-center"><p>'.$query->sumbycategoryspd.'</p></div>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="col-md-12">
                                <?php
                                    foreach($score_db as $query){
                                        if(is_null($query->sumspscore)){
                                            echo '<div class="col-md-3 text-center"><p>0</p></div>';
                                        }else{
                                            echo '<div class="col-md-12 text-center"><p>'.$query->sumspscore.'</p></div>';
                                        }

                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="col-md-12">
                                <?php
                                foreach($score_db as $query){
                                    if(is_null($query->sumirscore)){
                                        echo '<div class="col-md-3 text-center"><p>0</p></div>';
                                    }else{
                                        echo '<div class="col-md-12 text-center"><p>'.$query->sumirscore.'</p></div>';
                                    }

                                }
                                ?>
                            </div>
                        </div>
                    </div>

                </div>
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