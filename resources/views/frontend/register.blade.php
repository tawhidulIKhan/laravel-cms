@extends('layouts.main')

@section('content')


    <!-- Page Content -->
    <div class="container">

      <div class="row">
          <div class="col-8 m-auto">
            <h4 class="mt-3">Register</h4>

            @if($errors->any())
            <div class="alert alert-danger">
              @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
              @endforeach
            </div>
            @endif

            <form action="{{ route('register') }}" method="post" enctype="multipart/form-data" class="shadow p-4 bg-white my-5">

            @csrf

              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" 
                placeholder="Type Username" aria-describedby="helpId">
              </div>

              <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" name="firstname" id="firstname" class="form-control" 
                placeholder="Type First Name" aria-describedby="helpId">
              </div>

              <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" name="lastname" id="lastname" class="form-control" 
                placeholder="Type Last Name" aria-describedby="helpId">
              </div>


              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" 
                placeholder="Type Email" aria-describedby="helpId">
              </div>

              <div class="form-group">
                <label for="thumbnail">Profile Photo</label>
                <input type="file" name="thumbnail" id="thumbnail" class="form-control" 
                aria-describedby="helpId">
              </div>


              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" 
                aria-describedby="helpId" placeholder="Enter Password">
              </div>

              <div class="form-group">
                <label for="confirmpassword">Confirm Password</label>
                <input type="password" name="password_confirmation" id="confirmpassword" class="form-control" 
                aria-describedby="helpId" placeholder="Enter Confirm Password">
              </div>

              <button type="submit" class="btn btn-primary">Register</button>

            </form>
          </div>
      </div>
    </div>

    @endsection
