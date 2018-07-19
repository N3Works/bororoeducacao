<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePerson extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person', function (Blueprint $table) {

            $table->increments('id');

            // detalhes do projeto
            $table->string('name');
            $table->string('description');
            $table->string('content');
            $table->string('thumbnail_img');
            $table->string('url_facebook');
            $table->string('url_linkedin');
            $table->string('url_instagram');
            $table->integer('position')->default(99999);

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
    }
}
