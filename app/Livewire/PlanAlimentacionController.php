<?php

namespace App\Livewire;

use App\Models\Answer;
use App\Models\Comida;
use App\Models\Food;
use App\Models\MealPlan;
use Livewire\Component;

class PlanAlimentacionController extends Component
{

    public $plan,$answersSelected,$numComidas,$alimentos;
    public $proteinsSelect=[],$carbsSelect=[],$fatsSelect=[],$vegetablesSelect=[];
    public $comidas;

    public function mount($id){
        $this->plan = MealPlan::find($id);

        $userId= $this->plan->user_id;
        $surveyId= $this->plan->survey_id;
        $this->answersSelected = Answer::where('user_id',$userId)->where('survey_id',$surveyId)->pluck('option_selected','question_id')->toArray();
        $this->numComidas = $this->answersSelected[7];

        $this->comidas=Comida::where('meal_plan_id',$id)->get();


    }

    public function crearComidas()
    {
        return redirect()->route('plan-alimentacion.crear-comida', [
            'id' => $this->plan->id,
        ]);
    }

    public function render()
    {
        return view('livewire.plan-alimentacion-controller');
    }
}
