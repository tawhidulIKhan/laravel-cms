<?php

namespace App\Listeners;

use App\Tag;
use Illuminate\Support\Facades\Cache;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TagCacheListener
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
        cache()->forget('tags');
        $tags = Tag::orderBy('created_at','desc')->paginate(10);
        cache()->forever('tags',$tags);
    }
}
