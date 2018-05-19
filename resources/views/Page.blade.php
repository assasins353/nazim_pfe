@extends('layouts.frontend')

@section('title', $page->title)

@section('content')
 le contenue de la page :
 <br>
        {!! $page->content !!}

<?php 

die('re');
?>

@endsection
