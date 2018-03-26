<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project', function (Blueprint $table) {

            $table->increments('id');

            // detalhes do projeto
            $table->string('title');
            $table->string('description');
            $table->longText('content');
            $table->string('thumbnail_img');
            $table->string('cover_img');
            $table->string('customer_name');

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
