@extends('layouts.main')

@section('content')

    <h3 style="margin-bottom: 20px;">Edit category</h3>

    @include('partials.errors-validation')

    {!! Form::model($category, ['method' => 'PATCH', 'action' => ['CategoriesController@update', $category->id], 'class' => 'form-horizontal']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {!! Form::submit('Update Category', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
    {!! Form::close() !!}

@endsection
