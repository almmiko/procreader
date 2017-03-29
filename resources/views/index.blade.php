@extends('layouts.main')

@section('content')

    @include('partials.flash-msg')

   <div class="row">
       <div class="col-md-12">

           @foreach($posts as $post)
               <div class="post-item">
                   <div class="row">
                       <div class="col-md-12">
                           <h2 class="post-title">
                               <a href="{{ $post->link }}" target="_blank">
                                   {{ $post->title }}<small> ( {{parse_url($post->link, PHP_URL_HOST) }} )</small>
                               </a>
                           </h2>

                           @if(Auth::check() && Auth::user()->id == $post->user->id)
                               <div class="controls pull-right">
                                   <a href="{{ route('posts.edit', $post->id) }}" type="button" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>

                                   <a type="button" class="btn btn-danger" href="#"
                                      onclick="event.preventDefault();

                                                     var del = confirm('Are you sure?');

                                                     if (del) {
                                                         document.getElementById('delete-form').submit();
                                                     }

                                                     ">
                                       <i class="glyphicon glyphicon-remove"></i>
                                   </a>

                                   <form id="delete-form" action="{{ action('PostController@destroy',  $post->id) }}" method="POST" style="display: none;">
                                       <input type="hidden" name="_method" value="DELETE">
                                       {{ csrf_field() }}
                                   </form>

                               </div>
                           @endif

                           <div class="post-item__info">
                               <span class="post-user">{{ $post->user->name }}</span>
                               <span class="post-created">{{ $post->created_at->diffForHumans() }}</span>
                               <span class="label label-info">{{ $post->category->name }}</span>
                           </div>

                       </div>
                   </div>
               </div>
           @endforeach

       </div>

       <div class="col-md-12 text-center">
           {{ $posts->links() }}
       </div>
   </div>
@endsection
