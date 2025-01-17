<?php

namespace App\Livewire;

use App\Models\Answer;

use App\Models\MealPlan;
use App\Models\Option;
use App\Models\Question;
use App\Models\Survey;
use App\Models\WorkoutPlan;
use Livewire\Component;

class MisPlanesController extends Component
{
    public $sortOrderAlimentacion = 'close';
    public $sortOrderEntrenamiento = 'close';
    public $showModal =false;

    public $questions,$options;
    public $currentPage = 1;
    public $perPage = 3;
    public $questionsPaginated = [];
    public $answersSelected=[], $questionId, $answerId ;
    public $meal_plans,$workout_plans,$user;
    public $answersSelectedYears = [],$answersSelectedMonths = [],$seleccionadoHombre,$seleccionadoMujer;
    public $seleccionadoTipoCuerpo;

    public function mount(){

        $this->user = auth()->user()->id;
        $this->meal_plans= MealPlan::where('user_id',auth()->user()->id)->get();
        $this->workout_plans= WorkoutPlan::all();
        $this->questions = Question::all()->pluck('name', 'id')->toArray();

        $this->answersSelected[17] = null;
        foreach ($this->questions as $questionId => $questionName) {
            $this->options[$questionId]=Option::where('question_id',$questionId)->pluck('name','id')->toArray();
        }

        $this->updatePaginatedQuestions();
    }


    public function CrearPlan(){

        // $this->validate([
        //     'answersSelected' => 'required|array|size:17',
        //     'answersSelected.*' => 'required|integer',
        // ]);
        
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
            $grProteina=$pesoMagro*2.4;
            $grasasNecesaria=.35;
            $TMBtotal=$TMBconActividad-400;
        }elseif($this->answersSelected[5]==4){ //aumentar musculo
            $grProteina=$pesoMagro*2;
            $grasasNecesaria=.25;
            $TMBtotal=$TMBconActividad+500;
        }elseif($this->answersSelected[5]==5){ //recomposicion corporal
            $grProteina=$pesoMagro*2.4;
            $grasasNecesaria=.30;
            $TMBtotal=$TMBconActividad-100;
        }elseif($this->answersSelected[5]==6){ //mantenimiento
            $grProteina=$pesoMagro*2;
            $grasasNecesaria=.25;
            $TMBtotal=$TMBconActividad;
        }
        $caloriasProteinas=$grProteina*4;
        $caloriasGrasas=$TMBtotal*$grasasNecesaria;
        $grGrasas=$caloriasGrasas/9;
        $caloriasCarbos=$TMBtotal-($caloriasProteinas+$caloriasGrasas);
        $grCarbos=$caloriasCarbos/4;

        if($this->answersSelected[17] == 22){
            $this->answersSelected[18] = null; // Si el usuario selecciona "No" al pregunta 17 (Preferencia alimentaria), se borra el campo de respuesta 18 que es el campo de texto
        }

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
        $meal_plan = MealPlan::create([
            'name' => 'Plan Para '.$this->options[5][$this->answersSelected[5]],
            'total_calories' => $TMBtotal,
            'total_fats' => $grGrasas,
            'total_carbs' => $grCarbos,
            'total_proteins' => $grProteina,
            'user_id' => $this->user,
            'survey_id' => $survey->id,
        ]);

        $workout_plan = WorkoutPlan::create([
            'name' => 'Plan de entrenamiento',
            'meal_plan_id' => $meal_plan->id,
        ]);






    }
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
        $this->sortOrderAlimentacion= $this->sortOrderAlimentacion == 'open' ? 'close' : 'open';

    }
    public function setOrderEntrenamiento(){
        $this->sortOrderEntrenamiento=$this->sortOrderEntrenamiento=='open'?'close':'open';
    }

    public function MostrarModal(){
        $this->showModal = !$this->showModal;

    }





    public function render()
    {
        return view('livewire.mis-planes-controller');
    }
}
