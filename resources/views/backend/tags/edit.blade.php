@extends('layouts.backend')
@section('content')
<div class="wrapper my-4">
   <h4 class="mb-4">Edit Tag</h4>
   {{ cms_notification($errors) }}
   <form role="form" method="POST" action="{{ route('tags.update',$tag->slug) }}"
      class="row"  >
      <div class="col-lg-8 col-md-8 col-sm-12 col-12">
         <div class="bg-white shadow-sm p-3">
            @csrf
            @method('PUT')
            <div class="form-group">
               <label>Name</label>
               <input class="form-control" type="text" name="name" value="{{ $tag->name }}">
            </div>
         </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 col-12">
         <div class="form-group bg-white shadow-sm p-3">
            <button type="submit" class="btn btn-primary text-white btn-block">Update Category</button>
         </div>
      </div>
   </form>
</div>
<!-- /#page-wrapper -->
@endsection