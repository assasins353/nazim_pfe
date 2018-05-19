@extends('layouts.manage')
@section('content')
    {!! Form::open(['method' => 'delete', 'route' => ['videos.destroy', $video->id]]) !!}
        <div class="alert alert-danger">
            <strong>Attention!</strong> Voulez vous vraiment supprimer cette video ??
        </div>

        {!! Form::submit('Oui, supprimer cette video !', ['class' => 'btn btn-danger']) !!}

        <a href="{{ route('videos.index') }}" class="btn btn-success">
            <strong> Non </strong>
        </a>
    {!! Form::close() !!}
@endsection
