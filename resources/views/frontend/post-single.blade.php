@extends('layouts.main')

@section('content')

@include('frontend.partials.breadcrumb',['title'=>'Our Blog'])

    <!-- Page Content -->
    <div class="container py-5">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-10 m-auto">

          <div class="content single-post w-100">
              <img class="w-100" src="{{ cms_thumbnail($post->thumbnail) }}" alt="Card image cap">
              <h3 class="font-weight-bold my-4">{{ $post->title }}</h3>
              <p>{!! $post->content !!}</p>

              <div class="post-meta border-top border-bottom py-3 mb-4">
                  Posted on {{ $post->created_at->diffForHumans() }} by
                  by <a href="{{route('post.author',$post->user->username) }}">{{ $post->user->username }}</a>
                </div>


              <div class="post-meta border-bottom pb-3 mb-4">
              <span>Categories : </span>
                @foreach ($post->categories as $cat)
              <a class="btn btn-link btn-sm text-uppercase" href="{{route('posts.category',$cat->slug)}}">{{ $cat->name }}</a>
                @endforeach
                <br>
                <span>Tags : </span>
                @foreach ($post->tags as $tag)
              <a class="btn btn-link btn-sm text-uppercase" href="{{route('posts.tag',$tag->slug)}}">{{ $tag->name }}</a>
                @endforeach
          </div>



                  <div class="comment-lists">

                        @include('frontend.partials.reply-lists',["comments" => $post->comments(),"post"=>$post]) 

              </div>

              

              <div class="comment-form bg-white shadow-sm p-4">
                {{ cms_notification($errors) }}
                <h3 class="font-weight-bold mb-3">Write your message</h3>
              <form action="{{ route('comment.store',$post->slug) }}" method="post">
                  @csrf
                  <div class="form-group">
                      <textarea name="content" class="form-control" rows="10"></textarea>
                  </div>
               <button class="btn btn-primary btn-md text-white" type="submit">Submit</button>
                </form>
              </div>

          </div>


        </div>



      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    @endsection
