@extends('layouts.backend')
@section('content')
<div class="wrapper my-4">
   <h4 class="mb-4">All settings</h4>
   {{ cms_notification($errors) }}
   <table width="100%"  class=" bg-white shadow-sm text-center table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info" style="width: 100%;">
      <thead>
         <tr role="row">
            <th>Name</th>
            <th>Key</th>
            <th>Value</th>
            <th>Actions</th>
         </tr>
      </thead>
      <tbody>
         @if(count($settings) > 0)
         @php $i = 1 @endphp
         @foreach ($settings as $setting)
         <tr class="gradeA odd" role="row">
            <td class="sorting_1">{{ $setting->display_name }}</td>
            <td class="sorting_1">{{ $setting->key }}</td>
            <td class="sorting_1">{{ $setting->value }}</td>
            <td class="center">
               <a href="{{ route('settings.show',$setting->id) }}" 
                  class="btn btn-primary text-white ">Details</a>
            </td>
         </tr>
         @php $i++ @endphp
         @endforeach
         @endif   
      </tbody>
   </table>
   {{ $settings->links() }}
</div>
@endsection