@extends('layouts.backend')
@section('content')
<div class="wrapper my-4">
   <h4 class="mb-4">Tags</h4>
   {{ cms_notification($errors) }}
   <table class="text-center table table-striped table-bordered table-hover bg-white shadow-sm p-4">
      <thead>
         <tr role="row">
            <th>No.</th>
            <th>Name</th>
            <th>Actions</th>
         </tr>
      </thead>
      <tbody>
         @if(count($tags) > 0)
         @php $i = 1 @endphp
         @foreach ($tags as $tag)
         <tr class="gradeA odd" role="row">
            <td class="sorting_1">{{ $i }}</td>
            <td class="sorting_1">{{ $tag->name }}</td>
            <td class="center">
               <a href="{{ route('tags.show',$tag->slug) }}" 
                  class="btn btn-primary text-white">Details</a>
            </td>
         </tr>
         @php $i++ @endphp
         @endforeach
         @endif   
      </tbody>
   </table>
   {{ $tags->links() }}
</div>
@endsection