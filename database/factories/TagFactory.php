<?php

use App\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    
    $name = $faker->word;
    return [
        'name' => $name,
        'slug' => str_slug($name)
    ];
});
