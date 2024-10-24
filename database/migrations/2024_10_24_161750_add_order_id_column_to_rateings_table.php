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
        Schema::table('rateings', function (Blueprint $table) {
            $table->foreignId('order_id')->after('resturent_id')->constrained('orders', 'id')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rateings', function (Blueprint $table) {
            $table->dropColumn('rateings');
        });
    }
};
