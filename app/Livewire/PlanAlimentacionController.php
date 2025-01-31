<?php

namespace App\Livewire;

use App\Models\Answer;
use App\Models\Comida;
use App\Models\Food;
use App\Models\MealPlan;
use Livewire\Component;
use phpDocumentor\Reflection\Types\This;

class PlanAlimentacionController extends Component
{

    public $plan,$answersSelected,$numComidas,$alimentos;
    public $proteinsSelect=[],$carbsSelect=[],$fatsSelect=[],$vegetablesSelect=[];
    public $comidas,$foods,$idPlan,$currentFood;
    public $is_active;


    public function mount($id){
        $this->idPlan = $id;
        $this->loadData();




    }

    public function eliminarComida($id){
        $meal=Comida::where('meal_plan_id',$this->idPlan)->where('num_of_food',$id)->first();
        $meal->delete();
        $this->loadData();
    }

    public function crearComidas()
    {
        return redirect()->route('plan-alimentacion.crear-comida', [
            'id' => $this->plan->id,
        ]);
    }

    public function loadData(){
        $this->plan = MealPlan::find($this->idPlan);
        $userId= $this->plan->user_id;
        $surveyId= $this->plan->survey_id;
        $this->is_active = $this->plan->is_active;
        $this->answersSelected = Answer::where('user_id',$userId)->where('survey_id',$surveyId)->pluck('option_selected','question_id')->toArray();
        $this->numComidas = $this->answersSelected[7];

        $this->comidas=Comida::where('meal_plan_id',$this->idPlan)->get();

        if($this->comidas->isEmpty()){
            $this->currentFood=1;
        }else{
            foreach ($this->comidas as $key => $comida) {
                foreach ($comida->foods as $keyfood => $foodItem) {
                    $this->foods[$comida['num_of_food']][$keyfood] = ['name'=>$foodItem->name,'quantity'=>$foodItem->pivot->quantity];
                }
            }
            ksort($this->foods);
        }


    }

    public function render()
    {
        return view('livewire.plan-alimentacion-controller');
    }
}
