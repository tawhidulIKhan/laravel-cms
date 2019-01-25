@extends('layouts.backend')
@section('content')
<div class="wrapper my-4">
   <h4 class="mb-4">Add New Post</h4>
   {{ cms_notification($errors) }}
   <form role="form" method="POST" action="{{ route('posts.store') }}"
      enctype="multipart/form-data" class="row">
      
      <div class="col-lg-8 col-md-8 col-sm-12 col-12">
            <div class="bg-white shadow-sm p-3"> 
        <div class="form-group">
                    <label>Title</label>
                    <input class="form-control" type="text" name="title">
                 </div>
                 <div class="form-group">
                    <label>Content</label>
                    <textarea class="form-control" rows="7" id="summernote" name="content"></textarea>
                 </div>
                 <div class="form-group">
                    <label>Short Content</label>
                    <textarea class="form-control" rows="3" name="short_content"></textarea>
                 </div>
           
                 </div>
      </div>

      <div class="col-lg-4 col-md-4 col-sm-12 col-12">
            <button type="submit" class="btn btn-primary btn-block text-white text-uppercase">Create Post</button> 

        <div class="form-group my-5 bg-white shadow-sm p-3">
                    <label>Thumbnail</label>
                    <input type="file" name="thumbnail" id="thumbnail">
                    <label class="mt-3">Thumbnail Url</label>
                    <input type="url" class="form-control mt-2" name="thumbnail_url"  id="thumbnail_url">
                 </div>
                 <div class="form-group bg-white shadow-sm p-3">
                    <label class="w-100">Categories</label>
                    <select name="categories[]"  class="form-control" multiple>
                       @if (count($categories)>0)
                       @foreach ($categories as $category)
                       <option value="{{ $category->id }}">{{ $category->name }}</option>
                       @endforeach
                       @endif
                    </select>
                 </div>
                 <div class="form-group my-5 bg-white shadow-sm p-3">
                    <label class="w-100">Tags</label>
                    <select name="tags[]"  class="form-control" multiple>
                       @if (count($tags)>0)
                       @foreach ($tags as $tag)
                       <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                       @endforeach
                       @endif
                    </select>
                 </div>
                 <div class="form-group my-3 bg-white shadow-sm p-3">
                    <label class="w-100">Post Status</label>
                    <select name="status"  class="form-control">
                       <option value="0">Draft</option>
                       <option value="1">Publish</option>
                    </select>
                 </div>
                     
      </div>

      @csrf


   </form>
</div>
<!-- /#page-wrapper -->
@endsection