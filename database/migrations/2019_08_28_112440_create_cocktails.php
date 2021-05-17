<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCocktails extends Migration
{
    public function up(): void
    {
        Schema::create('cocktails', function (Blueprint $table): void {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('img')->nullable();
            $table->text('preparation');
            $table->text('garnish');
            $table->string('selling_price');
            $table->timestamps();
            // $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cocktails');
    }
}
