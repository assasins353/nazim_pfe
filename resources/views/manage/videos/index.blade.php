@extends('layouts.manage')

@section('content')
<div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Video</h1>
      </div>
      
    </div>
    <hr class="m-t-0">

 <div class="column">
        <a href="{{route('videos.create')}}" class="button is-primary is-pulled-right"><i class="fa fa-user-plus m-r-10"></i> ajouter photo</a>
      </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <td>Video</td>
              
                <td>Supprimer</td>
            </tr>
        </thead>
        <tbody>
            @if($videos->isEmpty())
                <tr>
                    <td colspan="5" align="center"> Aucune video .</td>
                </tr>
            @else
                @foreach($videos as $video)
                    <tr >
                        <td>
                        <?php  echo $video->videos;  ?>
                        </td>
                        
                        
                     
                        <td>
                            <a href="{{ route('manage.videos.confirm', $video->id) }}">
                            <i class="fa fa-fw fa-remove"></i>>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

@endsection
