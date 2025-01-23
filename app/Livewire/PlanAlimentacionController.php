<?php

namespace App\Livewire;

use App\Models\Answer;
use App\Models\Food;
use App\Models\MealPlan;
use Livewire\Component;

class PlanAlimentacionController extends Component
{

    public $plan,$answersSelected,$numComidas,$alimentos;

    public function mount($id){
        $this->plan = MealPlan::find($id);
        $userId= $this->plan->user_id;
        $surveyId= $this->plan->survey_id;
        $this->answersSelected = Answer::where('user_id',$userId)->where('survey_id',$surveyId)->pluck('option_selected','question_id')->toArray();
        $this->numComidas = $this->answersSelected[7];
        $this->alimentos=Food::all();

    }



    public function render()
    {
        return view('livewire.plan-alimentacion-controller');
    }
}
