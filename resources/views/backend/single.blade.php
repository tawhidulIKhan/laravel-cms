@extends('layouts.backend')

@section('content')
    
    <div class="wrapper my-4">

            <h4 class="mb-4">Post</h4>
    
    
    <div class="card">
        <img src="{{ cms_thumbnail($post->thumbnail) }}" class="card-img-top">
    
        <div class="card-body">
                <h3>{{ $post->title }}</h3>
                <p id="postContent">{!! $post->content !!}</p>
                <a href="{{ route('posts.edit',$post->slug) }}" class="btn btn-success">Edit</a>
                
                <a href="#" class="btn btn-danger" onclick="document.querySelector('#delForm').submit()">Del</a>
                <form id="delForm" style="display:none" action="{{ route('posts.destroy',$post->slug) }}" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
             
        </div>
    </div>
                </div>
    

                

    @endsection
