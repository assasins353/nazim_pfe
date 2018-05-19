@extends('layouts.manage')

@section('title', $post->exists ? 'Modifier l\'article  '.$post->title : 'Créer un nouvel article')

@section('content')
    {!! Form::model($post, [
        'method' => $post->exists ? 'put' : 'post',
        'route' => $post->exists ? ['posts.update', $post->id] : ['posts.store']
    ]) !!}

    <div class="form-group">
        {!! Form::label('Titre') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('slug') !!}
        {!! Form::text('slug', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('category') !!}
        {!! Form::text('cat', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            {!! Form::label('Date publication') !!}
        </div>
        <div class="col-md-4">
            {!! Form::date('published_at', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group excerpt">
        {!! Form::label('Extrait a afficher dans la miniature') !!}
        {!! Form::textarea('excerpt', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Contenu de l\'article' ) !!}
        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Mots cles' ) !!}
        {!! Form::textarea('key_word', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::submit($post->exists ? 'Sauvegarder' : 'Créer l\'article ', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

    <script>
        new SimpleMDE({
            element: document.getElementsByName('body')[0]
        }).render();

        new SimpleMDE({
            element: document.getElementsByName('excerpt')[0]
        }).render();

        $('input[name=published_at]').datetimepicker({
            allowInputToggle: true,
            format: 'YYYY-MM-DD HH:mm:ss',
            showClear: true,
            defaultDate: '{{ old('published_at', $post->published_at) }}'
        });

        $('input[name=title]').on('blur', function () {
            var slugElement = $('input[name=slug]');

            if (slugElement.val()) {
                return;
            }

            slugElement.val(this.value.toLowerCase().replace(/[^a-z0-9-]+/g, '-').replace(/^-+|-+$/g, ''));
        });
    </script>
@endsection
