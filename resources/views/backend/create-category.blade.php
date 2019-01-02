@extends('layouts.backend')

@section('content')
    
     
<div id="page-wrapper">
        <form role="form" method="POST" action="">
                
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
                    <input class="form-control-file" type="file" name="thumbnail">
                </div>
                    <div class="form-group">
                      <label>Categories</label>
                      <select class="form-control" name="category_id" >
                        <option></option>
                        <option></option>
                        <option></option>
                      </select>
                </div>
                <div class="form-group">
                    <label>Tags</label>
                    <select class="form-control" name="tag_id" >
                      <option></option>
                      <option></option>
                      <option></option>
                    </select>
              </div>
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status" >
                  <option class="publish">Publish</option>
                  <option class="draft">Draft</option>
                </select>
          </div>
          <div class="form-group">
            <label>Type</label>
            <select class="form-control" name="type" >
              <option class="normal">Normal</option>
              <option class="audio">Audio</option>
              <option class="video">Video</option>
            </select>
      </div>

                <button type="submit" class="btn btn-default">Submit Button</button>
            </form>

</div>
        <!-- /#page-wrapper -->
        @endsection
