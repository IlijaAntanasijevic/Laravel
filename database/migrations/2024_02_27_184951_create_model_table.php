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
        Schema::create('model', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('year');
            $table->foreignId('brand_id')->constrained('brand');
            $table->foreignId('body_id')->constrained('body');
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
        Schema::dropIfExists('model');
    }
};
