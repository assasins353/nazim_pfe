@extends('layouts.manage')

@section('content')
{!! Form::model($video, [
        'method' => 'post',
        'route' => ['videos.store']
    ]) !!}


    <div class="form-group">
        {!! Form::label('choisir la video') !!}
        <input type="file" name="videos" accept="video/*">
    </div>

     {!! Form::submit( 'telecharger Video ', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}
@endsection
