@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Posts detailles</h1>
      </div> <!-- end of column -->

      <div class="column">
        <a href="{{route('posts.edit', $post->id)}}" class="button is-primary is-pulled-right"><i class="fa fa-user m-r-10"></i> EditPosts</a>
      </div>
    </div>
    <hr class="m-t-0">

    <div class="columns">
      <div class="column">
        <div class="field">
          <label for="title" class="label">Title</label>
          <pre>{{$post->title}}</pre>
        </div>

        <div class="field">
          <div class="field">
            <label for="body" class="label">Contenue</label>
            <pre>{{$post->body}}</pre>
          </div>
        </div>

        
      </div>
    </div>
  </div>
@endsection
