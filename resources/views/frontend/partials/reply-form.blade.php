<div class="reply-box mb-4">
        <a href="" class="btn btn-link reply">Reply</a>
        <form action="{{ route('reply.store',[$post->slug,$comment->id]) }}" class="reply-form shadow-sm p-4 bg-white " method="post">
           @csrf
           <div class="form-group">
               <textarea name="content" class="form-control" rows="10"></textarea>
           </div>
        <button class="btn btn-primary text-white" type="submit">Submit</button>
         </form>

    </div>

