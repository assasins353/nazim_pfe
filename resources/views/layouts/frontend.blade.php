<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title') &mdash; TP WEB</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('css/frontend.css') }}">

    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <a href="/" class="navbar-brand"> TP WEB </a>
                </div>
                <ul class="nav navbar-nav">
                    @include('partials.navigation')
                </ul>
            </div>
        </nav>
        <?php 
use App\Page;

$pag = App\Page::all();

?>

@foreach($pag as $p)

@if($pages==$p->uri)

@php $contenue=$p->content

@endphp
@endif

@endforeach
        <div class="container">
            <div class="row">
                <div class="col-md-12">  {{  $contenue }}  </div>
            </div>
        </div>
    </body>
</html>
