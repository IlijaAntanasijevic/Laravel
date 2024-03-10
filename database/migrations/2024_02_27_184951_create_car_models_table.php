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
        Schema::create('car_models', function (Blueprint $table) {
            $table->id();
            $table->foreignId('model_id')->constrained('models');
            $table->foreignId('brand_id')->constrained('brands');
            $table->foreignId('body_id')->constrained('bodies');
            $table->foreignId('seat_id')->constrained('seats');
            $table->foreignId('doors_id')->constrained('doors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('models');
    }
};
