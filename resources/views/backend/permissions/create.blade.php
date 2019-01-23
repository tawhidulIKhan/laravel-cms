@extends('layouts.backend')

@section('content')
    
     
<div class="wrapper my-4">
            

        <h4 class="mb-4">Add New Category</h4>

                {{ cms_notification($errors) }}

                <form role="form" method="POST" action="{{ route('permissions.store') }}"
                 enctype="multipart/form-data" class="row">
                 <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                        <div class="bg-white shadow-sm p-3"> 
            
                    @csrf

<div class="form-group">
                        <label>Table</label>
                        <select name="table" class="form-control">
    
                            @foreach ($tables as $table)
                            @foreach ($table as $key=>$val )

                        <option value="{{ $val }}">{{ $val}}</option>
                                
                            @endforeach

                                
                            @endforeach
    
                        </select>
                    </div>
  
                    <div class="form-group">
                        <label for="">Action</label>
                        <select multiple class="form-control" name="action[]">
                          <option value="create">Create</option>
                          <option value="edit">Edit</option>
                          <option value="read">Read</option>
                          <option value="delete">Delete</option>
                        </select>
                      </div>  
                      
                </div>
                 </div>

                 <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="form-group mb-5 bg-white shadow-sm p-3">
                                <button type="submit" class="btn btn-primary text-white btn-block">Create Permission</button>

                        </div>
    
                </form>
    
</div>
        <!-- /#page-wrapper -->
        @endsection
