<?php

namespace App;

use App\Post;
use App\Events\CategoryCreated;
use App\Events\CategoryDeleted;
use App\Events\CategoryUpdated;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $guarded = [];
    // Relationship

    public function posts(){
        return $this->belongsToMany(Post::class);
    }

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => CategoryCreated::class,
        'updated' => CategoryUpdated::class,
        'deleted' => CategoryDeleted::class,
    ];

    // Route Key

    public function getRouteKeyName(){
        return 'slug';
    }


}
