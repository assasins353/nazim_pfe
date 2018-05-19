@extends('layouts.manage')
@section('title', 'Articles')
@section('content')
<a href="{{ route('posts.create') }}" class="btn btn-primary">Créer un nouvel article</a>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Slug</th>
            <th>Auteur</th>
            <th>Date publication</th>
            <th>mot cles</th>
            <th>categories</th>
            <th>voir contenue</th>
            <th>Modifier</th>
            <th>Suppression</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
            <tr class="{{ $post->published_highlight }}">
                <td>
                    <a href="{{ route('posts.edit', $post->id) }}">{{ $post->title }}</a>
                </td>
                <td>{{ $post->slug }}</td>
                <td>{{ $post->author->name }}</td>
                <td>{{ $post->published_at }}</td>
                <td>{{ $post->key_word }}</td>
                <td>{{ $post->cat}}</td>
               
                <td><a href="{{route('posts.show', $post->id)}}">
                <i class="fa fa-fw fa-edit"></i>
                </a></td>
                <td>
                <a href="{{ route('posts.edit', $post->id) }}">
                            <i class="fa fa-fw fa-edit"></i>
                            </a>
                    
                </td>
                <td>
                <a href="{{ route('manage.posts.confirm', $post->id) }}">
                            <i class="fa fa-fw fa-remove"></i>>
                            </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{!! $posts->render() !!}

@endsection
