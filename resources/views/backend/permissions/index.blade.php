@extends('layouts.backend')
@section('content')
<div class="wrapper my-4">
   <h4 class="mb-4">All permissions</h4>
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
         @if(count($permissions) > 0)
         @php $i = 1 @endphp
         @foreach ($permissions as $permission)
         <tr class="gradeA odd" role="row">
            <td class="sorting_1">{{ $i }}</td>
            <td class="sorting_1">{{ $permission->key }}</td>
            <td>{{ $permission->table_name }}</td>
            <td class="center">
                  <a href="#" class="btn btn-danger" onclick="document.querySelector('#delForm').submit()">Del</a>
                  <form id="delForm" style="display:none" action="{{ route('permissions.destroy',$permission->id) }}" method="POST">
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
         {{ $permissions->links() }}
      </div>
   </div>
</div>
@endsection