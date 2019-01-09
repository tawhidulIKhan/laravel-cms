<?php

namespace App\Providers;

use App\Events\TagCreated;
use App\Events\TagDeleted;
use App\Events\TagUpdated;
use App\Events\PostCreated;
use App\Events\PostDeleted;
use App\Events\PostUpdated;
use App\Events\CategoryCreated;
use App\Events\CategoryDeleted;
use App\Events\CategoryUpdated;
use App\Listeners\TagCacheListener;
use App\Listeners\PostCacheListener;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Listeners\CategoryCacheListener;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        CategoryCreated::class => [
            CategoryCacheListener::class
        ],
        CategoryUpdated::class => [
            CategoryCacheListener::class
        ],
        CategoryDeleted::class => [
            CategoryCacheListener::class
        ],
        TagCreated::class => [
            TagCacheListener::class
        ],
        TagUpdated::class => [
            TagCacheListener::class
        ],
        TagDeleted::class => [
            TagCacheListener::class
        ],
        PostCreated::class => [
            PostCacheListener::class
        ],
        PostUpdated::class => [
            PostCacheListener::class
        ],
        PostDeleted::class => [
            PostCacheListener::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
