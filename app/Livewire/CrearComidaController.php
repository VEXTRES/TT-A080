<?php

namespace App\Livewire;

use App\Models\Answer;
use App\Models\Comida;
use App\Models\Food;
use App\Models\MealPlan;
use Livewire\Component;

class CrearComidaController extends Component
{
    public $plan,$answersSelected,$numComidas,$alimentos;
    public $proteinasPorComida,$carbosPorComida,$grasasPorComida;
    public $proteinsSelect=[],$carbsSelect=[],$fatsSelect=[],$vegetablesSelect=[];


    public function mount($id){
        $this->plan = MealPlan::find($id);
        $this->alimentos=Food::all();
        $userId= $this->plan->user_id;
        $surveyId= $this->plan->survey_id;
        $this->answersSelected = Answer::where('user_id',$userId)->where('survey_id',$surveyId)->pluck('option_selected','question_id')->toArray();
        $this->numComidas = $this->answersSelected[7];

        $this->proteinasPorComida=round($this->plan->total_proteins/$this->numComidas);
        $this->carbosPorComida=round($this->plan->total_carbs/$this->numComidas);
        $this->grasasPorComida=round($this->plan->total_fats/$this->numComidas);




    }

    public function crearComida(){

        if(empty($this->proteinsSelect)){

        }else{

            // $this->workoutPlan = WorkoutPlan::find($id);
            // foreach ($this->workoutPlan->exercises as $exercise) {
            //     $this->exercises[$exercise->id] = [
            //         'name' => $exercise->name,
            //         'series' => $exercise->pivot->series,
            //         'reps' => $exercise->pivot->reps,
            //         'type' => $exercise->type,
            //         'example' => $exercise->example,
            //     ];
            // }
            $Comida= Comida::create([
                'num_of_food' => $this->numComidas,
                'meal_plan_id' => $this->plan->id,
            ]);
            foreach ($this->proteinsSelect as $key => $value) {
                if($value==null){

                }else{

                    $Comida->foods()->attach($key,['quantity'=>100]);
                }
            }
            dd($this->proteinsSelect,$this->carbsSelect,$this->fatsSelect,$this->vegetablesSelect);

        }



    }






    public function render()
    {
        return view('livewire.crear-comida-controller');
    }
}
