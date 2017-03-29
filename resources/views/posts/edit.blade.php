@extends('layouts.main')

@section('content')

    <h3 style="margin-bottom: 20px;">Edit post</h3>

    @include('partials.errors-validation')

    {!! Form::model($post, ['method' => 'PATCH', 'action' => ['PostController@update', $post->id], 'class' => 'form-horizontal']) !!}

    <div class="form-group">
        {!! Form::label('title', 'Title', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('link', 'Link', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('link', null, ['class' => 'form-control', 'placeholder' => 'Link']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('category_id', 'Category', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}

        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {!! Form::submit('Update Post', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
    {!! Form::close() !!}

@endsection
