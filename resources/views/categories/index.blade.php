@extends('layouts.main')

@section('content')

    @include('partials.flash-msg')

    <div class="row">
        <div class="col-md-12">

            @foreach($categories as $category)
                <div class="post-item">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="post-title">{{ $category->name }}</h2>

                            @if(Auth::check() && Auth::user()->id == $category->user->id)
                                <div class="controls pull-right">
                                    <a href="{{ route('categories.edit', $category->id) }}" type="button" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>

                                    <a type="button" class="btn btn-danger" href="#"
                                       onclick="event.preventDefault();

                                                     var del = confirm('Are you sure?');

                                                     if (del) {
                                                         document.getElementById('delete-form').submit();
                                                     }

                                                     ">
                                        <i class="glyphicon glyphicon-remove"></i>
                                    </a>

                                    <form id="delete-form" action="{{ action('CategoriesController@destroy',  $category->id) }}" method="POST" style="display: none;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        {{ csrf_field() }}
                                    </form>

                                </div>
                            @endif

                            <div class="post-item__info">
                                <span class="post-created">{{ $category->user->name }}</span>
                                <span class="post-created">{{ $category->created_at->diffForHumans() }}</span>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="col-md-12 text-center">
            {{ $categories->links() }}
        </div>
    </div>
@endsection
