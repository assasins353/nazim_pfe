@extends('layouts.manage')

@section('content')
{!! Form::model($picture, [
        'method' => 'post',
        'route' => ['pictures.store']
    ]) !!}


    <div class="form-group">
        {!! Form::label('choisir la photo') !!}
        {!!   Form::file('image'); !!}
    </div>

     {!! Form::submit( 'telecharger photo ', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}
@endsection
