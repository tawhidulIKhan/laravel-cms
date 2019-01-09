@extends('layouts.main')

@section('content')

@include('frontend.partials.breadcrumb',['title'=>$name])

    <!-- Page Content -->
    <div class="container my-5">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">


          @if (count($posts) > 0)
              @foreach ($posts as $post)
          <!-- Blog Post -->
          <div class="card mb-4">
          <img class="card-img-top" src="{{ cms_thumbnail($post->thumbnail) }}" alt="Card image cap">
              <div class="card-body">
                <h2 class="card-title">{{$post->title}}</h2>
                @if ($post->short_content)
                <p class="card-text">{{ strip_tags($post->short_content) }}</p>
                    
                @else
                <p class="card-text">{{ str_limit(strip_tags($post->content), 250)  }}</p>
                @endif
  
       <a href="{{ route('post.single',$post->slug) }}" class="btn btn-primary">Read More &rarr;</a>
              </div>
              <div class="card-footer text-muted">
                Posted on {{ $post->created_at->format('d F , Y') }} by
              <a href="#">{{ $post->user->username }}</a>
              </div>
            </div>
  
            <!-- Blog Post -->
                    
              @endforeach
                  
              @else
                <h2>Sorry no posts found .. Search with Diffrent word</h2>          
          @endif
            {{ $posts->links() }}
        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            @include('frontend.partials.sidebar',['categories',$categories])


        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    @endsection
