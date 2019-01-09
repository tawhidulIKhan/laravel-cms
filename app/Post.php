<?php

namespace App;

use App\Tag;
use App\User;
use App\Reply;
use App\Category;
use App\Events\PostCreated;
use App\Events\PostDeleted;
use App\Events\PostUpdated;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $guarded = [];



 /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => PostCreated::class,
        'updated' => PostUpdated::class,
        'deleted' => PostDeleted::class,
    ];



    // Relationships 

    public function user(){
     
        return $this->belongsTo(User::class);
    }

    public function categories(){

        return $this->belongsToMany(Category::class);
    }

    public function tags(){

        return $this->belongsToMany(Tag::class);
    }

    public function replies(){

        return $this->hasMany(Reply::class);

    }
    public function comments(){

        return $this->replies()->where('reply_id','=',null)->get();
    }

    public function getRouteKeyName(){
        return 'slug';
    }
}
