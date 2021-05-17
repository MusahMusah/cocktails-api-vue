<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoriteIngredient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorite_ingredient', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('favorite_id');
            $table->unsignedBigInteger('ingredient_id');

            $table->foreign('favorite_id')->references('id')->on('favorites');
            $table->foreign('ingredient_id')->references('id')->on('ingredients');
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
        Schema::dropIfExists('favorite_ingredient');
    }
}
