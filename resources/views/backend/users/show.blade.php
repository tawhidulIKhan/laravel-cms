@extends('layouts.backend')
@section('content')
<div class="wrapper my-4">
   <h4 class="mb-4">user Details</h4>
    {{ cms_notification($errors) }}
   <div class="row bg-white shadow-sm p-4">
      <div class="col-md-4 col-lg-4 col-sm-12 col-12">
         <img src="{{ cms_thumbnail($user->thumbnail) }}" class="card-img-top">
      </div>
      <div class="col-md-8 col-lg-8 col-sm-12 col-12">
         <h3>{{ $user->username }}</h3>
      <p>{{ sprintf('%s %s',$user->first_name,$user->last_name) }}</p>
      <p>{{ $user->email }}</p>
      <h4>roles</h4>

      <ol class="p-2">
          @foreach ($user->roles as $role)
      <li>{{ $role->name }}</li>
          @endforeach
      </ol>
         <a href="{{ route('users.edit',$user->id) }}" class="btn btn-success">Edit</a>
         <a href="#" class="btn btn-danger" 
         onclick="event.preventDefault();document.querySelector('#delForm').submit()">Del</a>
         <form id="delForm" style="display:none" action="{{ route('users.destroy',$user->id) }}" method="post">
            @csrf
            @method('DELETE')
         </form>
      </div>
   </div>
</div>
@endsection