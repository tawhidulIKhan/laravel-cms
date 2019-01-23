@extends('layouts.backend')

@section('content')

@if (auth()->user()->isAdmin() || auth()->user()->isSuperAdmin())
    

<div class="row m-0 my-5">

            <div class="col-md-4 col-12 col-sm-6">

                    <div class="dash-block shadow-sm py-5 align-items-center px-4 bg-white text-center d-flex justify-content-center">
                        <div class="icon bg-primary mr-3">
                            <i class="fa fa-book text-white" aria-hidden="true"></i>
                        </div>
                            <h5 class="mb-0 font-weight-normal">Total Posts <span>{{$total_post}}</span></h5>
                      
                    </div>
            
            </div>

            
            <div class="col-md-4 col-12 col-sm-6">
                    <div class="dash-block shadow-sm py-5 align-items-center px-4 bg-white text-center d-flex justify-content-center">
                            <div class="icon bg-info mr-3">
                                <i class="fa fa-tags text-white" aria-hidden="true"></i>
                            </div>
                                <h5 class="mb-0 font-weight-normal">Total Categories <span>{{$total_category}}</span></h5>
                      
                    </div>
            
            </div>

            
        <div class="col-md-4 col-12 col-sm-6">
                <div class="dash-block shadow-sm py-5 align-items-center px-4 bg-white text-center d-flex justify-content-center">
                        <div class="icon bg-success mr-3">
                            <i class="fa fa-user text-white" aria-hidden="true"></i>
                        </div>
            <h5 class="mb-0 font-weight-normal">Total Users <span>{{ $total_user }}</span></h5>
                  
                </div>
        
        </div>

    </div>
    @endif

@endsection
