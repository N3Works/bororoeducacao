<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCourseProfessor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('course_professor', function (Blueprint $table) {

            $table->integer('course_id')->unsigned();
            $table->integer('professor_id')->unsigned();

            $table->foreign('course_id')->references('id')->on('course');
            $table->foreign('professor_id')->references('id')->on('professor');

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
