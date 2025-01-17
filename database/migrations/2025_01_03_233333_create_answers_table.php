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
        Schema::create('answers', function (Blueprint $table) {
            $table->id();

            $table->text('option_selected')->nullable();
            $table->foreignId('question_id')->constrained()->onDelete('cascade'); // Llave foránea a 'question'   // Llave foránea a 'answer'
            $table->foreignId('user_id')->constrained()->onDelete('cascade');     // Llave foránea a 'user'
            $table->foreignId('survey_id')->constrained()->onDelete('cascade');     // Llave foránea a 'survey'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};
