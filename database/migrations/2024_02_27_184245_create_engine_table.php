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
        Schema::create('engine', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('engine_value');
            $table->smallInteger('horsepower');
            $table->foreignId('fuel_id')->constrained('fuel');
            $table->foreignId('transmission_id')->constrained('transmission');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('engine');
    }
};
