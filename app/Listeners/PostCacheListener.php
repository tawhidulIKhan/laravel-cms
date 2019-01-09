<?php

namespace App\Listeners;

use App\Post;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostCacheListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        cache()->forget('posts');
        $posts = Post::with('user')->orderBy('created_at','desc')->paginate(10);
        cache()->forever('posts',$posts);
    }
}
