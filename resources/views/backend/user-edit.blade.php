@extends('layouts.backend')

@section('content')
    
     
<div class="wrapper my-4">
    
        <h4 class="mb-4">Edit User</h4>            
    

                {{ cms_notification($errors) }}

                <form method="POST" action="{{ route('user.profile.update',$user->id) }}" enctype="multipart/form-data"
                >
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>username</label>
                        <input class="form-control" type="text" name="username" value="{{ $user->username }}">
                    </div>

                    <div class="form-group">
                            <label>firstname</label>
                            <input class="form-control" type="text" name="firstname" value="{{ $user->firstname }}">
                        </div>

                        <div class="form-group">
                                <label>lastname</label>
                                <input class="form-control" type="text" name="lastname" value="{{ $user->lastname }}">
                            </div>
                        
                        <div class="form-group">
                                <label>email</label>
                                <input class="form-control" type="text" name="email" value="{{ $user->email }}">
                        </div>
                        
                        <div class="form-group">
                                <label>password</label>
                                <input class="form-control" type="password" name="password">
                                <small>Leave this field for remain unchanged password</small>
                        </div>
                        <div class="form-group">
                                <label>Confirm password</label>
                                <input class="form-control" type="password" name="password_confirmation">
                                <small>Leave this field for remain unchanged password</small>
                        </div>


                        <div class="form-group">
                          <label for="thumbnail">Thumbnail</label>
                          <input type="file" class="form-control-file" name="thumbnail" id="thumbnail" placeholder="Profile photo" aria-describedby="fileHelpId">
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                </form>
    



</div>
        <!-- /#page-wrapper -->
        @endsection
