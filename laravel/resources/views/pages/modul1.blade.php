
@extends('modul_app')
@section('header')
    <ul class="list-inline">
        <li class="selected-menu"><a href="modul1">Modul 1</a></li>
        <li><a href="modul2">Modul 1</a></li>
        <li><a href="modul3">Modul 3</a></li>
        <li><a href="#">Punctaje</a>
    </ul>
@stop
@section('contenter')
        <div class="row">
            <div id="steps" class="col-md-12">
                <div class="step active col-md-3">
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
                <div class="step col-md-3">
                    <div class="number">4</div>
                    <div class="line"></div>
                </div>
            </div>
        </div>
        {!! Form::open(array('file' =>'true' , 'enctype'=> 'multipart/form-data')) !!}

            <div id="file-url" class="col-md-12">
                <div class="row">
                    <div class="form-group">
                        {!! Form::label('file_url', 'Fisier:', array('class'=>'radio-inline')); !!}
                        {!! Form::radio('file_url', 'file', true,array('id'=>'inlineRadio1')) !!}
                        {!! Form::label('file_url', 'Link:', array('class'=>'radio-inline'))  !!}
                        {!! Form::radio('file_url', 'url', false,array('id'=>'inlineRadio2')) !!}
                    </div>
                </div>
            </div>
            <div id="browse" class="col-md-12">
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-12">
                        <p>Selecteaza fisier</p>
                        <div class="form-group">
                            {!! Form::label('file', 'Introduceti fisierul'); !!}
                            {!! Form::File('file'); !!}

                        </div>
                    </div>
                </div>
            </div>
            <div id="url-container" class="col-md-12">
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-12">
                        <p>Introduceti Link-ul</p>
                        <div class="form-group">
                            {!! Form::label('url', 'Url:'); !!}
                            {!! Form::text('url'); !!}
                        </div>
                    </div>
                </div>
            </div>
            <div id="execut" class="col-md-12">
                <div class="from-group">
                    {!! Form::submit('Executa', array('class'=>'btn btn-primary'))!!}
                </div>
            </div>

        {!! Form::close() !!}
    </hr>
@stop()
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
