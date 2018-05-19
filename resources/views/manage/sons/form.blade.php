@extends('layouts.manage')

@section('content')
{!! Form::model($son, [
        'method' => 'post',
        'route' => ['sons.store']
    ]) !!}


    <div class="form-group">
        {!! Form::label('choisir le son') !!}
        <input type="file" name="image" accept="audio/*">
    </div>

     {!! Form::submit( 'telecharger son ', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}
@endsection
