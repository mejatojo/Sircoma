<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesLanguesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_langues', function (Blueprint $table) {
            $table->id();
            $table->string('name_category');
            $table->string('slug_category'); 
            $table->unsignedBigInteger('id_lang');
            $table->foreign('id_lang')->references('id')->on('langues')->onDelete('cascade');
            $table->unsignedBigInteger('id_cat');
            $table->foreign('id_cat')->references('id')->on('categories');
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
        Schema::dropIfExists('categories_langues');
    }
}
