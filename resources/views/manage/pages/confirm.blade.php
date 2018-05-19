@extends('layouts.manage')

@section('title', 'Suppression de la page '.$page->title)

@section('content')
    {!! Form::open(['method' => 'delete', 'route' => ['pages.destroy', $page->id]]) !!}
        <div class="alert alert-danger">
            <strong>Attention!</strong> Voulez vous vraiment supprimer cette page ??
        </div>

        {!! Form::submit('Oui, supprimer cette page !', ['class' => 'btn btn-danger']) !!}

        <a href="{{ route('pages.index') }}" class="btn btn-success">
            <strong> Non </strong>
        </a>
    {!! Form::close() !!}
@endsection
