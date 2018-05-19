@extends('layouts.manage')
@section('content')
    {!! Form::open(['method' => 'delete', 'route' => ['pictures.destroy', $picture->id]]) !!}
        <div class="alert alert-danger">
            <strong>Attention!</strong> Voulez vous vraiment supprimer cette photo ??
        </div>

        {!! Form::submit('Oui, supprimer cette photo !', ['class' => 'btn btn-danger']) !!}

        <a href="{{ route('pictures.index') }}" class="btn btn-success">
            <strong> Non </strong>
        </a>
    {!! Form::close() !!}
@endsection
