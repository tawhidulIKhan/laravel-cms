<?php

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class,20)->create();

        $categories = Category::all();
        $tags = Tag::all();

        Post::all()->each(function($post) use ($categories,$tags){
            $post->categories()->attach($categories->random(rand(1,3))->pluck('id')->toArray());
            $post->tags()->attach($tags->random(rand(1,3))->pluck('id')->toArray());
        });
    }
}
