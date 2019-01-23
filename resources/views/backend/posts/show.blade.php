@extends('layouts.backend')
@section('content')
<div class="wrapper my-4">
   <h4 class="mb-4">Post Details</h4>
    {{ cms_notification($errors) }}
   <div class="row bg-white shadow-sm p-4">
      <div class="col-md-4 col-lg-4 col-sm-12 col-12">
         <img src="{{ cms_thumbnail($post->thumbnail) }}" class="card-img-top">
      </div>
      <div class="col-md-8 col-lg-8 col-sm-12 col-12">
         <h3>{{ $post->title }}</h3>
         <p id="postContent">{!! $post->content !!}</p>
         <a href="{{ route('posts.edit',$post->slug) }}" class="btn btn-success">Edit</a>
         <a href="#" class="btn btn-danger" onclick="event.preventDefault(); document.querySelector('#delForm').submit()">Del</a>
         <form id="delForm" style="display:none" action="{{ route('posts.destroy',$post->slug) }}" method="POST">
            @csrf
            @method('DELETE')
         </form>
      </div>
   </div>
</div>
@endsection