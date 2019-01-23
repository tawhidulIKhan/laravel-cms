@extends('layouts.backend')
@section('content')
<div class="wrapper my-4">
   <h4 class="mb-4">All menus</h4>
   {{ cms_notification($errors) }}
   <table width="100%"  class=" bg-white shadow-sm text-center table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info" style="width: 100%;">
      <thead>
         <tr role="row">
            <th>No.</th>
            <th>Name</th>
            <th>Actions</th>
         </tr>
      </thead>
      <tbody>
         @if(count($menus) > 0)
         @php $i = 1 @endphp
         @foreach ($menus as $menu)
         <tr class="gradeA odd" role="row">
            <td class="sorting_1">{{ $menu->id }}</td>
            <td class="sorting_1">{{ $menu->name }}</td>
            <td class="center">
               <a href="{{ route('menus.edit',$menu->id) }}" 
                  class="btn btn-success text-white ">Edit</a>
                  <a href="#" class="btn btn-danger" onclick="event.preventDefault();document.querySelector('#delForm').submit()">Del</a>
                  <form id="delForm" style="display:none" action="{{ route('menus.destroy',$menu->id) }}" method="POST">
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

   {{ $menus->links() }}
</div>
@endsection