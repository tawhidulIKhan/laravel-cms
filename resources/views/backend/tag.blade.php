@extends('layouts.backend')

@section('content')
<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tag</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-8">
            <h3>{{ $tag->name }}</h3>
            <a href="{{ route('tags.edit',$tag->slug) }}" class="btn btn-success">Edit</a>
            
            <a href="#" class="btn btn-danger" onclick="document.querySelector('#delForm').submit()">Del</a>
            <form id="delForm" style="display:none" action="{{ route('tags.destroy',$tag->slug) }}" method="POST">
                    @csrf
                    @method('DELETE')
                </form>
     
        </div>
        </div>

    </div>
    
    @endsection
