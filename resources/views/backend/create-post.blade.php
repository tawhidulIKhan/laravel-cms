@extends('layouts.backend')

@section('content')
    
     
<div id="page-wrapper">



  <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header">Add New Post</h1>
      </div>
      <!-- /.col-lg-12 -->
  </div>
  
  <div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12">
                {{ cms_notification($errors) }}

                <form role="form" method="POST" action="{{ route('posts.store') }}"
                 enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" type="text" name="title">
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea class="form-control" rows="3" name="content"></textarea>
                    </div>
                    <div class="form-group">
                            <label>Short Content</label>
                            <textarea class="form-control" rows="3" name="short_content"></textarea>
                     </div>

                     <div class="form-group">
                        <label>Thumbnail</label>
                        <input type="file" name="thumbnail">
                    </div>
    
                    <button type="submit" class="btn btn-primary">Add Category</button>
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
