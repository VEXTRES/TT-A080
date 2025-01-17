<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Option;
use App\Models\Question;
use App\Models\Survey;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
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

        Question::factory()
            ->count(17)
                ->state(new Sequence(
                    ['name' => '¿Cuál es tu Edad?'],
                    ['name' => '¿Cual es tu Peso?'],
                    ['name' => '¿Cuál es tu Altura?'],
                    ['name' => '¿Cuál es tu Sexo?'],
                    ['name' => '¿Cuál es tu Objetivo Fisico?'],
                    ['name' => '¿A que alimentos eres alergico?'],
                    ['name' => '¿En cuantas comidas te gustaria hacer por dia?'],
                    ['name' => '¿Cuanta agua consumes diariamente?'],
                    ['name' => '¿Cuantas horas duermes diariamente?'],
                    ['name' => '¿Que % de grasa tienes actualmente?'],
                    ['name' => '¿Cual es tu tipo de cuerpo?'],
                    ['name' => '¿Haz practicado deporte o practicas actualmente?'],
                    ['name' => '¿Cuántos días haces ejercicio(ejercicio de pesas o alguna otra actividad aerobica) a la semana?'],
                    ['name' => '¿Te gustaría hacer ejercicios de pesas en casa, gimnasio?'],
                    ['name' => '¿Cuál es tu nivel de actividad diaria?'],
                    ['name' => '¿Cuántos tiempo llevas entrenando constantemente(con un lapso no mayor a 15 dias de inactividad)?'],
                    ['name' => '¿Tienes alguna preferencia alimentaria?']
            ))->create()
    ->each(function ($question) {
        $options = [];
        switch ($question->name) {
            case '¿Cuál es tu Sexo?':
                $options = ['Hombre', 'Mujer'];
                break;

            case '¿Cuál es tu Objetivo Fisico?':
                $options = ['Bajar Grasa', 'Aumentar Musculo', 'Recomposicion corporal', 'Mantenimiento'];
                break;

            case '¿Haz practicado deporte o practicas actualmente?':
                $options = ['Si, Practico Actualmente', 'Lo deje pero pacticaba recientemente', 'Nunca he hecho deporte'];
                break;

            case '¿Cuántos días haces ejercicio(ejercicio de pesas o alguna otra actividad aerobica) a la semana?':
                $options = ['1 o nada', '2 a 4 dias', '5 a 6 dias', '7 o mas dias'];
                break;

            case '¿Te gustaría hacer ejercicios de pesas en casa, gimnasio?':
                $options = ['En casa', 'En gimnasio'];
                break;

            case '¿Cuál es tu nivel de actividad diaria?':
                $options = [
                    'Sedentario
                    Ejercicio semanal: Sin ejercicio o mínimo esfuerzo físico.
                    Pasos diarios: Menos de 5,000 pasos al día.
                    Tiempo de caminata: Aproximadamente 30 minutos o menos al día (a ritmo suave).',
                    'Actividad ligera
                    Ejercicio semanal: Ejercicio ligero de 1 a 3 veces por semana.
                    Pasos diarios: Entre 5,000 y 7,500 pasos al día.
                    Tiempo de caminata: Aproximadamente 30 a 60 minutos al día (a ritmo moderado).',
                    'Actividad moderada
                    Ejercicio semanal: Ejercicio moderado de 4 a 6 veces por semana.
                    Pasos diarios: Entre 7,500 y 10,000 pasos al día.
                    Tiempo de caminata: Aproximadamente 60 a 90 minutos al día (a ritmo moderado o rápido).',
                    'Actividad intensa
                    Ejercicio semanal: Ejercicio intenso más de 6 veces por semana.
                    Pasos diarios: Más de 10,000 pasos al día.
                    Tiempo de caminata: 90 minutos o más al día (a ritmo rápido).'
                ];
                break;

            case '¿Tienes alguna preferencia alimentaria?':
                $options = ['Si', 'No'];
                break;
        }

        foreach ($options as $option) {
            Option::create([
                'name' => $option,
                'question_id' => $question->id,
            ]);
        }
    });


    }
}
