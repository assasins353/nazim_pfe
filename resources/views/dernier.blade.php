<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Project web</title>

    <!-- Styles -->
    <link href="{{ asset('css/backend.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Posts detailles</h1>
      </div> <!-- end of column -->

      
    </div>
    <hr class="m-t-0">
    <?php 
use App\Post;

$pag = App\Post::all();

?>

@foreach($pag as $p)

@if($post==$p->id)

@php $contenue=$p->body

@endphp
@php $titre=$p->title

@endphp
@endif

@endforeach
    <div class="columns">
      <div class="column">
        <div class="field">
          <label for="title" class="label">titre </label>
          <pre>{{  $titre }}</pre>
        </div>

        <div class="field">
          <div class="field">
            <label for="body" class="label">contenue </label>
            <pre>{{  $contenue }}</pre>
          </div>
        </div>

        
      </div>
    </div>
  </div>
  </body>
</html>



