@extends('layouts.backend')
@section('content')
<div class="wrapper my-4">
   <h4 class="mb-4">Category Details</h4>
   <div class="row  shadow-sm bg-white p-3">
      <div class="col-md-4 col-lg-4 col-sm-12 col-12">
         <img src="{{ cms_thumbnail($category->thumbnail) }}">
      </div>
      <div class="col-md-8 col-lg-8 col-sm-12 col-12">
         <h3>{{ $category->name }}</h3>
         <p>{{ $category->description }}</p>
         <a href="{{ route('categories.edit',$category->slug) }}" class="btn btn-success">Edit</a>
         <a href="#" class="btn btn-danger" onclick="document.querySelector('#delForm').submit()">Del</a>
         <form id="delForm" style="display:none" action="{{ route('categories.destroy',$category->slug) }}" method="POST">
            @csrf
            @method('DELETE')
         </form>
      </div>
   </div>
</div>
@endsection