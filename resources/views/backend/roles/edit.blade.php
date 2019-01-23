@extends('layouts.backend')

@section('content')
    
     
<div class="wrapper my-4">

        <h4 class="mb-4">Edit role</h4>

        
                {{ cms_notification($errors) }}

                <form role="form" method="POST" action="{{ route('roles.update',$role->id) }}"
                 enctype="multipart/form-data" class="row">
                 <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                        <div class="bg-white shadow-sm p-3"> 
               
                 @csrf
                    @method('PUT')
                    
                    <div class="form-group">

                        <label>Name</label>
                    <input class="form-control" type="text" name="name" value="{{ $role->name }}">
                    </div>
                    <div class="form-group">

                    <label>Display Name</label>
                    <input class="form-control" type="text" name="display_name" value="{{ $role->display_name }}">
                    </div>


<div class="form-group">
  <label for="permission">Permissions</label>
  <select class="form-control" multiple name="permissions[]" id="permission">
    @foreach ($permissions as $permission)


<option  {{ in_array($permission['id'],$role->permissions->pluck('id')->toArray()) ? 'selected' : '' }} value="{{ $permission['id'] }}">{{ $permission['key']}}</option>
        
    @endforeach
  </select>
</div>    

                        
                </div></div>

                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="form-group bg-white shadow-sm p-3">
                 
                            <button type="submit" class="btn btn-primary text-white btn-block">Update role</button>
                                </div>
    
                        </div>
                </form>

</div>
        <!-- /#page-wrapper -->
        @endsection

        