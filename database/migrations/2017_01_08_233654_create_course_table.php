<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course', function (Blueprint $table) {

            $table->increments('id');


            // detalhes do curso
            $table->string('title');
            $table->string('description')->nullable();
            $table->longText('content')->nullable();
            $table->string('thumbnail_img')->nullabe();
            $table->string('cover_img')->nullable();

            // localização
            $table->string('address')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('location')->nullable();

            // agenda
            $table->string('duration')->nullable();
            $table->dateTime('start_at')->nullable();
            $table->dateTime('end_at')->nullable();
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();

            // preço
            $table->double('price')->nullable();
            $table->boolean('is_price_visible')->nullable();

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
