@extends('layouts.backend')

@section('content')
    


<div class="wrapper my-4">
            

        <h4 class="mb-4">Edit Tag</h4>

        {{ cms_notification($errors) }}

                <form role="form" method="POST" action="{{ route('tags.update',$tag->slug) }}"
                >
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Name</label>
                    <input class="form-control" type="text" name="name" value="{{ $tag->name }}">
                    </div>
                    <button type="submit" class="btn btn-primary text-white">Update Category</button>
                </form>
            </div>
        <!-- /#page-wrapper -->
        @endsection
