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
                  <span class="text-primary"> {{ $post->user->username}}</span>
              </div>
              
              <div class="comment-lists">
                @if (count($post->comments()) > 0)
                  @foreach ($post->comments() as $reply)
                  <div class="media border-bottom mb-3 py-4">
                      <a class="d-flex" href="#" class="bg-light">
                      <img src="{{ cms_thumbnail($reply->user->thumbnail) }}">
                      </a>
                      <div class="media-body">
                        <h5>{{ $reply->user->username }}</h5>
                       <div class="comment-meta">
                         {{ $reply->user->created_at->diffForHumans() }}
                       </div>
                       <p>
                          {{ $reply->content }}
                        </p> 


                        <div class="reply-box">
                            <a href="" class="btn btn-link reply">Reply</a>
                            <form action="{{ route('reply.store',[$post->slug,$reply->id]) }}" class="reply-form" method="post">
                               @csrf
                               <div class="form-group">
                                   <textarea name="content" class="form-control" rows="10"></textarea>
                               </div>
                            <button class="btn btn-primary" type="submit">Submit</button>
                             </form>
     
                        </div>
 
                        
                        {{-- Child Reply start --}}

                        @if (count($reply->replies) > 0)
                        @foreach ($reply->replies as $chld_reply)
                        <div class="media border-bottom mb-3 py-4 pl-3">
                            <a class="d-flex" href="#" class="bg-light">
                            <img src="{{ cms_thumbnail($chld_reply->user->thumbnail) }}">
                            </a>
                            <div class="media-body">
                              <h5>{{ $chld_reply->user->username }}</h5>
                             <div class="comment-meta">
                               {{ $chld_reply->user->created_at->diffForHumans() }}
                             </div>
                             <p>
                                {{ $chld_reply->content }}
                              </p> 
      
                              {{-- {{ count($chld_reply->replies) > 0 ? $chld_reply->replies : '' }} --}}
                              <div class="reply-box">
                                  <a href="#" class="btn btn-link reply">Reply</a>
                                  <form action="{{ route('reply.store',[$post->slug,$chld_reply->id]) }}" class="reply-form" method="post">
                                     @csrf
                                     <div class="form-group">
                                         <textarea name="content" class="form-control" rows="10"></textarea>
                                     </div>
                                  <button class="btn btn-primary" type="submit">Submit</button>
                                   </form>
           
                              </div>

                              {{-- {{ $chld_reply->replies }}             --}}
                              {{-- Child Reply start --}}

                          @if (count($chld_reply->replies) > 0)
                          @foreach ($chld_reply->replies as $chld2_reply)
                          <div class="media border-bottom mb-3 py-4 pl-3">
                              <a class="d-flex" href="#" class="bg-light">
                              <img src="{{ cms_thumbnail($chld2_reply->user->thumbnail) }}">
                              </a>
                              <div class="media-body">
                                <h5>{{ $chld2_reply->user->username }}</h5>
                              <div class="comment-meta">
                                {{ $chld2_reply->user->created_at->diffForHumans() }}
                              </div>
                              <p>
                                  {{ $chld2_reply->content }}
                                </p> 
        
                                {{ count($chld2_reply->replies) > 0 ? $chld2_reply->replies : '' }}
                                <div class="reply-box">
                                    <a href="#" class="btn btn-link reply">Reply</a>
                                    <form action="{{ route('reply.store',[$post->slug,$chld2_reply->id]) }}" class="reply-form" method="post">
                                      @csrf
                                      <div class="form-group">
                                          <textarea name="content" class="form-control" rows="10"></textarea>
                                      </div>
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                    </form>
            
                                </div>
                                        
                              </div>
                            </div> 
                            @endforeach
        
                            @endif 
        
        

                          {{-- Child Reply End --}}


                                      
                            </div>
                          </div>
      
                          @endforeach
      
                          @endif
      
      

                        {{-- Child Reply End --}}

                                
                      </div>
                    </div>

                    @endforeach

                    @endif

                
              </div>

              

              <div class="comment-form">
                {{ cms_notification($errors) }}
                <h3 class="font-weight-bold mb-3">Write your message</h3>
              <form action="{{ route('comment.store',$post->slug) }}" method="post">
                  @csrf
                  <div class="form-group">
                      <textarea name="content" class="form-control" rows="10"></textarea>
                  </div>
               <button class="btn btn-primary" type="submit">Submit</button>
                </form>
              </div>

          </div>


        </div>



      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    @endsection
