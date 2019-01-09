@extends('layouts.backend')

@section('content')
    

<div class="wrapper my-4">
            

        <h4 class="mb-4">Add New Tag</h4>


        {{ cms_notification($errors) }}

                <form role="form" method="POST" action="{{ route('tags.store') }}"
                 enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" type="text" name="name">
                    </div>
                    <button type="submit" class="btn btn-primary text-white">Add Tag</button>
                </form>
    

            </div>
        <!-- /#page-wrapper -->
        @endsection
