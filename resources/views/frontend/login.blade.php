@extends('layouts.main')

@section('content')


    <!-- Page Content -->
    <div class="container">

      <div class="row">

        @if(session('type') === 'success')
          <div class="alert alert-success">
            {{ session('message') }}
          </div>
        @endif
        <h3>Login</h3>
      </div></div>
        @endsection
