@extends('layouts.backend')

@section('content')
<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-4">
            <img src="{{ asset('storage/images/'.$category->thumbnail) }}" width="100%">
            </div>
            <div class="col-md-8">
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
