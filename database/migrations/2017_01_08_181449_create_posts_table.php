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
        //
        Schema::create('post', function (Blueprint $table) {

            $table->increments('id');

            $table->string('title');
            $table->string('slug');
            $table->string('description');

            $table->string('description_seo');
            $table->string('keywords_seo');

            $table->longText('content');
            $table->dateTime('publish_at');
            $table->boolean('is_active');

            $table->string('cover_img');
            $table->string('thumbnail_img');

            $table->timestamps();

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('posts');
    }
}
