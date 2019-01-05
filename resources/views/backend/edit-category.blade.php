@extends('layouts.backend')

@section('content')
    
     
<div id="page-wrapper">



  <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header">Add new category</h1>
      </div>
      <!-- /.col-lg-12 -->
  </div>
  
  <div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12">
                {{ cms_notification($errors) }}

                <form role="form" method="POST" action="{{ route('categories.update',$category->slug) }}"
                 enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Name</label>
                    <input class="form-control" type="text" name="name" value="{{ $category->name }}">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="3" name="description">
                        {{ $category->description }}
                        </textarea>
                    </div>
                    <div class="form-group">
                    <img src="{{ asset('storage/images/'. $category->thumbnail) }}" width="100">
                    </div>
                    <div class="form-group">
                        <label>Thumbnail</label>
                        <input type="file" name="thumbnail">
                    </div>
    
                    <button type="submit" class="btn btn-primary">Update Category</button>
                </form>
    

            </div>
            <!-- /.col-lg-6 (nested) -->
        </div>
        <!-- /.row (nested) -->
    </div>
    <!-- /.panel-body -->
</div>


</div>
        <!-- /#page-wrapper -->
        @endsection
