@extends('layouts.backend')

@section('content')
<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tables</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                {{ cms_notification($errors) }}
                <div class="panel panel-default">
                    <div class="panel-heading">
                       Categories
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div id="dataTables-example_wrapper" 
                        class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <div class="row"><div class="col-sm-6">
                            <div class="dataTables_length" id="dataTables-example_length">
                                <label>Show 
                                    
                                <select name="dataTables-example_length" 
                                    aria-controls="dataTables-example"
                                     class="form-control input-sm" id="catLength">
                                     <option value="2">2</option>
                                     <option value="3">3</option>
                                     <option value="10">10</option>
                                     <option value="25">25</option>
                                     <option value="50">50</option>
                                     <option value="100">100</option>
                                    </select> entries</label>
                                </div></div><div class="col-sm-6">
                                    <div id="dataTables-example_filter" 
                                    class="dataTables_filter"><label>Search:
                                        <input type="search" 
                                        class="form-control input-sm" placeholder="" 
                                        aria-controls="dataTables-example" id="categorySearch"></label></div></div></div><div class="row"><div class="col-sm-12">
                                         
                                        
                      <table width="100%" id="generalCategoryTable" class="text-center table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" 
                                    aria-controls="dataTables-example" 
                                    rowspan="1" colspan="1" 
                                    style="width: 110px;">No.</th>

                                    <th class="sorting" tabindex="0" 
                                    aria-controls="dataTables-example" 
                                    rowspan="1" colspan="1" 
                                    style="width: 110px;">Name</th>

                                    <th class="sorting" tabindex="0" 
                                    aria-controls="dataTables-example" 
                                    rowspan="1" colspan="1" 
                                    style="width: 110px;">Description</th>
                                
                                    <th class="sorting" tabindex="0" 
                                    aria-controls="dataTables-example" 
                                    rowspan="1" colspan="1" 
                                    style="width: 110px;">Thumbnail</th>

                                    <th class="sorting" tabindex="0" 
                                    aria-controls="dataTables-example" 
                                    rowspan="1" colspan="1" 
                                    style="width: 110px;">Actions</th>

                                </tr>


                            </thead>
                            <tbody>
                             @if(count($categories) > 0)
                             @php $i = 1 @endphp
                                @foreach ($categories as $category)

                                <tr class="gradeA odd" role="row">
                                        <td class="sorting_1">{{ $i }}</td>
                                        <td class="sorting_1">{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td><img width="100" height="100" src="{{ asset('storage/images/'.$category->thumbnail) }}" alt=""></td>
                                    <td class="center">
                                    <a href="{{ route('categories.show',$category->slug) }}" class="btn btn-primary">Details</a>
                                    </td>
                                </tr>
                                @php $i++ @endphp
                                @endforeach

                                @endif   
                                </tbody>
                        </table>
                    
                    
                    
                        <table width="100%" id="ajaxCategoryTable" style="display:none" class=" table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" 
                                        aria-controls="dataTables-example" 
                                        rowspan="1" colspan="1" 
                                        style="width: 110px;">No.</th>
    
                                        <th class="sorting" tabindex="0" 
                                        aria-controls="dataTables-example" 
                                        rowspan="1" colspan="1" 
                                        style="width: 110px;">Name</th>
    
                                        <th class="sorting" tabindex="0" 
                                        aria-controls="dataTables-example" 
                                        rowspan="1" colspan="1" 
                                        style="width: 110px;">Description</th>
                                    
                                        <th class="sorting" tabindex="0" 
                                        aria-controls="dataTables-example" 
                                        rowspan="1" colspan="1" 
                                        style="width: 110px;">Thumbnail</th>
    
                                        <th class="sorting" tabindex="0" 
                                        aria-controls="dataTables-example" 
                                        rowspan="1" colspan="1" 
                                        style="width: 110px;">Actions</th>
    
                                    </tr>
    
    
                                </thead>
                                <tbody id="ajaxCategories">
                               
                                    </tbody>
                            </table>



                    </div></div>
                    
                    <div class="row">
                            <div class="col-sm-6">
                                {{ $categories->links() }}
                                
                            </div></div></div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>

    <script>

            $("#categorySearch").on('keyup',function(){

                let query = $(this).val();

                if(query){
                    $("#ajaxCategoryTable").show();
                    $("#generalCategoryTable").hide();
                }else{
                    $("#ajaxCategoryTable").hide();
                    $("#generalCategoryTable").show();
                }

                $.ajax({
                    url:"{{ route('categories.categorySearch') }}",
                    method:"post",
                    data:{
                        "search":query,
                        "_token":"{{ csrf_token() }}",
                        },
                    dataType:"html",
                    success:function(response){
                      if(response){

                        $('#ajaxCategories').html(response);

                      }  
                    }
                });
            });


            $("#catLength").on('change',function(){

let query = $(this).val();

if(query){
    $("#ajaxCategoryTable").show();
    $("#generalCategoryTable").hide();
}else{
    $("#ajaxCategoryTable").hide();
    $("#generalCategoryTable").show();
}

$.ajax({
    url:"{{ route('categories.categoryLimit') }}",
    method:"post",
    data:{
        "limit":query,
        "_token":"{{ csrf_token() }}",
        },
    dataType:"html",
    success:function(response){
      if(response){

        $('#ajaxCategories').html(response);

      }  
    }
});
});



    </script>

    @endsection
