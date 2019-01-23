@extends('layouts.backend')

@section('content')
    
     
<div class="wrapper my-4">
            

        <h4 class="mb-4">Add New Category</h4>

                {{ cms_notification($errors) }}

                <form role="form" method="POST" action="{{ route('roles.store') }}"
                 enctype="multipart/form-data" class="row">
                 <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                        <div class="bg-white shadow-sm p-3"> 
            
                    @csrf

                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" class="form-control" name="name" id="name" 
                          >
                        </div>

                        
                        <div class="form-group">
                            <label for="display_name">Display Name</label>
                            <input type="text" class="form-control" name="display_name" id="dispaly_name" 
                            >
                          </div>

                          

        <div class="form-group">
                        <label>Permissions</label>
                        <select name="permissions[]" multiple class="form-control">
    
                            @foreach ($permissions as $permission )

                        <option value="{{ $permission->id }}">{{ $permission->key}}</option>
                                
                            @endforeach

                                
                        
                        </select>
                    </div>
  
                      
                </div>
                 </div>

                 <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="form-group mb-5 bg-white shadow-sm p-3">
             <button type="submit" class="btn btn-primary text-white btn-block">
                 Create Role</button>

                        </div>
    
                </form>
    
</div>
        <!-- /#page-wrapper -->
        @endsection
