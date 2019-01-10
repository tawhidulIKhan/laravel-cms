@extends('layouts.backend')
@section('content')
<div class="wrapper my-4">
   <h4 class="mb-4">Tag Details</h4>
   <div class="row  shadow-sm bg-white p-3">
                <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                                <h3>{{ $tag->name }}</h3>
                                <a href="{{ route('tags.edit',$tag->slug) }}" class="btn btn-success">Edit</a>
                                <a href="#" class="btn btn-danger" onclick="document.querySelector('#delForm').submit()">Del</a>
                                <form id="delForm" style="display:none" 
                                   action="{{ route('tags.destroy',$tag->slug) }}" method="POST">
                                   @csrf
                                   @method('DELETE')
                                </form>
                             
                </div>
</div>
@endsection