@extends('layouts.manage')
@section('content')
    {!! Form::open(['method' => 'delete', 'route' => ['sons.destroy', $son->id]]) !!}
        <div class="alert alert-danger">
            <strong>Attention!</strong> Voulez vous vraiment supprimer ce son ??
        </div>

        {!! Form::submit('Oui, supprimer ce son !', ['class' => 'btn btn-danger']) !!}

        <a href="{{ route('sons.index') }}" class="btn btn-success">
            <strong> Non </strong>
        </a>
    {!! Form::close() !!}
@endsection
