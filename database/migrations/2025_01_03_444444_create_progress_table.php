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
        Schema::create('progress', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable();
            $table->text('note')->nullable();
            $table->string('photo')->nullable();

            $table->foreignId('meal_plan_id')->constrained();

            $table->timestamps();
        });
    }

    /**
     * Revertir las migraciones.
     */
    public function down(): void
    {
        Schema::dropIfExists('progress');
    }
};
