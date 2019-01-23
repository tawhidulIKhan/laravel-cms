@extends('layouts.backend')
@section('content')
<div class="wrapper my-4">

      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pills-users-tab" data-toggle="pill" href="#pills-users" role="tab" aria-controls="pills-users" aria-selected="true">Users</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-tusers-tab" data-toggle="pill" href="#pills-tusers" role="tab" aria-controls="pills-tusers" aria-selected="false">Trashed Users</a>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-users" role="tabpanel" aria-labelledby="pills-users-tab">
                  <h4 class="mb-4">All users</h4>
                  {{ cms_notification($errors) }}
                  <table width="100%"  class=" bg-white shadow-sm text-center table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info" style="width: 100%;">
                     <thead>
                        <tr role="row">
                           <th>No.</th>
                           <th>Name</th>
                           <th>Email</th>
                           <th>Roles</th>
                           <th>Actions</th>
                        </tr>
                     </thead>
                     <tbody>
                        @if(count($users) > 0)
                        @php $i = 1 @endphp
                        @foreach ($users as $user)
                        <tr class="gradeA odd" role="row">
                           <td class="sorting_1">{{ $user->id }}</td>
                           <td class="sorting_1">{{ $user->username }}</td>
                           <td class="sorting_1">{{ $user->email }}</td>
                           <td class="sorting_1">
                              @if (count($user->roles) > 0)
                              @php $i = 0; @endphp
                              @foreach ($user->roles as $role)
                             
                           <span>{{ $role->name }} {{ $i > 0 ? ',' : '' }}</span>
                               
                              @php $i++ @endphp
                             
                              @endforeach
                              @endif    
                           </td>
                           <td class="center">
                              <a href="{{ route('users.show',$user->id) }}" 
                                 class="btn btn-primary text-white ">Details</a>
                           </td>
                        </tr>
                        @php $i++ @endphp
                        @endforeach
                        @endif   
                     </tbody>
                  </table>
                  {{ $users->links() }}
               

            </div>

            <div class="tab-pane fade show" id="pills-tusers" role="tabpanel" aria-labelledby="pills-tusers-tab">

                        <h4 class="mb-4">Trashed Users</h4>
   {{ cms_notification($errors) }}
   <table width="100%"  class=" bg-white shadow-sm text-center table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info" style="width: 100%;">
      <thead>
         <tr role="row">
            <th>No.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
            <th>Actions</th>
         </tr>
      </thead>
      <tbody>
         @if(count($users) > 0)
         @php $i = 1 @endphp
         @foreach ($tusers as $tuser)
         <tr class="gradeA odd" role="row">
            <td class="sorting_1">{{ $tuser->id }}</td>
            <td class="sorting_1">{{ $tuser->username }}</td>
            <td class="sorting_1">{{ $tuser->email }}</td>
            <td class="sorting_1">
               @if (count($tuser->roles) > 0)
               @php $i = 0; @endphp
               @foreach ($tuser->roles as $role)
              
            <span>{{ $role->name }} {{ $i > 0 ? ',' : '' }}</span>
                
               @php $i++ @endphp
              
               @endforeach
               @endif    
            </td>
            <td class="center">
                  <a href="#" class="btn btn-danger" 
                  onclick="event.preventDefault();document.querySelector('#delpForm').submit()">Del Permanent</a>

                  <a href="#" class="btn btn-warning" 
                  onclick="event.preventDefault();document.querySelector('#restoreForm').submit()">Restore</a>
                  <form id="restoreForm" style="display:none" action="{{ route('users.restore',$tuser->id) }}" method="post">
                     @csrf
                  </form>
                  <form id="delpForm" style="display:none" action="{{ route('users.force_delete',$tuser->id) }}" method="post">
                        @csrf
                     </form>

                     
            </td>
         </tr>
         @php $i++ @endphp
         @endforeach
         @endif   
      </tbody>
   </table>
   {{ $users->links() }}

            </div>


            
          </div>


</div>
@endsection