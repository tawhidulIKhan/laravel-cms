<?php

use App\Tag;
use App\Post;
use App\User;
use App\Reply;
use App\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        factory(Category::class,50)->create();
        factory(Tag::class,50)->create();
        factory(User::class,10)->create();
     factory(Post::class,50)->create();
       factory(Reply::class,100)->create();


        $categories = Category::all();
        $tags = Tag::all();

        Post::all()->each(function($post) use ($categories,$tags){
            $post->categories()->attach(
                $categories->random(rand(1,3))->pluck('id')->toArray()
            );

            $post->tags()->attach(
                $tags->random(rand(1,3))->pluck('id')->toArray()
            );
        });
    }
}
