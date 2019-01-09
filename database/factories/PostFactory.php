<?php

use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    
    $content = $faker->paragraph(100);
    $short_content = str_limit($content,250);
    $title = $faker->sentence(10);
    return [
        'title' => $title,
        'slug' => str_slug($title),
        'content' => $content,
        'short_content' => $short_content,
        'thumbnail' => $faker->image('public/storage/images',500,400,null,false),
        'user_id' => User::all()->random(),
        'status' => 'publish',
        'type' => 'normal'
    ];
});
