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
        Schema::create('location_offer', function (Blueprint $table) {
            $table->foreignId('location_id')->constrained('categories');
            $table->foreignId('offer_id')->constrained('offers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('location_offer', function (Blueprint $table) {
            $table->foreignId(['location_id']);
            $table->foreignId(['offer_id']);
            Schema::dropIfExists();
        });
    }
};
