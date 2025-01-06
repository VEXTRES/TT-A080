<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Option;
use App\Models\Question;
use App\Models\Survey;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'uriel sanchez soria',
            'email' => 'uriel.ss@hotmail.com',
            'password' => bcrypt('12345678'),
        ]);
        Survey::factory()
        ->has(
            Question::factory()
                ->count(10)  // Aquí indicas que quieres 10 preguntas por encuesta
                ->has(Option::factory()->count(4)) // 4 opciones por pregunta
        )
        ->create([  // Solo se creará 1 encuesta
            'name' => 'Sondeo',
            'description' => 'Sondeo de prueba al usuario',
        ]);

    Answer::factory()
        ->count(4)
        ->for(Question::factory())
        ->create();

    }
}
