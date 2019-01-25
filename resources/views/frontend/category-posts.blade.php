@extends('layouts.main')

@section('content')

@include('frontend.partials.breadcrumb',['title'=>$name])

    <!-- Page Content -->
    <div class="container my-5">

      <div class="row">
        <!-- Blog Entries Column -->

          @if (count($posts) > 0)
              @foreach ($posts as $post)

              <div class="col-4">
                <div class="shadow-sm bg-white m-1 mb-4">

                <img class="img-fluid" src="{{ cms_thumbnail($post->thumbnail,'sm') }}" alt="Card image cap">
                <div class="content px-5 py-4">

                    <h5 class="mb-3">

                    <a href="{{ route('post.single',$post->slug)}}" class="text-dark">{{ str_limit($post->title,19)}}</a>

                    </h5>
                    @if ($post->short_content)
                    <p class="card-text">{{ str_limit(strip_tags($post->short_content),200)  }}</p>
                        
                    @else
                               <p class="card-text">{{ str_limit(strip_tags($post->content), 250)  }}</p>
           @endif
                  @include('frontend.partials.postmeta')
                      
                </div>
        
              </div>
            </div>
        
            <!-- Blog Post -->
                    
              @endforeach
          @endif

          <!-- Pagination -->



      </div>
      {{ $posts->links() }}

      <!-- /.row -->

    </div>
    <!-- /.container -->

    @endsection
