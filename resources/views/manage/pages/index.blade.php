@extends('layouts.manage')
@section('title', 'Pages')
@section('content')
<div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Pages</h1>
      </div>
      
    </div>
    <hr class="m-t-0">

 <div class="column">
        <a href="{{route('pages.create')}}" class="button is-primary is-pulled-right"><i class="fa fa-user-plus m-r-10"></i> creer une page</a>
      </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <td>Titre</td>
                <td>Adresse URL</td>
                <td>Nom</td>
                <td>Template</td>
           
                <td>Modifier</td>
                <td>Supprimer</td>
            </tr>
        </thead>
        <tbody>
            @if($pages->isEmpty())
                <tr>
                    <td colspan="5" align="center"> Aucune page .</td>
                </tr>
            @else
                @foreach($pages as $page)
                    <tr class="{{ $page->hidden ? 'warning' : '' }}">
                        <td>
                            {!! $page->title !!}
                        </td>
                        <td><a href="{{ url($page->uri) }}">{{ $page->uri }}</a></td>
                        <td>{{ $page->name or 'Aucun' }}</td>
                        <td>{{ $page->template or 'Aucun' }}</td>
                        
                        <td>
                            <a href="{{ route('pages.edit', $page->id) }}">
                            <i class="fa fa-fw fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('manage.pages.confirm', $page->id) }}">
                            <i class="fa fa-fw fa-remove"></i>>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

@endsection
