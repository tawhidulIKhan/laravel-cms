<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $guarded = [];

    public function post(){
    
        return $this->belongsTo(Post::class);
    
    }

    public function replies(){
        return $this->hasMany(Reply::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
