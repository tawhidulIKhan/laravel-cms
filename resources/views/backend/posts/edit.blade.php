@extends('layouts.backend')
@section('content')
<div class="wrapper my-4">
   <h4 class="mb-4">Edit Post</h4>
   {{ cms_notification($errors) }}
   <form role="form" method="POST" action="{{ route('posts.update',$post->slug) }}"
      enctype="multipart/form-data" class="row">
      <div class="col-lg-8 col-md-8 col-sm-12 col-12">
            <div class="bg-white shadow-sm p-3"> 
      @csrf
      @method('PUT')
      <div class="form-group">
         <label>Title</label>
         <input class="form-control" type="text" name="title" value="{{ $post->title }}">
      </div>
      <!-- Create the editor container -->
      <div class="form-group">
         <label>Content</label>
         <textarea class="form-control" id="summernote" rows="3" name="content">
         {!! $post->content !!}
         </textarea>
      </div>
      <div class="form-group">
         <label>Short Content</label>
         <textarea class="form-control" rows="3" name="short_content" value="{{ $post->short_content }}"></textarea>
      </div>
         
            </div></div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <button type="submit" class="btn btn-primary btn-block text-white">Update Post</button>

                    <div class="form-group my-5 bg-white shadow-sm p-3">
                        @if ($post->thumbnail)
                        <img src="{{ cms_thumbnail($post->thumbnail) }}" class="w-100 mb-4">
                            
                        @endif  


                          <label>Thumbnail</label>
                              <input type="file" name="thumbnail" id="thumbnail">
                              <label class="mt-3">Thumbnail Url</label>
                              <input type="url" class="form-control mt-2" name="thumbnail_url"  id="thumbnail_url">
                           </div>
                        <div class="form-group my-5 bg-white shadow-sm p-3">
         <label>Category</label>
         <select name="categories[]" id="selectCategory" class="form-control" multiple>
            @if (count($categories)>0)
            @foreach ($categories as $category)
            <option {{ cms_selected($post,$category) }} value="{{ $category->id }}"
               >{{ $category->name }}</option>
            @endforeach
            @endif
         </select>
      </div>
      <div class="form-group my-5 bg-white shadow-sm p-3">
         <label>Tag</label>
         <select name="tags[]" class="form-control" multiple>
            @if (count($tags)>0)
            @foreach ($tags as $tag)
            <option {{ cms_selected($post,$tag) }}  value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
            @endif
         </select>
      </div>
      <div class="form-group my-5 bg-white shadow-sm p-3">
         <label>Post Status</label>
         <select name="status" class="form-control">
            <option value="draft">Draft</option>
            <option value="publish">Publish</option>
         </select>
      </div>
      <div class="form-group my-5 bg-white shadow-sm p-3">
         <label>Post Type</label>
         <select name="type" id="selectType" class="form-control">
            <option value="normal">Normal</option>
            <option value="audio">Audio</option>
            <option value="video">Video</option>
         </select>
      </div>
    </div>
    </form>
</div>
<!-- /#page-wrapper -->
@endsection