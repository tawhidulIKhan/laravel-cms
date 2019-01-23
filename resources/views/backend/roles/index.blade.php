@extends('layouts.backend')
@section('content')
<div class="wrapper my-4">
   <h4 class="mb-4">All roles</h4>
   {{ cms_notification($errors) }}
   <table 
      class="bg-white shadow-sm text-center table table-striped table-bordered table-hover dataTable 
      no-footer dtr-inline" id="dataTables-example">
      <thead>
         <tr role="row">
            <th>No.</th>
            <th>Actions</th>
            <th>Table</th>
            <th>Actions</th>
         </tr>
      </thead>
      <tbody>
         @if(count($roles) > 0)
         @php $i = 1 @endphp
         @foreach ($roles as $role)
         <tr class="gradeA odd" role="row">
            <td class="sorting_1">{{ $i }}</td>
            <td class="sorting_1">{{ $role->name }}</td>
            <td>{{ $role->display_name }}</td>
            <td class="center">

            <a href="{{ route('roles.edit',$role->id) }}" class="btn btn-success">Edit</a>

                  <a href="#" class="btn btn-danger" onclick="document.querySelector('#delForm').submit()">Del</a>
                  <form id="delForm" style="display:none" action="{{ route('roles.destroy',$role->id) }}" method="POST">
                     @csrf
                     @method('DELETE')
                  </form>
            </td>
         </tr>
         @php $i++ @endphp
         @endforeach
         @endif   
      </tbody>
   </table>
   <div class="row">
      <div class="col-sm-6">
         {{ $roles->links() }}
      </div>
   </div>
</div>
@endsection