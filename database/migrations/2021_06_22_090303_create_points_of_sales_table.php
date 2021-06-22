<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointsOfSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('points_of_sales', function (Blueprint $table) {
            $table->id();
            $table->text('point')->nullable();
            $table->unsignedBigInteger('id_lang');
            $table->foreign('id_lang')->references('id')->on('langues');
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
        Schema::dropIfExists('points_of_sales');
    }
}
