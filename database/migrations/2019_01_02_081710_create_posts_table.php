<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',128);
            $table->text('content');
            $table->text('short_content');
            $table->string('thumbnail',128);
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('tag_id');
            $table->unsignedInteger('user_id');
            $table->enum('status',['publish','draft']);
            $table->enum('type',['normal','audio','video']);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
