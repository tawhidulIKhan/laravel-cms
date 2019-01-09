@extends('layouts.backend')

@section('content')
    
     
<div class="wrapper my-4">
            

        <h4 class="mb-4">Add New Category</h4>

                {{ cms_notification($errors) }}

                <form role="form" method="POST" action="{{ route('categories.store') }}"
                 enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" type="text" name="name">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="3" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Thumbnail</label>
                        <input type="file" name="thumbnail">
                    </div>
    
                    <button type="submit" class="btn btn-primary text-white">Add Category</button>
                </form>
    
</div>
        <!-- /#page-wrapper -->
        @endsection
