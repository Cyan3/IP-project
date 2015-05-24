
@extends('app2')
@section('content')
    <hr>
        {!! Form::open(array('file' =>'true' , 'enctype'=> 'multipart/form-data')) !!}


            <div class="form-group">

                {!! Form::radio('file_url', 'url') !!}
                {!! Form::label('url', 'Url:'); !!}
                {!! Form::text('url'); !!}
            </div>

            <div class="form-group">
                {!! Form::radio('file_url', 'file') !!}
                {!! Form::label('file', 'Input file'); !!}
                {!! Form::File('file'); !!}
            </div>

            <div class="from-group">
                {!! Form::submit('Submit !')!!}
            </div>
        {!! Form::close() !!}
    </hr>
@stop()
</body>
</html>

