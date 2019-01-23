@extends('layouts.backend')

@section('content')
     
<div class="wrapper my-4">
    
    <h4 class="mb-4">Tags</h4>            

<table class="table table-responsive">

    <tr>
        <th>Username</th>
        <td>{{ $user->username }}</td>
    </tr>

    <tr>
            <th>Name</th>
            <td>{{ sprintf('%s %s',$user->firstname,$user->lastname) }}</td>
        </tr>
    
        <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>
        
            <tr>
                    <th>Role</th>
                    <td>

                        @foreach ($user->roles as $role)
                            {{ $role->name }}
                        @endforeach

                    </td>
                </tr>
            <tr>
                <th>Actions</th>
                <td>
                        <a href="{{ route('user.profile.edit') }}" class="btn btn-success">Edit Info</a>

                        <a href="#" class="btn btn-danger" onclick="document.querySelector('#delForm').submit()">Del</a>
                        <form id="delForm" style="display:none" action="{{ route('user.profile.delete',$user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                 
                </td>
            </tr>
        </table>



</div>

<!-- /#page-wrapper -->
@endsection
