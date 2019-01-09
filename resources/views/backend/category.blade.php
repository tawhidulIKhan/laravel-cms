@extends('layouts.backend')

@section('content')
<div class="wrapper my-4">

        <h4 class="mb-4">Category</h4>


<div class="card">
    <img src="{{ asset('storage/images/'.$category->thumbnail) }}" class="card-img-top">

    <div class="card-body">
            <h3>{{ $category->name }}</h3>
            <p>{{ $category->description }}</p>
            <a href="{{ route('categories.edit',$category->slug) }}" class="btn btn-success">Edit</a>
            
            <a href="#" class="btn btn-danger" onclick="document.querySelector('#delForm').submit()">Del</a>
            <form id="delForm" style="display:none" action="{{ route('categories.destroy',$category->slug) }}" method="POST">
                    @csrf
                    @method('DELETE')
                </form>
     
    </div>
</div>
            </div>

    
    @endsection
