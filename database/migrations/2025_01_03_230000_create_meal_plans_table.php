<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecutar las migraciones.
     */
    public function up(): void
    {
        Schema::create('meal_plans', function (Blueprint $table) {  // Nombre de tabla corregido
            $table->id();

            $table->string('name')->nullable();
            $table->string('total_calories')->nullable();
            $table->string('total_fats')->nullable();
            $table->string('total_carbs')->nullable();
            $table->string('total_proteins')->nullable();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('workout_plan_id')->constrained()-> onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Revertir las migraciones.
     */
    public function down(): void
    {
        Schema::dropIfExists('meal_plans');  // Nombre de tabla corregido
    }
};
