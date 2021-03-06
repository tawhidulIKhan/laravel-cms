@extends('layouts.backend')

@section('content')

<div class="wrapper my-4">
            

        <h4 class="mb-4">Posts</h4>


                {{ cms_notification($errors) }}

                                        
                      <table width="100%" id="generalpostTable" class="text-center table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th>No.</th>

                                    <th>Thumbnail</th>

                                    <th>Content</th>
                                
                                    <th>Categories</th>

                                    <th>Actions</th>

                                </tr>


                            </thead>
                            <tbody>
                             @if(count($posts) > 0)
                             @php $i = 1 @endphp
                                @foreach ($posts as $post)

                                <tr class="gradeA odd" role="row">
                                        <td class="sorting_1">{{ $i }}</td>
                                        <td><img width="100" height="100" src="{{ asset('storage/images/'.$post->thumbnail) }}" alt=""></td>
                                        <td class="sorting_1">{{ $post->title }}</td>
                                        <td class="sorting_1">
                                            @if (count($post->categories) > 0)
                                                @foreach ($post->categories as $category)
                                        <span>{{ $category->name }}</span>
                                                @endforeach
                                            @endif    
                                        
                                        </td>
                                    <td class="center">
                                    <a href="{{ route('posts.show',$post->slug) }}" 
                                        class="btn btn-primary text-white ">Details</a>
                                    </td>
                                </tr>
                                @php $i++ @endphp
                                @endforeach

                                @endif   
                                </tbody>
                        </table>
                    
                    
                    


                                {{ $posts->links() }}
                                
    </div>

    @endsection
