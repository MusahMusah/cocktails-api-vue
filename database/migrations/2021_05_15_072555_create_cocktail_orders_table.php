<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCocktailOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cocktail_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cocktail_id')->unique()->nullable();
            $table->foreign('cocktail_id')->references('id')->on('cocktails');
            $table->unsignedBigInteger('user_id')->unique()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('ingredient_id')->unique()->nullable();
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
        Schema::dropIfExists('cocktail_orders');
    }
}
