<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableResources extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource', function (Blueprint $table) {

            $table->increments('id');

            // detalhes do projeto
            $table->string('name');
            $table->string('slug')->nullable();
            $table->enum('resource_type', ['ebook', 'template', 'video'])->nullable();
            $table->string('description')->nullable();
            $table->longText('content')->nullable();
            $table->string('thumbnail_img')->nullable();
            $table->string('resource_file')->nullable();
            $table->string('resource_file_name')->nullable();
            $table->boolean('is_active')->default(1);
            $table->integer('qty_downloads')->nullable()->default(0);
            $table->integer('qty_views')->nullable()->default(0);

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
