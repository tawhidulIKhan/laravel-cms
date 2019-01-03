@extends('layouts.main')

@section('content')


    <!-- Page Content -->
    <div class="container my-5">

      <div class="row">
          <div class="col-8 m-auto">

            {{ cms_notification($errors) }}

            <h4 class="mt-3">login</h4>


            <form action="{{ route('login') }}" method="post" class="shadow p-4 bg-white my-5">

            @csrf


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

              <button type="submit" class="btn btn-primary">Login</button>

            </form>
          </div>
      </div>
    </div>
        @endsection
