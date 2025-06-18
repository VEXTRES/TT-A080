<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Excersice;
use App\Models\Exercise;
use App\Models\Food;
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

        User::firstOrCreate(
            ['email' => 'uriel.ss@hotmail.com'],
            [
                'name' => 'uriel sanchez soria',
                'email' => 'uriel.ss@hotmail.com',
                'password' => bcrypt('12345678'),
                'email_verified_at' => now(),
            ]
        );

        User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('12345678'),
                'email_verified_at' => now(),
            ]
        );

        Question::factory()
            ->count(17)
                ->state(new Sequence(
                    ['name' => '¿Cuál es tu Edad?'],
                    ['name' => '¿Cuál es tu Peso?'],
                    ['name' => '¿Cuál es tu Altura?'],
                    ['name' => '¿Cuál es tu Sexo?'],
                    ['name' => '¿Cuál es tu Objetivo Físico?'],
                    ['name' => '¿A qué alimentos eres alérgico?'],
                    ['name' => '¿Cuántas comidas te gustaría hacer por día?'],
                    ['name' => '¿Cuánta agua consumes diariamente?'],
                    ['name' => '¿Cuántas horas duermes diariamente?'],
                    ['name' => '¿Qué % de grasa tienes actualmente?'],
                    ['name' => '¿Cuál es tu tipo de cuerpo?'],
                    ['name' => '¿Has practicado deporte o practicas alguno actualmente?'],
                    ['name' => '¿Cuántos días haces ejercicio (ejercicio de pesas o alguna otra actividad aeróbica) a la semana?'],
                    ['name' => '¿Cuántos pasos caminas diariamente?'],
                    ['name' => '¿Te gustaría hacer ejercicios de pesas en casa o gimnasio?'],
                    ['name' => '¿Cuánto tiempo llevas entrenando en total siendo lo más constante posible?'],
                    ['name' => '¿Tienes alguna preferencia alimentaria (Vegetariana, Sin gluten, Sin lactosa)?']
            ))->create()
    ->each(function ($question) {
        $options = [];
        switch ($question->name) {
            case '¿Cuál es tu Sexo?':
                $options = ['Hombre', 'Mujer'];
                break;

            case '¿Cuál es tu Objetivo Físico?':
                $options = ['Bajar Grasa', 'Aumentar Musculo', 'Recomposicion corporal', 'Mantenimiento'];
                break;

            case '¿Has practicado deporte o practicas alguno actualmente?':
                $options = ['Si, Practico Actualmente', 'Lo deje recientemente', 'Nunca he hecho deporte'];
                break;

            case '¿Cuántos días haces ejercicio (ejercicio de pesas o alguna otra actividad aeróbica) a la semana?':
                $options = ['Nada', '1 a 3 dias', '4 a 6 dias', 'Toda la semana'];
                break;

            case '¿Cuántos pasos caminas diariamente?':
                $options = [
                        // Ejercicio semanal: Sin ejercicio o mínimo esfuerzo físico.
                        // o
                        'Sedentario
                        Pasos diarios: Menos de 5,000 pasos al día.
                        (Equivalente a tiempo de caminata: Aproximadamente 30 minutos o menos al día a ritmo suave).',
                        // Ejercicio semanal: Ejercicio ligero de 1 a 3 veces por semana.
                        // o
                        'Actividad ligera
                        Pasos diarios: Entre 5,000 y 7,500 pasos al día.
                        (Equivalente a tiempo de caminata: Aproximadamente 30 a 60 minutos al día a ritmo moderado).',
                        // Ejercicio semanal: Ejercicio moderado de 3 a 5 veces por semana.
                        // o
                        'Actividad moderada
                        Pasos diarios: Entre 7,500 y 10,000 pasos al día.
                        (Equivalente a tiempo de caminata: Aproximadamente 60 a 90 minutos al día a ritmo moderado o rápido).',
                        // Ejercicio semanal: Ejercicio intenso  6 - 7 veces por semana.
                        // o
                        'Actividad intensa
                        Pasos diarios: Más de 10,000 pasos al día.
                        (Equivalente a tiempo de caminata: 90 minutos a 120 min al día a ritmo rápido).',
                        // Ejercicio semanal: Ejercicio Extremo o doble jornada por semana.
                        // o
                        'Actividad muy intensa
                        Pasos diarios: Más de 15,000 pasos al día.
                        (Equivalente a tiempo de caminata: 120 minutos o más al día a ritmo rápido).'
                ];
                break;

            case '¿Te gustaría hacer ejercicios de pesas en casa o gimnasio?':
                $options = ['En casa', 'En gimnasio'];
                break;

            case '¿Tienes alguna preferencia alimentaria (Vegetariana, Sin gluten, Sin lactosa)?':
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
                        'isgym' => 1,
                    ]);
            }

        }
        $homeExercises = [
            'espalda' => [
                'Dominadas en barra de puerta (peso corporal)',
                'Superman en el suelo (peso corporal)',
                'Plancha con brazos extendidos (peso corporal)',
                'Puente invertido (peso corporal)',
                'Pull-ups con toalla en puerta (peso corporal)',
                'Extensión de espalda boca abajo (peso corporal)',
                'Remo con banda elástica (banda)',
                'Hiperextensiones en el suelo (peso corporal)',
                'Plancha lateral con rotación (peso corporal)',
            ],
            'pecho' => [
                'Flexiones de pecho clásicas (peso corporal)',
                'Flexiones inclinadas en escalón (peso corporal)',
                'Flexiones declinadas con pies elevados (peso corporal)',
                'Flexiones diamante (peso corporal)',
                'Flexiones con palmada (peso corporal)',
                'Flexiones pike (peso corporal)',
                'Aperturas con banda elástica (banda)',
                'Flexiones archer (peso corporal)',
                'Flexiones con una mano (peso corporal)',
                'Fondos en silla (peso corporal)',
            ],
            'hombro' => [
                'Flexiones pike (peso corporal)',
                'Elevaciones frontales con botella de agua (peso corporal)',
                'Elevaciones laterales con botella de agua (peso corporal)',
                'Parada de manos contra pared (peso corporal)',
                'Círculos de brazos (peso corporal)',
                'Press militar con banda elástica (banda)',
                'Plancha lateral con elevación de brazo (peso corporal)',
                'Vuelos posteriores con banda (banda)',
            ],
            'bicep' => [
                'Curl con botella de agua (peso corporal)',
                'Curl martillo con mochila (peso corporal)',
                'Chin-ups con agarre supino (peso corporal)',
                'Curl con banda elástica (banda)',
                'Curl concentrado con galón de agua (peso corporal)',
                'Curl inverso con toalla (peso corporal)',
                'Curl con mochila cargada (peso corporal)',
                'Dominadas supinas (peso corporal)',
                'Curl 21s con banda elástica (banda)',
            ],
            'tricep' => [
                'Fondos en silla (peso corporal)',
                'Flexiones diamante (peso corporal)',
                'Extensión de tríceps con botella (peso corporal)',
                'Fondos entre dos sillas (peso corporal)',
                'Flexiones cerradas (peso corporal)',
                'Extensión de tríceps acostado con botella (peso corporal)',
                'Patadas de tríceps con banda (banda)',
                'Fondos en escalón (peso corporal)',
                'Plancha a flexión (peso corporal)',
                'Extensión overhead con galón de agua (peso corporal)',
            ],
            'cuadricep' => [
                'Sentadillas con peso corporal (peso corporal)',
                'Zancadas alternas (peso corporal)',
                'Sentadillas jump (peso corporal)',
                'Sentadillas pistol (peso corporal)',
                'Zancadas laterales (peso corporal)',
                'Sentadillas sumo (peso corporal)',
                'Step-ups en escalón (peso corporal)',
                'Wall sits (peso corporal)',
                'Sentadillas búlgaras (peso corporal)',
                'Sentadillas con salto 180° (peso corporal)',
                'Single leg squats (peso corporal)',
                'Sentadillas cossack (peso corporal)',
                'Jump lunges (peso corporal)',
                'Sentadillas con pausa (peso corporal)',
                'Thrusters con botella de agua (peso corporal)',
            ],
            'gluteo' => [
                'Puentes de glúteo (peso corporal)',
                'Puentes de glúteo a una pierna (peso corporal)',
                'Patadas de glúteo en cuadrupedia (peso corporal)',
                'Clamshells acostado lateral (peso corporal)',
                'Sentadillas sumo (peso corporal)',
                'Zancadas laterales (peso corporal)',
                'Hip thrusts en sofá (peso corporal)',
                'Abducción lateral de piernas (peso corporal)',
                'Sentadillas con banda en piernas (banda)',
                'Puentes con banda (banda)',
                'Monster walks con banda (banda)',
                'Fire hydrants (peso corporal)',
                'Deadlifts rumanos con botella (peso corporal)',
                'Curtsy lunges (peso corporal)',
                'Good mornings con peso corporal (peso corporal)',
            ],
            'pantorilla' => [
                'Elevaciones de talones de pie (peso corporal)',
                'Elevaciones de talones a una pierna (peso corporal)',
                'Saltos en punta de pies (peso corporal)',
                'Caminata en puntas (peso corporal)',
                'Elevaciones de talones en escalón (peso corporal)',
                'Saltos de tijera (peso corporal)',
                'Calf raises con mochila (peso corporal)',
                'Skipping en el lugar (peso corporal)',
                'Elevaciones explosivas (peso corporal)',
                'Pogo jumps (peso corporal)',
            ],
            'abdomen' => [
                'Crunches básicos (peso corporal)',
                'Plancha isométrica (peso corporal)',
                'Bicicleta (peso corporal)',
                'Mountain climbers (peso corporal)',
                'Russian twists (peso corporal)',
                'Elevación de piernas acostado (peso corporal)',
                'Plancha lateral (peso corporal)',
                'Dead bug (peso corporal)',
                'Hollow body hold (peso corporal)',
                'V-ups (peso corporal)',
                'Plancha con toque de hombro (peso corporal)',
                'Tijeras verticales (peso corporal)',
            ],
        ];

        // Agregar los ejercicios en casa al seeder
        foreach($homeExercises as $muscleGroup => $exercises) {
            foreach($exercises as $exercise) {
                Exercise::create([
                    'name' => $exercise,
                    'example' => 'Ejercicio para hacer en casa',
                    'type' => $muscleGroup,
                    'isgym' => 0,
                ]);
            }
        }

        $foods = [
            'Proteinas' => [
                'Carne de res' => [
                    'proteina' => 26,
                    'carbohidratos' => 0,
                    'grasas' => 19.5,
                    'calorias' => 250,
                ],
                'Pechuga de pollo' => [
                    'proteina' => 31,
                    'carbohidratos' => 0,
                    'grasas' => 3.6,
                    'calorias' => 165,
                ],
                'Carne de cerdo' => [
                    'proteina' => 21,
                    'carbohidratos' => 0,
                    'grasas' => 12.5,
                    'calorias' => 242,
                ],
                'Huevo' => [
                    'proteina' => 6,
                    'carbohidratos' => 0.6,
                    'grasas' => 5,
                    'calorias' => 70,
                ],
                'Tilapia' => [
                    'proteina' => 22,
                    'carbohidratos' => 0,
                    'grasas' => 5,
                    'calorias' => 128,
                ],
                'Atún' => [
                    'proteina' => 23,
                    'carbohidratos' => 0,
                    'grasas' => 1.5,
                    'calorias' => 120,
                ],
                'Sardina' => [
                    'proteina' => 25,
                    'carbohidratos' => 0,
                    'grasas' => 11,
                    'calorias' => 208,
                ],
                'Salmón' => [
                    'proteina' => 20,
                    'carbohidratos' => 0,
                    'grasas' => 13,
                    'calorias' => 206,
                ],
                'Pulpo' => [
                    'proteina' => 15,
                    'carbohidratos' => 0,
                    'grasas' => 1,
                    'calorias' => 82,
                ],
                'Yogurt griego Oikos' => [
                    'proteina' => 10,
                    'carbohidratos' => 4,
                    'grasas' => 0,
                    'calorias' => 59,
                ],
                'Yogurt griego Yoplait' => [
                    'proteina' => 10,
                    'carbohidratos' => 4,
                    'grasas' => 0,
                    'calorias' => 59,
                ],
                'Leche Lala 100 +Proteina' => [
                    'proteina' => 5.4,
                    'carbohidratos' => 3.4,
                    'grasas' => 1,
                    'calorias' => 44,
                ],
                'Pechuga de pavo' => [
                    'proteina' => 29,
                    'carbohidratos' => 0,
                    'grasas' => 1,
                    'calorias' => 135,
                ],
                'Jamón de pavo' => [
                    'proteina' => 18,
                    'carbohidratos' => 1,
                    'grasas' => 5,
                    'calorias' => 120,
                ],
                'Queso cottage' => [
                    'proteina' => 11,
                    'carbohidratos' => 3,
                    'grasas' => 4,
                    'calorias' => 98,
                ],
                'Queso fresco' => [
                    'proteina' => 14,
                    'carbohidratos' => 4,
                    'grasas' => 6,
                    'calorias' => 110,
                ],
                'Requesón' => [
                    'proteina' => 13,
                    'carbohidratos' => 3,
                    'grasas' => 4,
                    'calorias' => 100,
                ],
                'Camarones' => [
                    'proteina' => 24,
                    'carbohidratos' => 0,
                    'grasas' => 1,
                    'calorias' => 99,
                ],
                'Pechuga de pollo deshebrada' => [
                    'proteina' => 30,
                    'carbohidratos' => 0,
                    'grasas' => 4,
                    'calorias' => 165,
                ],
                'Claras de huevo' => [
                    'proteina' => 11,
                    'carbohidratos' => 1,
                    'grasas' => 0,
                    'calorias' => 52,
                ],
                'Bacalao' => [
                    'proteina' => 18,
                    'carbohidratos' => 0,
                    'grasas' => 1,
                    'calorias' => 82,
                ],
                'Mozzarella light' => [
                    'proteina' => 24,
                    'carbohidratos' => 2,
                    'grasas' => 16,
                    'calorias' => 254,
                ],
            ],
            'Carbohidratos' => [
                'Arroz' => [
                    'proteina' => 3,
                    'carbohidratos' => 23.5,
                    'grasas' => 0.3,
                    'calorias' => 130,
                ],
                'Tortilla de maíz' => [
                    'proteina' => 2.5,
                    'carbohidratos' => 24,
                    'grasas' => 1.5,
                    'calorias' => 218,
                ],
                'Frijoles' => [
                    'proteina' => 8,
                    'carbohidratos' => 23,
                    'grasas' => 0.8,
                    'calorias' => 127,
                ],
                'Papas' => [
                    'proteina' => 2,
                    'carbohidratos' => 20,
                    'grasas' => 0.1,
                    'calorias' => 77,
                ],
                'Pasta' => [
                    'proteina' => 2.2,
                    'carbohidratos' => 25,
                    'grasas' => 1.5,
                    'calorias' => 131,
                ],
                'Camote' => [
                    'proteina' => 2,
                    'carbohidratos' => 20,
                    'grasas' => 0.1,
                    'calorias' => 86,
                ],
                'Lentejas' => [
                    'proteina' => 9,
                    'carbohidratos' => 20,
                    'grasas' => 0.5,
                    'calorias' => 116,
                ],
                'Garbanzos' => [
                    'proteina' => 9,
                    'carbohidratos' => 27,
                    'grasas' => 2.5,
                    'calorias' => 164,
                ],
                'Leche normal' => [
                    'proteina' => 3.2,
                    'carbohidratos' => 5,
                    'grasas' => 3.5,
                    'calorias' => 61,
                ],
                'Avena' => [
                    'proteina' => 17,
                    'carbohidratos' => 66,
                    'grasas' => 7,
                    'calorias' => 389,
                ],
                'Quinoa' => [
                    'proteina' => 14,
                    'carbohidratos' => 64,
                    'grasas' => 6,
                    'calorias' => 368,
                ],
                'Pan integral' => [
                    'proteina' => 13,
                    'carbohidratos' => 41,
                    'grasas' => 6,
                    'calorias' => 265,
                ],
                'Tortilla de trigo integral' => [
                    'proteina' => 3,
                    'carbohidratos' => 15,
                    'grasas' => 2,
                    'calorias' => 90,
                ],
                'Elote' => [
                    'proteina' => 3,
                    'carbohidratos' => 19,
                    'grasas' => 1,
                    'calorias' => 96,
                ],
                'Chícharos' => [
                    'proteina' => 5,
                    'carbohidratos' => 14,
                    'grasas' => 0,
                    'calorias' => 81,
                ],
                'Plátano macho' => [
                    'proteina' => 1,
                    'carbohidratos' => 32,
                    'grasas' => 0,
                    'calorias' => 122,
                ],
                'Yuca' => [
                    'proteina' => 1,
                    'carbohidratos' => 38,
                    'grasas' => 0,
                    'calorias' => 160,
                ],
                'Pan tostado integral' => [
                    'proteina' => 4,
                    'carbohidratos' => 12,
                    'grasas' => 1,
                    'calorias' => 69,
                ],
                'Cereal All Bran' => [
                    'proteina' => 10,
                    'carbohidratos' => 46,
                    'grasas' => 3,
                    'calorias' => 212,
                ],
            ],
            'Frutas' => [
                'Manzana' => [
                    'proteina' => 0.5,
                    'carbohidratos' => 25,
                    'grasas' => 0.3,
                    'calorias' => 52,
                ],
                'Plátano' => [
                    'proteina' => 1.3,
                    'carbohidratos' => 23,
                    'grasas' => 0.3,
                    'calorias' => 89,
                ],
                'Naranja' => [
                    'proteina' => 0.9,
                    'carbohidratos' => 21,
                    'grasas' => 0.1,
                    'calorias' => 47,
                ],
                'Mango' => [
                    'proteina' => 0.8,
                    'carbohidratos' => 25,
                    'grasas' => 0.6,
                    'calorias' => 60,
                ],
                'Fresa' => [
                    'proteina' => 0.8,
                    'carbohidratos' => 8,
                    'grasas' => 0.4,
                    'calorias' => 32,
                ],
                'Papaya' => [
                    'proteina' => 0.5,
                    'carbohidratos' => 10,
                    'grasas' => 0.1,
                    'calorias' => 43,
                ],
                'Guayaba' => [
                    'proteina' => 4,
                    'carbohidratos' => 12,
                    'grasas' => 0.6,
                    'calorias' => 68,
                ],
                'Sandía' => [
                    'proteina' => 0.6,
                    'carbohidratos' => 8,
                    'grasas' => 0.2,
                    'calorias' => 30,
                ],
                'Piña' => [
                    'proteina' => 1,
                    'carbohidratos' => 13,
                    'grasas' => 0,
                    'calorias' => 50,
                ],
                'Melón' => [
                    'proteina' => 1,
                    'carbohidratos' => 8,
                    'grasas' => 0,
                    'calorias' => 34,
                ],
                'Pera' => [
                    'proteina' => 0,
                    'carbohidratos' => 15,
                    'grasas' => 0,
                    'calorias' => 57,
                ],
                'Durazno' => [
                    'proteina' => 1,
                    'carbohidratos' => 10,
                    'grasas' => 0,
                    'calorias' => 39,
                ],
                'Kiwi' => [
                    'proteina' => 1,
                    'carbohidratos' => 15,
                    'grasas' => 1,
                    'calorias' => 61,
                ],
                'Uvas' => [
                    'proteina' => 1,
                    'carbohidratos' => 16,
                    'grasas' => 0,
                    'calorias' => 67,
                ],
                'Toronja' => [
                    'proteina' => 1,
                    'carbohidratos' => 8,
                    'grasas' => 0,
                    'calorias' => 33,
                ],
                'Limón' => [
                    'proteina' => 1,
                    'carbohidratos' => 9,
                    'grasas' => 0,
                    'calorias' => 29,
                ],
                'Mandarina' => [
                    'proteina' => 1,
                    'carbohidratos' => 13,
                    'grasas' => 0,
                    'calorias' => 53,
                ],
                'Ciruela' => [
                    'proteina' => 1,
                    'carbohidratos' => 11,
                    'grasas' => 0,
                    'calorias' => 46,
                ],
            ],
            'Vegetales' => [
                'Nopal' => [
                    'proteina' => 1.5,
                    'carbohidratos' => 4,
                    'grasas' => 0.1,
                    'calorias' => 16,
                ],
                'Jitomate' => [
                    'proteina' => 1.2,
                    'carbohidratos' => 5,
                    'grasas' => 0.2,
                    'calorias' => 18,
                ],
                'Chícharos' => [
                    'proteina' => 5.4,
                    'carbohidratos' => 14.5,
                    'grasas' => 0.4,
                    'calorias' => 81,
                ],
                'Calabaza' => [
                    'proteina' => 1.2,
                    'carbohidratos' => 7,
                    'grasas' => 0.2,
                    'calorias' => 26,
                ],
                'Espinaca' => [
                    'proteina' => 2.9,
                    'carbohidratos' => 3.6,
                    'grasas' => 0.4,
                    'calorias' => 23,
                ],
                'Lechuga' => [
                    'proteina' => 1.4,
                    'carbohidratos' => 3.3,
                    'grasas' => 0.2,
                    'calorias' => 15,
                ],
                'Brócoli' => [
                    'proteina' => 4,
                    'carbohidratos' => 8,
                    'grasas' => 0.4,
                    'calorias' => 34,
                ],
                'Pepino' => [
                    'proteina' => 0.8,
                    'carbohidratos' => 4,
                    'grasas' => 0.1,
                    'calorias' => 16,
                ],
                'Zanahoria' => [
                    'proteina' => 0.9,
                    'carbohidratos' => 9.6,
                    'grasas' => 0.2,
                    'calorias' => 41,
                ],
                'Chayote' => [
                    'proteina' => 0.8,
                    'carbohidratos' => 6,
                    'grasas' => 0.1,
                    'calorias' => 19,
                ],
                'Apio' => [
                    'proteina' => 1,
                    'carbohidratos' => 3,
                    'grasas' => 0,
                    'calorias' => 14,
                ],
                'Cebolla' => [
                    'proteina' => 1,
                    'carbohidratos' => 9,
                    'grasas' => 0,
                    'calorias' => 40,
                ],
                'Ajo' => [
                    'proteina' => 6,
                    'carbohidratos' => 33,
                    'grasas' => 1,
                    'calorias' => 149,
                ],
                'Cilantro' => [
                    'proteina' => 2,
                    'carbohidratos' => 4,
                    'grasas' => 1,
                    'calorias' => 23,
                ],
                'Perejil' => [
                    'proteina' => 3,
                    'carbohidratos' => 6,
                    'grasas' => 1,
                    'calorias' => 36,
                ],
                'Champiñones' => [
                    'proteina' => 3,
                    'carbohidratos' => 3,
                    'grasas' => 0,
                    'calorias' => 22,
                ],
                'Coliflor' => [
                    'proteina' => 2,
                    'carbohidratos' => 5,
                    'grasas' => 0,
                    'calorias' => 25,
                ],
                'Acelgas' => [
                    'proteina' => 2,
                    'carbohidratos' => 4,
                    'grasas' => 0,
                    'calorias' => 19,
                ],
                'Rábanos' => [
                    'proteina' => 1,
                    'carbohidratos' => 2,
                    'grasas' => 0,
                    'calorias' => 16,
                ],
                'Pimientos' => [
                    'proteina' => 1,
                    'carbohidratos' => 6,
                    'grasas' => 0,
                    'calorias' => 26,
                ],
                'Ejotes' => [
                    'proteina' => 2,
                    'carbohidratos' => 7,
                    'grasas' => 0,
                    'calorias' => 35,
                ],
            ],
            'Grasas' => [
                'Queso Oaxaca' => [
                    'proteina' => 25,
                    'carbohidratos' => 2,
                    'grasas' => 22,
                    'calorias' => 321,
                ],
                'Queso Machego' => [
                    'proteina' => 25,
                    'carbohidratos' => 1,
                    'grasas' => 33,
                    'calorias' => 350,
                ],
                'Queso Panela' => [
                    'proteina' => 16,
                    'carbohidratos' => 1,
                    'grasas' => 12,
                    'calorias' => 200,
                ],
                'Queso Chihuahua' => [
                    'proteina' => 23,
                    'carbohidratos' => 2,
                    'grasas' => 25,
                    'calorias' => 320,
                ],
                'Cacahuate' => [
                    'proteina' => 25,
                    'carbohidratos' => 16,
                    'grasas' => 49,
                    'calorias' => 567,
                ],
                'Almendras' => [
                    'proteina' => 21,
                    'carbohidratos' => 22,
                    'grasas' => 49,
                    'calorias' => 579,
                ],
                'Nuez' => [
                    'proteina' => 15,
                    'carbohidratos' => 14,
                    'grasas' => 65,
                    'calorias' => 654,
                ],
                'Aguacate' => [
                    'proteina' => 2,
                    'carbohidratos' => 9,
                    'grasas' => 15,
                    'calorias' => 160,
                ],
                'Semillas de Chía' => [
                    'proteina' => 16,
                    'carbohidratos' => 42,
                    'grasas' => 31,
                    'calorias' => 486,
                ],
                'Semillas de Girasol' => [
                    'proteina' => 21,
                    'carbohidratos' => 20,
                    'grasas' => 51,
                    'calorias' => 584,
                ],
                'Semillas de Calabaza' => [
                    'proteina' => 19,
                    'carbohidratos' => 54,
                    'grasas' => 19,
                    'calorias' => 446,
                ],
                'Aceite de oliva' => [
                    'proteina' => 0,
                    'carbohidratos' => 0,
                    'grasas' => 100,
                    'calorias' => 884,
                ],
                'Aceite de coco' => [
                    'proteina' => 0,
                    'carbohidratos' => 0,
                    'grasas' => 99,
                    'calorias' => 862,
                ],
                'Mantequilla de cacahuate natural' => [
                    'proteina' => 25,
                    'carbohidratos' => 20,
                    'grasas' => 50,
                    'calorias' => 588,
                ],
                'Crema para batir' => [
                    'proteina' => 2,
                    'carbohidratos' => 3,
                    'grasas' => 35,
                    'calorias' => 345,
                ],
                'Mantequilla' => [
                    'proteina' => 1,
                    'carbohidratos' => 1,
                    'grasas' => 81,
                    'calorias' => 717,
                ],
                'Aceite de canola' => [
                    'proteina' => 0,
                    'carbohidratos' => 0,
                    'grasas' => 100,
                    'calorias' => 884,
                ],
                'Pistachos' => [
                    'proteina' => 20,
                    'carbohidratos' => 28,
                    'grasas' => 45,
                    'calorias' => 560,
                ],
                'Linaza' => [
                    'proteina' => 18,
                    'carbohidratos' => 29,
                    'grasas' => 42,
                    'calorias' => 534,
                ],
                'Queso crema' => [
                    'proteina' => 6,
                    'carbohidratos' => 4,
                    'grasas' => 34,
                    'calorias' => 350,
                ],
                'Aceitunas' => [
                    'proteina' => 1,
                    'carbohidratos' => 4,
                    'grasas' => 15,
                    'calorias' => 166,
                ],
            ],
        ];



        foreach ($foods as $foodGroup => $items) {
            foreach ($items as $foodName => $foodDetail) {
                Food::create([
                    'name' => $foodName,
                    'calories' => $foodDetail['calorias'],
                    'proteins' => $foodDetail['proteina'],
                    'carbs' => $foodDetail['carbohidratos'],
                    'fats' => $foodDetail['grasas'],
                    'type' => $foodGroup,
                    'photo_url' => $foodName.'.jpg',
                ]);
            }
        }


    }
}
