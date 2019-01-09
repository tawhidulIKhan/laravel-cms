@extends('layouts.main')

@section('content')


    <!-- Page Content -->
    <div class="container">

      <div class="row">
          <div class="col-8 m-auto">
            <h4 class="mb-5 mt-5 font-weight-bold">Register</h4>

            @if($errors->any())
            <div class="alert alert-danger">
              @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
              @endforeach
            </div>
            @endif

            <form action="{{ route('register') }}" method="post" enctype="multipart/form-data" class="shadow p-5 bg-white mb-5">

            @csrf


            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" 
                placeholder="Type username">
              </div>


              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" 
                placeholder="Type Email" aria-describedby="helpId">
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

              <button type="submit" class="btn btn-primary text-white text-uppercase">Register</button>

            </form>
          </div>
      </div>
    </div>

    @endsection
