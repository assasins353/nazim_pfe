@extends('layouts.manage')

@section('title', 'Suppression de l\'article '.$post->title)

@section('content')
    {!! Form::open(['method' => 'delete', 'route' => ['posts.destroy', $post->id]]) !!}
        <div class="alert alert-danger">
            <strong>Attention!</strong> Vous etes entrain de supprimer cet article, Etes vous sur de continuer ?
        </div>

        {!! Form::submit('Oui, supprimer cet article!', ['class' => 'btn btn-danger']) !!}

        <a href="{{ route('posts.index') }}" class="btn btn-success">
            <strong>Non, je ne veux pas!</strong>
        </a>
    {!! Form::close() !!}
@endsection
