@extends('layouts.manage')



@section('content')
    {!! Form::open(['method' => 'delete', 'route' => ['users.destroy', $user->id]]) !!}
        <div class="alert alert-danger">
            <strong>Attention!</strong> Vous etes entrain de supprimer cet utilisateur, Etes vous sur de continuer ?
        </div>

        {!! Form::submit('Oui, supprimer cet utilisateur!', ['class' => 'btn btn-danger']) !!}

        <a href="{{ route('posts.index') }}" class="btn btn-success">
            <strong>Non, je ne veux pas!</strong>
        </a>
    {!! Form::close() !!}
@endsection
