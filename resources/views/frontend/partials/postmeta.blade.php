<div class="border-top pt-4 mt-4">
by <a href="{{route('post.author',$post->user->username) }}">{{ $post->user->username }}</a>
              on 
              {{ $post->created_at->diffForHumans() }} 
            </div>
    