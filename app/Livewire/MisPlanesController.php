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
        $survey=Survey::create([
            'name' => 'Sondeo',
            'description' => 'Sondeo de prueba al usuario',
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
            'name' => 'Plan de comida',
            'total_calories' => '100',
            'total_fats' => '100',
            'total_carbs' => '100',
            'total_proteins' => '100',
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
            $this->answersSelected[10] = "3-4%";
        }elseif($this->seleccionadoHombre==2){
            $this->answersSelected[10] = "6-7%";
        }elseif($this->seleccionadoHombre==3){
            $this->answersSelected[10] = "10-12%";
        }elseif($this->seleccionadoHombre==4){
            $this->answersSelected[10] = "15-17%";
        }elseif($this->seleccionadoHombre==5){
            $this->answersSelected[10] = "20-22%";
        }elseif($this->seleccionadoHombre==6){
            $this->answersSelected[10] = "25-27%";
        }elseif($this->seleccionadoHombre==7){
            $this->answersSelected[10] = "30-32%";
        }elseif($this->seleccionadoHombre==8){
            $this->answersSelected[10] = "35-37%";
        }elseif($this->seleccionadoHombre==9){
            $this->answersSelected[10] = "40-42%";
        }
    }
    public function seleccionarPorcentajeMujer($valor){
        $this->seleccionadoMujer = $valor;
        if($this->seleccionadoMujer ==1){
            $this->answersSelected[10] = "12-14%";
        }elseif($this->seleccionadoMujer==2){
            $this->answersSelected[10] = "15-17%";
        }elseif($this->seleccionadoMujer==3){
            $this->answersSelected[10] = "18-20%";
        }elseif($this->seleccionadoMujer==4){
            $this->answersSelected[10] = "21-23%";
        }elseif($this->seleccionadoMujer==5){
            $this->answersSelected[10] = "24-26%";
        }elseif($this->seleccionadoMujer==6){
            $this->answersSelected[10] = "27-29%";
        }elseif($this->seleccionadoMujer==7){
            $this->answersSelected[10] = "30-35%";
        }elseif($this->seleccionadoMujer==8){
            $this->answersSelected[10] = "36-40%";
        }elseif($this->seleccionadoMujer==9){
            $this->answersSelected[10] = "50+%";
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
