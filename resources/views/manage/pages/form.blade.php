@extends('layouts.manage')
@section('title', $page->exists ? 'Modifier la page '.$page->title : 'Créer une nouvelle page')

@section('content')
    {!! Form::model($page, [
        'method' => $page->exists ? 'put' : 'post',
        'route' => $page->exists ? ['pages.update', $page->id] : ['pages.store']
    ]) !!}
    <head>
   

</head> 
    <div class="form-group">
        {!! Form::label('Titre') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('uri', 'URI') !!}
        {!! Form::text('uri', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}

        <p class="help-block">
           Ce nom est utilisé pour générer le lien de la page.
        </p>
    </div>

    <div class="form-group row">
        <div class="col-md-12">
            {!! Form::label('template') !!}
        </div>
        <div class="col-md-4">
            {!! Form::select('template', $templates, null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-12">
            {!! Form::label('Ordre de la page') !!}
        </div>
        <div class="col-md-2">
            {!! Form::select('order', [
                '' => '',
                'before' => 'Avant',
                'after' => 'Après',
                'childOf' => 'Fils de'
            ], null, ['class' => 'form-control']) !!}
        </div>
        <div class="col-md-5">
            {!! Form::select('orderPage', [
                '' => ''
            ] + $orderPages->lists('title', 'id')->toArray(), null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('Contenu de la page') !!}
        {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
    </div>

    <div class="checkbox">
        <label>
            {!! Form::checkbox('hidden') !!}

            Cacher le page dans la navigation

        </label>
    </div>

    {!! Form::submit($page->exists ? 'Sauvegarder' : 'Créer la nouvelle page', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

    <script>
        new SimpleMDE().render();
    </script>
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
@endsection
