@extends('layouts.backend')

@section('content')
    
     
<div class="wrapper my-4">

        <h4 class="mb-4">Edit Category</h4>

        
                {{ cms_notification($errors) }}

                <form role="form" method="POST" action="{{ route('categories.update',$category->slug) }}"
                 enctype="multipart/form-data" class="row">
                 <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                        <div class="bg-white shadow-sm p-3"> 
               
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
                        </div></div>

                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="form-group bg-white shadow-sm p-3">
                 
                            <button type="submit" class="btn btn-primary text-white btn-block">Update Category</button>
                                </div>
                    <div class="form-group bg-white shadow-sm p-3">
                    <img src="{{ asset('storage/images/'. $category->thumbnail) }}" width="100">
                        <label>Thumbnail</label>
                        <input type="file" name="thumbnail">
                    </div>
    
                        </div>
                </form>

</div>
        <!-- /#page-wrapper -->
        @endsection

        