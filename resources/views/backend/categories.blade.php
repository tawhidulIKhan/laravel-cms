@extends('layouts.backend')

@section('content')


        <div class="wrapper my-4">
            

        <h4 class="mb-4">Categories</h4>


        {{ cms_notification($errors) }}

                                         
        <table id="generalCategoryTable" 
        class="text-center table table-striped table-bordered table-hover dataTable 
        no-footer dtr-inline" id="dataTables-example">
                <thead>
                    <tr role="row">
                        <th>No.</th>

                        <th>Name</th>

                        <th>Description</th>
                    
                        <th>Thumbnail</th>

                        <th>Actions</th>

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
                        <td>
                            <img width="100" height="100" 
                            src="{{ asset('storage/images/'.$category->thumbnail) }}" alt=""></td>
                        <td class="center">
                        <a href="{{ route('categories.show',$category->slug) }}" 
                            class="btn btn-primary text-white">Details</a>
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


                <div class="row">
                        <div class="col-sm-6">
                            {{ $categories->links() }}
                            
                        </div></div>
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
