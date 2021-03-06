@extends('layouts.backend')

@section('content')
    
     
<div class="wrapper my-4">

        <h4 class="mb-4">Edit Category</h4>

        
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
    
                    <button type="submit" class="btn btn-primary text-white">Update Category</button>
                </form>

</div>
        <!-- /#page-wrapper -->
        @endsection
