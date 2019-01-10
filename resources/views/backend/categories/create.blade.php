@extends('layouts.backend')

@section('content')
    
     
<div class="wrapper my-4">
            

        <h4 class="mb-4">Add New Category</h4>

                {{ cms_notification($errors) }}

                <form role="form" method="POST" action="{{ route('categories.store') }}"
                 enctype="multipart/form-data" class="row">
                 <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                        <div class="bg-white shadow-sm p-3"> 
            
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" type="text" name="name">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="3" name="description"></textarea>
                    </div>
                        </div>
                 </div>

                 <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="form-group mb-5 bg-white shadow-sm p-3">
                                <button type="submit" class="btn btn-primary text-white btn-block">Add Category</button>

                        </div>
                            <div class="form-group my-5 bg-white shadow-sm p-3">
                        <label>Thumbnail</label>
                        <input type="file" name="thumbnail">
                    </div>
    
                </form>
    
</div>
        <!-- /#page-wrapper -->
        @endsection
