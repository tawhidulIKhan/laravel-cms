@extends('layouts.backend')

@section('content')
    
     
<div class="wrapper my-4">

        <h4 class="mb-4">Edit Post</h4>


                {{ cms_notification($errors) }}

                <form role="form" method="POST" action="{{ route('posts.update',$post->slug) }}"
                 enctype="multipart/form-data" class="mb-b">
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
            
                

                            <div class="form-group">
                                    <label>Thumbnail</label>
                                    <input type="file" name="thumbnail">
                                </div>
                                <div class="form-group">
                                        <label>Category</label>
                                    <select name="categories[]" id="selectCategory" class="form-control" multiple>
                
                                            @if (count($categories)>0)
                                                @foreach ($categories as $category)
                                                
                                        <option value="{{ $category->id }}"
                                           
                                            >{{ $category->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                
                
                                        </div>
                
                                        <div class="form-group">
                                                <label>Tag</label>

                                            <select name="tags[]" class="form-control" multiple>
                                                    
                                                    @if (count($tags)>0)
                                                        @foreach ($tags as $tag)
                                                        
                                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                        
                                                </div>
                        
                                                <div class="form-group">
                                                        <label>Post Status</label>

                                                    <select name="status" class="form-control">
                                                            <option value="draft">Draft</option>                                            
                                                            <option value="publish">Publish</option>                                            
                                                        </select>
                                
                                
                                                        </div>
                        
                                                        <div class="form-group">
                                                                <label>Post Type</label>

                                                                <select name="type" id="selectType" class="form-control">
                                                                    <option value="normal">Normal</option>                                            
                                                                    <option value="audio">Audio</option>                                            
                                                                    <option value="video">Video</option>                                            
                                                                </select>
                                        
                                        
                                                                </div>
                            
    
    

    
                
                                        
                        <button type="submit" class="btn btn-primary text-white">Create Post</button>
                </form>
    


</div>
        <!-- /#page-wrapper -->
        @endsection
