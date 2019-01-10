@foreach ($comments as $comment)

<div class="media pt-4 pl-3">
        <a class="d-flex" href="#" class="bg-light">
        <img src="{{ cms_thumbnail($comment->user->thumbnail) }}">
        </a>
        <div class="media-body">
          <h5>{{ $comment->user->username }}</h5>
        <div class="comment-meta my-2">
          {{ $comment->user->created_at->diffForHumans() }}
        </div>
        <p>
            {{ $comment->content }}
          </p> 

          @include('frontend.partials.reply-form',[$post,$comment])

          @include('frontend.partials.reply-lists',["comments" => $comment->replies,"post"=>$post])
                  
        </div>
   

    </div> 

     @endforeach 