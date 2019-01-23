<?php

namespace App;

use App\Post;
use App\Events\TagCreated;
use App\Events\TagDeleted;
use App\Events\TagUpdated;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
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
        'created' => TagCreated::class,
        'updated' => TagUpdated::class,
        'deleted' => TagDeleted::class,
    ];

    // Route Key

    public function getRouteKeyName(){
        return 'slug';
    }

}
