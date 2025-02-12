<?php

namespace App\Livewire;

use App\Models\Answer;
use App\Models\Excersice;
use App\Models\Exercise;
use App\Models\MealPlan;
use App\Models\Option;
use App\Models\Question;
use App\Models\Survey;
use App\Models\WorkoutPlan;
use Livewire\Component;

class MisPlanesController extends Component
{
    public $sortOrderAlimentacion = true;
    public $sortOrderEntrenamiento = true;
    public $showModal =false;

    public $questions,$options;
    public $currentPage = 1;
    public $perPage = 3;
    public $questionsPaginated = [];
    public $answersSelected=[], $questionId, $answerId ;
    public $meal_plans,$workout_plans,$user;
    public $answersSelectedYears = [],$answersSelectedMonths = [],$seleccionadoHombre,$seleccionadoMujer;
    public $seleccionadoTipoCuerpo;
    public $errorMessage ;
    public $conjunto_de_musculos = ['espalda','pecho','hombro','bicep','tricep','cuadricep','gluteo','pantorilla','abdomen'];


    public function mount(){

        $this->user = auth()->user()->id;

        $this->loadPlans();


        $this->questions = Question::all()->pluck('name', 'id')->toArray();

        foreach ($this->questions as $questionId => $questionName) {
            $this->options[$questionId]=Option::where('question_id',$questionId)->pluck('name','id')->toArray();
        }
        $this->answersSelected[18] = null;




        $this->updatePaginatedQuestions();
    }


    public function CrearPlan(){

        try {
            $rules = [
                'answersSelected' => 'required|array', // Removemos size:17 para manejar el caso dinámico
                'answersSelected.1' => 'required|numeric|min:15|max:65', // Edad con límites razonables
                'answersSelected.2' => 'required|numeric|min:20|max:150', // Peso con límites razonables
                'answersSelected.3' => 'required|numeric|min:120|max:250', // Altura con límites razonables
                'answersSelected.4' => 'required|numeric',
                'answersSelected.5' => 'required|numeric',
                'answersSelected.6' => 'required|string',
                'answersSelected.7' => 'required|numeric|min:2|max:7',
                'answersSelected.8' => 'required|numeric',
                'answersSelected.9' => 'required|numeric',
                'answersSelected.10' => 'required|string', // Para el formato "25-27%"
                'answersSelected.11' => 'required|string',
                'answersSelected.12' => 'required|numeric',
                'answersSelected.13' => 'required|numeric',
                'answersSelected.14' => 'required|numeric',
                'answersSelected.15' => 'required|numeric|min:16|max:20', // Nivel de actividad física
                'answersSelected.16' => 'required|string', // Para el formato "3-1"
                'answersSelected.17' => 'required|string|filled',
            ];
            if($this->answersSelected[17] == 22){
                unset($this->answersSelected[18]); // Si el usuario selecciona "No" al pregunta 17 (Preferencia alimentaria), se borra el campo de respuesta 18 que es el campo de texto
            }

            if($this->answersSelected[17] == 21){

                $this->answersSelected[17]=$this->answersSelected[18];
                unset($this->answersSelected[18]);
            }
            $errorMessage  = [
                'answersSelected.1.required' => 'La edad es requerida',
                'answersSelected.2.required' => 'El peso es requerido',
                'answersSelected.3.required' => 'La altura es requerida',
                'answersSelected.4.required' => 'El sexo es requerido',
                'answersSelected.5.required' => 'El obejtivo es requerido',
                'answersSelected.6.required' => 'Alimento Alergico es requerido',
                'answersSelected.7.required' => 'Seleccione Comidas al Día',
                'answersSelected.8.required' => 'Seleccione Agua al Día',
                'answersSelected.9.required' => 'Seleccione Hrs dormidas al Día',
                'answersSelected.10.required' => 'Seleccione % de grasa corporal',
                'answersSelected.11.required' => 'Seleccione Tipo de Cuerpo',
                'answersSelected.12.required' => 'Seleccione si practica deporte o no',
                'answersSelected.13.required' => 'Seleccione Cuantos dias hace ejercicio',
                'answersSelected.14.required' => 'Casa o En Gym',
                'answersSelected.15.required' => 'Seleccione Nivel de Actividad Física',
                'answersSelected.16.required' => 'Cuanto tiempo practicas deporte',
                'answersSelected.17.required' => 'Tiene alguna preferencia de dieta',
                'answersSelected.18.required' => 'Por favor especifica el tipo de dieta',

            ];
            $this->validate($rules, $errorMessage);

            // Si pasa la validación
            session()->flash('success', '¡Plan creado con éxito!');
        } catch (\Throwable $th) {
            // En caso de otros errores
            session()->flash('failed', 'Llene todos los campos');
            return null;
        }


        if($this->answersSelected[4] == 1){ //es hombre
            $TMB = (10*$this->answersSelected[2])+(6.25*$this->answersSelected[3])-(5*$this->answersSelected[1])+5;
        }elseif($this->answersSelected[4] == 2){ //es mujer
            $TMB = (10*$this->answersSelected[2])+(6.25*$this->answersSelected[3])-(5*$this->answersSelected[1])-161;
        }
        $pesoMagro=$this->answersSelected[2]-($this->answersSelected[10]*$this->answersSelected[2]);
        if($this->answersSelected[15]==16){  //sedentario
            $frecuenciaFisica=1.2;
        }elseif($this->answersSelected[15]==17){    //Act. ligera
            $frecuenciaFisica=1.375;
        }elseif($this->answersSelected[15]==18){    //moderada
            $frecuenciaFisica=1.55;
        }elseif($this->answersSelected[15]==19){    //intensa
            $frecuenciaFisica=1.725;
        }elseif($this->answersSelected[15]==20){    //muy intensa
            $frecuenciaFisica=1.9;
        }
        $TMBconActividad=$TMB*$frecuenciaFisica; //caloriasTotales

        if($this->answersSelected[5]==3){ // bajar grasa
            $grProteinaDecimales=$pesoMagro*2.4;
            $grasasNecesaria=.35;
            $TMBtotal=$TMBconActividad-400;
        }elseif($this->answersSelected[5]==4){ //aumentar musculo
            $grProteinaDecimales=$pesoMagro*2;
            $grasasNecesaria=.25;
            $TMBtotal=$TMBconActividad+500;
        }elseif($this->answersSelected[5]==5){ //recomposicion corporal
            $grProteinaDecimales=$pesoMagro*2.4;
            $grasasNecesaria=.30;
            $TMBtotal=$TMBconActividad-100;
        }elseif($this->answersSelected[5]==6){ //mantenimiento
            $grProteinaDecimales=$pesoMagro*2;
            $grasasNecesaria=.25;
            $TMBtotal=$TMBconActividad;
        }
        $grProteina=round($grProteinaDecimales);
        $caloriasProteinas=$grProteina*4;
        $caloriasGrasas=$TMBtotal*$grasasNecesaria;
        $grGrasas=round($caloriasGrasas/9);
        $caloriasCarbos=$TMBtotal-($caloriasProteinas+$caloriasGrasas);
        $grCarbos=round($caloriasCarbos/4);



        $survey=Survey::create([
            'name' => 'Sondeo',
            'description' => 'Sondeo de Creacion de Plan de Alimentacion',
        ]);
        foreach ($this->answersSelected as $questionId => $optionId) {
            $answer=Answer::create([
                'question_id' => $questionId,
                'option_selected' => $optionId,
                'user_id' => auth()->user()->id,
                'survey_id' => $survey->id,
            ]);
        }

        foreach($this->meal_plans as $meal_plan){
            if($meal_plan->is_active){
                $meal_plan->is_active = false;
                $meal_plan->save();
            }
        }

        $meal_plan = MealPlan::create([
            'name' => 'Plan de Alimentacion Para '.$this->options[5][$this->answersSelected[5]],
            'total_calories' => $TMBtotal,
            'total_fats' => $grGrasas,
            'total_carbs' => $grCarbos,
            'total_proteins' => $grProteina,
            'user_id' => $this->user,
            'survey_id' => $survey->id,
            'is_active' => true,
        ]);

        $workout_plan = WorkoutPlan::create([
            'name' => 'Plan de entrenamiento para '.$this->options[5][$this->answersSelected[5]],
            'meal_plan_id' => $meal_plan->id,
        ]);


            if($this->answersSelected[12]==7) // practicas deporte? si actual
            {
                if($this->answersSelected[13]==10){ //Cuántos días haces ejercicio '1 o nada',
                    $ejercicioDiario = 1;
                }elseif($this->answersSelected[13]==11){ // Cuántos días haces ejercicio 2 a 4 dias',
                    $ejercicioDiario = 2;
                }elseif($this->answersSelected[13]==12){ // Cuántos días haces ejercicio 5 a 6 dias', '
                    $ejercicioDiario = 3;
                }elseif($this->answersSelected[13]==13){ // Cuántos días haces ejercicio 7 o mas dias'
                    $ejercicioDiario = 4;
                }
                if($this->answersSelected[14]==14){  //casa
                    $lugarDeEjercicio = 1;
                }elseif($this->answersSelected[14]==15){  //en gym
                    $lugarDeEjercicio = 2;
                }
                if($this->answersSelected[15]==16){ // Nivel de actividad física 'Sedentario
                    $actividadFisica=1;
                }elseif($this->answersSelected[15]==17){ // Nivel de actividad física 'Actividad ligera
                    $actividadFisica=2;
                }elseif($this->answersSelected[15]==18){ // Nivel de actividad física 'moderada
                    $actividadFisica=3;
                }elseif($this->answersSelected[15]==19){ // Nivel de actividad física 'intensa
                    $actividadFisica=4;
                }elseif($this->answersSelected[15]==20){ // Nivel de actividad física 'muy intensa
                    $actividadFisica=5;
                }
                $parts = explode('-', $this->answersSelected[16]);
                $firstNumber = (int) $parts[0];  // Primer número
                $secondNumber = (int) $parts[1];  // Segundo número

                if (($firstNumber == 0) && ($secondNumber >= 0 && $secondNumber <= 12)) {
                    $tiempoEntrenando=1;
                }elseif ((($firstNumber == 1) && ($secondNumber >= 0 && $secondNumber <= 12))||($firstNumber==2 && $secondNumber==0)) {
                    $tiempoEntrenando=2;
                }elseif ((($firstNumber >= 2 && $firstNumber<=4) && ($secondNumber >= 0 && $secondNumber <= 12))) {
                    $tiempoEntrenando=3;
                }else{
                    $tiempoEntrenando=4;
                }

                if($tiempoEntrenando==1&&($ejercicioDiario>=1 && $ejercicioDiario<=4)&&($actividadFisica>=1 && $actividadFisica<=5)){
                    //2 series 8 reps  2 ejercicios x musculo

                    if($this->answersSelected[14]==14){  //casa

                        //faltaaaaaaaaaaaaaaaaaaaaaaa

                    }elseif($this->answersSelected[14]==15){  //en gym
                        //3 series 8 reps  2 ejercicios x musculo
                        foreach($this->conjunto_de_musculos as $musculo){
                            $ejercicios_aleatorios = Exercise::where('type',$musculo)->inRandomOrder()->take(3)->get();
                            $ejercicios_con_detalles = [];
                            foreach ($ejercicios_aleatorios as $ejercicio) {
                                $ejercicios_con_detalles[$ejercicio->id] = [
                                    'series' => '2',  // Puedes ajustar estos valores o hacerlos dinámicos
                                    'reps' => '8'    // según tus necesidades
                                ];
                            }
                            // Attach los ejercicios al plan
                            $workout_plan->exercises()->attach($ejercicios_con_detalles);
                        }
                    }

                }elseif(($tiempoEntrenando==2)&&($ejercicioDiario>=1 && $ejercicioDiario<=4) && ($actividadFisica>=1 && $actividadFisica<=5)){

                    if($this->answersSelected[14]==14){  //casa

                        //faltaaaaaaaaaaaaaaaa

                    }elseif($this->answersSelected[14]==15){  //en gym
                    //3 series 10 reps 3 ejercicios x musculo
                        foreach($this->conjunto_de_musculos as $musculo){
                            $ejercicios_aleatorios = Exercise::where('type',$musculo)->inRandomOrder()->take(3)->get();
                            $ejercicios_con_detalles = [];
                            foreach ($ejercicios_aleatorios as $ejercicio) {
                                $ejercicios_con_detalles[$ejercicio->id] = [
                                    'series' => '3',  // Puedes ajustar estos valores o hacerlos dinámicos
                                    'reps' => '10'    // según tus necesidades
                                ];
                            }

                            // Attach los ejercicios al plan
                            $workout_plan->exercises()->attach($ejercicios_con_detalles);
                        }
                    }
                }elseif($tiempoEntrenando==3||$tiempoEntrenando==4&&($ejercicioDiario>=1 && $ejercicioDiario<=4) && ($actividadFisica>=1 && $actividadFisica<=5)){

                    if($this->answersSelected[14]==14){  //casa

                        //faltaaaaaaaaaaaaaaaaaaaaaaa

                    }elseif($this->answersSelected[14]==15){  //en gym
                        //4 series 8 - 10 reps  3 ejercicios x musculo
                        foreach($this->conjunto_de_musculos as $musculo){
                            $ejercicios_aleatorios = Exercise::where('type',$musculo)->inRandomOrder()->take(3)->get();
                            $ejercicios_con_detalles = [];
                            foreach ($ejercicios_aleatorios as $ejercicio) {
                                $ejercicios_con_detalles[$ejercicio->id] = [
                                    'series' => '4',  // Puedes ajustar estos valores o hacerlos dinámicos
                                    'reps' => '10'    // según tus necesidades
                                ];
                            }

                            // Attach los ejercicios al plan
                            $workout_plan->exercises()->attach($ejercicios_con_detalles);
                        }
                    }
                }else{
                    if($this->answersSelected[14]==14){  //casa

                        //faltaaaaaaaaaaaaaaaaaaaaaaa

                    }elseif($this->answersSelected[14]==15){  //en gym
                        //4 series 6-8 reps  4 ejercicios x musculo
                        foreach($this->conjunto_de_musculos as $musculo){
                            $ejercicios_aleatorios = Exercise::where('type',$musculo)->inRandomOrder()->take(4)->get();
                            $ejercicios_con_detalles = [];
                            foreach ($ejercicios_aleatorios as $ejercicio) {
                                $ejercicios_con_detalles[$ejercicio->id] = [
                                    'series' => '4',  // Puedes ajustar estos valores o hacerlos dinámicos
                                    'reps' => '8'    // según tus necesidades
                                ];
                            }

                            // Attach los ejercicios al plan
                            $workout_plan->exercises()->attach($ejercicios_con_detalles);
                        }
                    }
                }
            }elseif($this->answersSelected[12]==8){  // practicas deporte? lo deje pero pacticaba recientemente
                if($this->answersSelected[14]==14){  //casa

                    //falta

                }elseif($this->answersSelected[14]==15){  //en gym
                    //3 series 10 reps 3 ejercicios x musculo
                    foreach($this->conjunto_de_musculos as $musculo){
                        $ejercicios_aleatorios = Exercise::where('type',$musculo)->inRandomOrder()->take(3)->get();
                        $ejercicios_con_detalles = [];
                        foreach ($ejercicios_aleatorios as $ejercicio) {
                            $ejercicios_con_detalles[$ejercicio->id] = [
                                'series' => '3',  // Puedes ajustar estos valores o hacerlos dinámicos
                                'reps' => '10'    // según tus necesidades
                            ];
                        }

                        // Attach los ejercicios al plan
                        $workout_plan->exercises()->attach($ejercicios_con_detalles);
                    }
                }
            }elseif($this->answersSelected[12]==9){  // practicas deporte? tiene mucho que lo deje O nunca he hecho deporte
                if($this->answersSelected[14]==14){  //casa

                    //falta

                }elseif($this->answersSelected[14]==15){  //en gym
                     //3 series 8 reps  2 ejercicios x musculo
                     foreach($this->conjunto_de_musculos as $musculo){
                        $ejercicios_aleatorios = Exercise::where('type',$musculo)->inRandomOrder()->take(3)->get();
                        $ejercicios_con_detalles = [];
                        foreach ($ejercicios_aleatorios as $ejercicio) {
                            $ejercicios_con_detalles[$ejercicio->id] = [
                                'series' => '2',  // Puedes ajustar estos valores o hacerlos dinámicos
                                'reps' => '8'    // según tus necesidades
                            ];
                        }
                        // Attach los ejercicios al plan
                        $workout_plan->exercises()->attach($ejercicios_con_detalles);
                    }
                }
            }

        $this->loadPlans();
        $this->MostrarModal();



    }

    // public function deleteMealPlan($id){
    //     MealPlan::where('id',$id)->delete();
    //     $this->loadPlans();
    // }

    public function seleccionarPorcentajeHombre($valor){
        $this->seleccionadoHombre = $valor;
        if($this->seleccionadoHombre ==1){
            $this->answersSelected[10] = ".04";
        }elseif($this->seleccionadoHombre==2){
            $this->answersSelected[10] = ".07";
        }elseif($this->seleccionadoHombre==3){
            $this->answersSelected[10] = ".12";
        }elseif($this->seleccionadoHombre==4){
            $this->answersSelected[10] = ".15";
        }elseif($this->seleccionadoHombre==5){
            $this->answersSelected[10] = ".2";
        }elseif($this->seleccionadoHombre==6){
            $this->answersSelected[10] = ".25";
        }elseif($this->seleccionadoHombre==7){
            $this->answersSelected[10] = ".3";
        }elseif($this->seleccionadoHombre==8){
            $this->answersSelected[10] = ".35";
        }elseif($this->seleccionadoHombre==9){
            $this->answersSelected[10] = ".4";
        }
    }
    public function seleccionarPorcentajeMujer($valor){
        $this->seleccionadoMujer = $valor;
        if($this->seleccionadoMujer ==1){
            $this->answersSelected[10] = ".14";
        }elseif($this->seleccionadoMujer==2){
            $this->answersSelected[10] = ".17";
        }elseif($this->seleccionadoMujer==3){
            $this->answersSelected[10] = ".2";
        }elseif($this->seleccionadoMujer==4){
            $this->answersSelected[10] = ".23";
        }elseif($this->seleccionadoMujer==5){
            $this->answersSelected[10] = ".26";
        }elseif($this->seleccionadoMujer==6){
            $this->answersSelected[10] = ".29";
        }elseif($this->seleccionadoMujer==7){
            $this->answersSelected[10] = ".35";
        }elseif($this->seleccionadoMujer==8){
            $this->answersSelected[10] = ".4";
        }elseif($this->seleccionadoMujer==9){
            $this->answersSelected[10] = ".5";
        }
    }
    public function seleccionarTipoCuerpo($valor){
        $this->seleccionadoTipoCuerpo = $valor;
        if($this->seleccionadoTipoCuerpo ==1){
            $this->answersSelected[11] = "Ectomorfo";
        }elseif($this->seleccionadoTipoCuerpo==2){
            $this->answersSelected[11] = "Mesomorfo";
        }elseif($this->seleccionadoTipoCuerpo==3){
            $this->answersSelected[11] = "Endomorfo";
        }
    }

    public function updatedAnswersSelectedYears($value, $key){
        $this->combineAnswers($key);
    }

    public function updatedAnswersSelectedMonths($value, $key){
        $this->combineAnswers($key);
    }

    private function combineAnswers($questionId){
        $years = $this->answersSelectedYears[$questionId] ?? '';
        $months = $this->answersSelectedMonths[$questionId] ?? '';
        $this->answersSelected[$questionId] = trim("{$years}-{$months}", '-');
    }

    public function loadPlans(){
        $this->reset( 'answersSelected', 'answersSelectedYears', 'answersSelectedMonths', 'seleccionadoHombre', 'seleccionadoMujer', 'seleccionadoTipoCuerpo');
        $this->currentPage = 1;


        $this->meal_plans= MealPlan::where('user_id',auth()->user()->id)
        ->orderby('created_at','desc')
        ->get();
        $this->workout_plans = WorkoutPlan::join('meal_plans', 'meal_plans.id', '=', 'workout_plans.meal_plan_id')
            ->where('meal_plans.user_id', auth()->user()->id)
            ->orderby('workout_plans.created_at','desc')
            ->get();
            $this->answersSelected=[];
    }

    public function updatePaginatedQuestions(){
        $start = ($this->currentPage - 1) * $this->perPage;
        $this->questionsPaginated = array_slice($this->questions, $start, $this->perPage, true);
    }

    public function nextPage(){
        $this->currentPage++;
        $this->updatePaginatedQuestions();
    }

    public function previousPage(){
        if ($this->currentPage > 1) {
            $this->currentPage--;
            $this->updatePaginatedQuestions();
        }
    }

    public function setOrderAlimentacion(){
        $this->sortOrderAlimentacion= !$this->sortOrderAlimentacion;

    }
    public function setOrderEntrenamiento(){
        $this->sortOrderEntrenamiento=!$this->sortOrderEntrenamiento;
    }

    public function MostrarModal(){
        $this->showModal = !$this->showModal;

    }





    public function render()
    {
        return view('livewire.mis-planes-controller');
    }
}
