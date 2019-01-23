@extends('layouts.backend')
@section('content')
<div class="wrapper my-4">
   <h4 class="mb-4">Edit user</h4>
   {{ cms_notification($errors) }}

   <form method="POST" action="{{ route('users.update',$user->id) }}"
        >
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>username</label>
                <input class="form-control" type="text" name="username" value="{{ $user->username }}">
            </div>

                
                <div class="form-group">
                        <label>email</label>
                        <input class="form-control" type="text" name="email" value="{{ $user->email }}">
                </div>

                
                <div class="form-group">
                        <label>Roles</label>
                    <select name="roles[]" class="form-control" multiple>
                        @if (count($roles)>0)
                            
                            @foreach ($roles as $role)

                    <option {{ $user->roles && in_array($role->id,$user->roles->pluck('id')->toArray()) ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                                
                            @endforeach
                        @endif
                    </select>
                    </div>


                <button type="submit" class="btn btn-primary">Update</button>
        </form>
</div>
<!-- /#page-wrapper -->
@endsection