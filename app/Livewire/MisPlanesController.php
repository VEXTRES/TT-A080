<?php

namespace App\Livewire;

use App\Models\Answer;

use App\Models\MealPlan;
use App\Models\Survey;
use App\Models\WorkoutPlan;
use Livewire\Component;

class MisPlanesController extends Component
{
    public $sortOrderAlimentacion = 'close';
    public $sortOrderEntrenamiento = 'close';
    public $questions;
    public $showModal =false;
    public $survey,$answers;

    public $currentPage = 1;
    public $perPage = 3;
    public $questionsPaginated = [];
    public $answersSelected=[], $questionId, $answerId ;

    public function mount(){
        $survey = Survey::with('questions.options.answers')->first();
        $this->survey = $survey;
        $this->questions = $survey->questions->pluck('name', 'id')->toArray();

        foreach ($survey->questions as $question) {
            $this->answers[$question->id] = $question->options->pluck('name','id')->toArray();
        }

        $this->updatePaginatedQuestions();
    }

    public function CrearPlan(){

        // $this->validate([
        //     'answersSelected' => 'required|array|size:10',
        //     'answersSelected.*' => 'required|integer',
        // ]);

        $this->survey->id;
        $this->answersSelected = array_map('intval', $this->answersSelected);
        $user=auth()->user()->id;

       $workout_plan = WorkoutPlan::create([
            'name' => 'Plan de entrenamiento',
        ]);

        $meal_plan = MealPlan::create([
            'name' => 'Plan de comida',
            'total_calories' => '100',
            'total_fats' => '100',
            'total_carbs' => '100',
            'total_proteins' => '100',
            'user_id' => $user,
            'workout_plan_id' => $workout_plan->id,
            'survey_id' => $this->survey->id,
        ]);

        dd($meal_plan);

        // foreach ($this->answersSelected as $questionId => $optionId) {
        //     Answer::create([
        //         'question_id' => $questionId,
        //         'option_id' => $optionId,
        //         'user_id' => auth()->user()->id,
        //         'survey_id' => $this->survey->id,
        //         'meal_plan_id' => $meal_plan->id,
        //     ]);
        // }



    }





    public function updatePaginatedQuestions()
    {
        $start = ($this->currentPage - 1) * $this->perPage;
        $this->questionsPaginated = array_slice($this->questions, $start, $this->perPage, true);
    }

    public function nextPage()
    {
        $this->currentPage++;
        $this->updatePaginatedQuestions();
    }

    public function previousPage()
    {
        if ($this->currentPage > 1) {
            $this->currentPage--;
            $this->updatePaginatedQuestions();
        }
    }




    public function setOrderAlimentacion()
    {
        $this->sortOrderAlimentacion= $this->sortOrderAlimentacion == 'open' ? 'close' : 'open';

    }
    public function setOrderEntrenamiento(){
        $this->sortOrderEntrenamiento=$this->sortOrderEntrenamiento=='open'?'close':'open';

    }

    public function MostrarModal()
    {
        $this->showModal = !$this->showModal;

    }





    public function render()
    {
        return view('livewire.mis-planes-controller');
    }
}
