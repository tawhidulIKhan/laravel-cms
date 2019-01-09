@extends('layouts.backend')

@section('content')
    
     



     
        <div class="wrapper my-4">
            

                <h4 class="mb-4">Add New Post</h4>
        
          
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
                <textarea class="form-control" rows="3" id="summernote" name="content"></textarea>
        </div>
            

                                <div class="form-group">
                                        <label>Short Content</label>
                                        <textarea class="form-control" rows="3" name="short_content"></textarea>
                                </div>
            

                            <div class="form-group">
                                    <label>Thumbnail</label>
                                    <input type="file" name="thumbnail">
                                </div>


                                <div class="form-group">
                                        <label class="w-100">Categories</label>

                                    <select name="categories[]"  class="form-control" multiple>
                
                                            @if (count($categories)>0)
                                                @foreach ($categories as $category)
                                                
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                
                
                                        </div>
                
                                        <div class="form-group">
                                                <label class="w-100">Tags</label>

                                            <select name="tags[]"  class="form-control" multiple>
                                                    
                                                    @if (count($tags)>0)
                                                        @foreach ($tags as $tag)
                                                        
                                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>

                                           
                                                </div>
                        
                                                <div class="form-group">
                                                        <label class="w-100">Post Status</label>

                                                    <select name="status"  class="form-control">
                                                                                                      
                                                            <option value="draft">Draft</option>                                            
                                                            <option value="publish">Publish</option>                                            
                                                        </select>
                                
                                
                                                        </div>
                        
                                                        <div class="form-group">
                                                                <label class="w-100">Post Type</label>

                                                                <select name="type" class="form-control">
                                                                    <option value="normal">Normal</option>                                            
                                                                    <option value="audio">Audio</option>                                            
                                                                    <option value="video">Video</option>                                            
                                                                </select>
                                        
                                        
                                                                </div>
                            
                 
      
    

    
                
                                        
                        <button type="submit" class="btn btn-primary text-white text-uppercase">Create Post</button> 
                </form>
    

  

</div>
        <!-- /#page-wrapper -->
        @endsection
