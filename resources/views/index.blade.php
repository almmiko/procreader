@extends('layouts.main')

@section('content')
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
