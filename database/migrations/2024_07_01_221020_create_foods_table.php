<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('resturent_id')->references('id')->on('resturents')->onDelete('cascade');
            $table->string('name');
            $table->string('material')->nullable();
            $table->string('price');
            $table->string('picture')->nullable();
            $table->string('tags');
            $table->integer('discount')->nullable();
            $table->boolean('food_party')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foods');
    }
};
