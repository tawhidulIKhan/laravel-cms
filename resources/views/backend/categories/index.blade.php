@extends('layouts.backend')
@section('content')
<div class="wrapper my-4">
   <h4 class="mb-4">All Categories</h4>
   {{ cms_notification($errors) }}
   <table 
      class="bg-white shadow-sm text-center table table-striped table-bordered table-hover dataTable 
      no-footer dtr-inline" id="dataTables-example">
      <thead>
         <tr role="row">
            <th>No.</th>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
         </tr>
      </thead>
      <tbody>
         @if(count($categories) > 0)
         @php $i = 1 @endphp
         @foreach ($categories as $category)
         <tr class="gradeA odd" role="row">
            <td class="sorting_1">{{ $i }}</td>
            <td class="sorting_1">{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td class="center">
               <a href="{{ route('categories.show',$category->slug) }}" 
                  class="btn btn-primary text-white">Details</a>
            </td>
         </tr>
         @php $i++ @endphp
         @endforeach
         @endif   
      </tbody>
   </table>
   <div class="row">
      <div class="col-sm-6">
         {{ $categories->links() }}
      </div>
   </div>
</div>
@endsection