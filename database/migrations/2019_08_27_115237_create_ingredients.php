<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredients extends Migration
{
    public function up(): void
    {
        Schema::create('ingredients', function (Blueprint $table): void {
            $table->bigIncrements('id');
            $table->string('name');
            $table->float('price');
            $table->timestamps();
            // $table->softDeletes();
            // $table->float('percentage')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ingredients');
    }
}
