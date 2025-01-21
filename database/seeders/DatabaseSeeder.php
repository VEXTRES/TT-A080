<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Excersice;
use App\Models\Exercise;
use App\Models\Option;
use App\Models\Question;
use App\Models\Survey;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function PHPSTORM_META\type;

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
                    ['name' => '¿Cuántos tiempo llevas entrenando en total siendo lo mas constante posible?'],
                    ['name' => '¿Tienes alguna preferencia alimentaria(Vegetariana,Sin gluten, Sin Lactosa)?']
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
                $options = ['Si, Practico Actualmente', 'Lo deje pero pacticaba recientemente (1 mes o menos)', 'Tiene mucho que lo deje (Mas de 1 mes) O Nunca he hecho deporte'];
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
                    Ejercicio semanal: Ejercicio moderado de 3 a 5 veces por semana.
                    Pasos diarios: Entre 7,500 y 10,000 pasos al día.
                    Tiempo de caminata: Aproximadamente 60 a 90 minutos al día (a ritmo moderado o rápido).',
                    'Actividad intensa
                    Ejercicio semanal: Ejercicio intenso  6 - 7 veces por semana.
                    Pasos diarios: Más de 10,000 pasos al día.
                    Tiempo de caminata: 90 minutos o más al día (a ritmo rápido).',
                    'Actividad muy intensa
                    Ejercicio semanal: Ejercicio Extremo o doble jornada por semana.
                    Pasos diarios: Más de 15,000 pasos al día.
                    Tiempo de caminata: 120 minutos o más al día (a ritmo rápido).'
                ];
                break;

            case '¿Tienes alguna preferencia alimentaria(Vegetariana,Sin gluten, Sin Lactosa)?':
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

    $muscleGroups = [
        'espalda' => [
            'Jalón al pecho (polea)',
            'Dominadas asistidas (máquina)',
            'Remo con barra T (libres)',
            'Pull-over con mancuerna (mancuernas)',
            'Remo en polea baja (polea)',
            'Encogimientos con barra (libres)',
            'Remo alto en polea (polea)',
            'Encogimientos con mancuernas (mancuernas)',
            'Face pulls (polea)',
            'Encogimientos en máquina (máquina)',
            'Remo sentado en polea baja (polea)',
            'Remo con mancuernas a dos manos (mancuernas)',
            'Remo con barra invertida (libres)',
            'Remo inclinado en máquina (máquina)',
            'Remo a un brazo en polea (polea)',
            'Peso muerto convencional (libres)',
            'Peso muerto sumo (libres)',
            'Hiperextensiones en banco (libres)',
            'Buenos días con barra (libres)',
            'Extensiones en máquina lumbar (máquina)',
        ],
        'pecho' => [
            'Press de banca con barra (libres)',
            'Press inclinado con mancuernas (mancuernas)',
            'Press plano en máquina (máquina)',
            'Aperturas en máquina (máquina)',
            'Fondos en paralelas (libres)',
            'Aperturas con mancuerna en banco inclinado (mancuernas)',
            'Pull-over en polea (polea)',
            'Press en banco declinado (libres)',
            'Aperturas cruzadas en polea (polea)',
            'Press convergente en máquina (máquina)',
        ],
        'hombro' => [
            'Press militar con barra (libres)',
            'Press Arnold con mancuernas (mancuernas)',
            'Elevaciones frontales con disco (libres)',
            'Elevaciones frontales con cuerda en polea (polea)',
            'Press en máquina (máquina)',
            'Elevaciones laterales con mancuernas (mancuernas)',
            'Elevaciones laterales con polea baja (polea)',
            'Press tras nuca con barra (libres)',
            'Press lateral en máquina (máquina)',
            'Vuelo lateral inclinado con mancuernas (mancuernas)',
            'Vuelo a una mano en polea (polea)',
            'Vuelo a una mano con mancuerna (mancuernas)',
            'Flys inversos en máquina (máquina)',
            'Remo alto con barra (libres)',
            'Vuelo cruzado en polea (polea)',
        ],
        'bicep' => [
            'Curl con barra recta (libres)',
            'Curl concentrado con mancuerna (mancuernas)',
            'Curl martillo en polea baja (polea)',
            'Curl en banco Scott (máquina)',
            'Curl spider con mancuernas (mancuernas)',
            'Curl martillo con mancuerna (mancuernas)',
            'Curl martillo con cuerda en polea (polea)',
            'Curl inverso con barra (libres)',
            'Curl en banco inclinado (mancuernas)',
            'Curl de concentración en polea (polea)',
        ],
        'tricep' => [
            'Extensiones con mancuerna tras la cabeza (mancuernas)',
            'Press francés con barra (libres)',
            'Extensiones con barra en polea alta (polea)',
            'Extensiones con cuerda en polea alta (polea)',
            'Press cerrado en banca plana (libres)',
            'Patadas de tríceps con mancuerna (mancuernas)',
            'Extensiones unilaterales con polea (polea)',
            'Extensiones laterales con cuerda (polea)',
            'Fondos en banco (libres)',
            'Extensiones en máquina (máquina)',
            'Jalón con cuerda a dos manos (polea)',
            'Extensión de tríceps con barra EZ (libres)',
            'Press cerrado en multipower (máquina)',
            'Patadas de tríceps en polea baja (polea)',
            'Extensiones tras la cabeza en máquina (máquina)',
        ],
        'cuadricep' => [
            'Sentadillas libres con barra (libres)',
            'Extensiones de pierna en máquina (máquina)',
            'Zancadas con mancuernas (mancuernas)',
            'Sentadillas frontales (libres)',
            'Prensa de pierna inclinada (máquina)',
            'Hack squat (máquina)',
            'Extensiones en máquina unilaterales (máquina)',
            'Sentadilla búlgara con mancuernas (mancuernas)',
            'Sentadilla sumo en multipower (máquina)',
            'Zancadas laterales con mancuerna (mancuernas)',
            'Sentadilla profunda con barra (libres)',
            'Extensiones en máquina con punta de pies hacia adentro (máquina)',
            'Step-up con mancuernas (mancuernas)',
            'Sentadilla en multipower (máquina)',
            'Extensiones en máquina en rango corto (máquina)',
            'Sentadilla con pausa (libres)',
            'Prensa con pies juntos (máquina)',
            'Extensiones en máquina con carga descendente (máquina)',
            'Sentadilla goblet con mancuerna (mancuernas)',
            'Zancadas en multipower (máquina)',
        ],
        'gluteo' => [
            'Patada lateral en polea (polea)',
            'Caminata lateral con banda (libres)',
            'Abducción en máquina (máquina)',
            'Sentadilla sumo con mancuerna (mancuernas)',
            'Zancadas laterales con mancuerna (mancuernas)',
            'Clamshell con banda (libres)',
            'Patada trasera en polea baja (polea)',
            'Elevación de pierna lateral acostado (libres)',
            'Abducción en máquina unilateral (máquina)',
            'Zancadas cruzadas con mancuerna (mancuernas)',
            'Hip thrust con barra pesada (libres)',
            'Sentadilla profunda (libres)',
            'Sentadilla Hack (máquina)',
            'Peso muerto sumo (libres)',
            'Extensión de cadera en máquina (máquina)',
        ],
        'pantorilla' => [
            'Elevaciones de talones sentado (máquina)',
            'Elevaciones de talones en multipower (máquina)',
            'Elevaciones con mancuerna (mancuernas)',
            'Elevaciones de talones con disco (libres)',
            'Caminata en puntas (libres)',
            'Elevaciones de talones de pie (máquina)',
            'Saltos en punta de pies (libres)',
            'Elevaciones en prensa inclinada (máquina)',
            'Elevaciones con barra en espalda (libres)',
            'Elevaciones unilaterales en banco (libres)',
        ],
        'abdomen' => [
            'Crunch en máquina (máquina)',
            'Crunch con cuerda en polea alta (polea)',
            'Elevación de piernas colgado (libres)',
            'Ab-wheel rollout (libres)',
            'Crunch en banco declinado (libres)',
            'Plancha lateral (libres)',
            'Elevación lateral de piernas colgado (libres)',
            'Flexión lateral con barra (libres)',
            'Toques de talones (libres)',
            'Giro con balón medicinal (libres)',
            'Plancha isométrica (libres)',
            'Elevación de piernas en L (libres)',
        ],
    ];



        foreach($muscleGroups as $muscleGroup => $muscles) {
            foreach($muscles as $muscle => $exercises) {
                    $exercise = Exercise::create([
                        'name' => $exercises,
                        'example'=>'example',
                        'type'=>$muscleGroup,
                    ]);
            }

        }
    }
}
