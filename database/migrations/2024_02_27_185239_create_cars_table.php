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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('kilometers');
            $table->string('primary_image');
            $table->decimal('price', 10, 2);
            $table->text('description')->nullable();
            $table->date('registration')->nullable();
            $table->boolean('is_sold')->default(false);
            $table->boolean('is_published')->default(false);
            $table->foreignId('model_id')->constrained('models');
            $table->foreignId('engine_id')->constrained('engines');
            $table->foreignId('color_id')->constrained('colors');
            $table->foreignId('drive_type_id')->constrained('drive_types');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
