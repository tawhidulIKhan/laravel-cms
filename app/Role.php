<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $guarded = [];
    
    // users

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function getRouteKeyName(){
        return 'slug';
    }
}
