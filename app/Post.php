<?php

namespace App;

use App\Tag;
use App\User;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Relationships 

    public function user(){
     
        return $this->hasOne(User::classs);
    }

    public function categories(){

        return $this->hasMany(Category::class);
    }

    public function tags(){

        return $this->hasMany(Tag::class);
    }

}
