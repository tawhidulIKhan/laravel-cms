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
            $table->string('slug',128);
            $table->text('content')->nullable();
            $table->text('short_content')->nullable();
            $table->string('thumbnail',128)->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });

        Schema::table('posts', function($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
