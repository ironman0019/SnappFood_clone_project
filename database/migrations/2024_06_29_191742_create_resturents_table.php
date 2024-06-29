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
        Schema::create('resturents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seller_id')->references('id')->on('sellers')->onDelete('cascade');
            $table->string('name');
            $table->string('tag');
            $table->string('phone');
            $table->text('address');
            $table->string('bank');
            $table->string('photo')->nullable();
            $table->integer('delivary_price')->nullable();
            $table->string('work_hours')->nullable();
            $table->string('status')->default('closed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resturents');
    }
};
