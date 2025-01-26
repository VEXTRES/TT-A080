<?php

namespace App\Livewire;

use App\Models\Answer;
use App\Models\Comida;
use App\Models\Food;
use App\Models\MealPlan;
use Livewire\Component;

class CrearComidaController extends Component
{
    public $plan,$answersSelected,$numMeals,$foods;
    public $proteinsPerMeal,$carbsPerMeal,$fatsPerMeal;
    public $proteinsSelect=[],$carbsSelect=[],$fatsSelect=[],$vegetablesSelect=[];
    // public $proteinsSelectData=[],$carbsSelectData=[],$fatsSelectData=[],$vegetablesSelectData=[];


    public function mount($id){
        $this->plan = MealPlan::find($id);
        $this->foods=Food::all();
        $userId= $this->plan->user_id;
        $surveyId= $this->plan->survey_id;
        $this->answersSelected = Answer::where('user_id',$userId)->where('survey_id',$surveyId)->pluck('option_selected','question_id')->toArray();
        $this->numMeals = $this->answersSelected[7];

        $this->proteinsPerMeal=round($this->plan->total_proteins/$this->numMeals);
        $this->carbsPerMeal=round($this->plan->total_carbs/$this->numMeals);
        $this->fatsPerMeal=round($this->plan->total_fats/$this->numMeals);

    }

    public function crearComida(){

        if(empty($this->proteinsSelect)||empty($this->carbsSelect)||empty($this->fatsSelect)||empty($this->vegetablesSelect)){
            dd('no hay nada');
        }else{

            foreach ($this->proteinsSelect as $key => $value) {
                if($value==false){
                }elseif($value==true){
                    $proteinsSelectData[$key]= Food::where('id','=',$key)->first();
                    $totalFoodsProtein = count($proteinsSelectData);
                }
            }
            foreach ($this->carbsSelect as $key => $value) {
                if($value==false){
                }elseif($value==true){
                    $carbsSelectData[$key]= Food::where('id','=',$key)->first();
                    $totalFoodsCarbs = count($carbsSelectData);

                }
            }
            foreach ($this->fatsSelect as $key => $value) {
                if($value==false){
                }elseif($value==true){
                    $fatsSelectData[$key]= Food::where('id','=',$key)->first();
                    $totalFoodsFats = count($fatsSelectData);
                }
            }
            foreach ($this->vegetablesSelect as $key => $value) {
                if($value==false){
                }elseif($value==true){
                    $vegetablesSelectData[$key]= Food::where('id','=',$key)->first();
                    $totalFoodsVegetables = count($vegetablesSelectData);
                }
            }

            $proteinaRepartida=$this->proteinsPerMeal/$totalFoodsProtein;
            $carbaRepartida=$this->carbsPerMeal/$totalFoodsCarbs;
            $grasaRepartida=$this->fatsPerMeal/$totalFoodsFats;
            $vegetalesRepartida=3;
            $comida= Comida::create([
                'num_of_food' => $this->numMeals,
                'meal_plan_id' => $this->plan->id,
            ]);

            foreach ($proteinsSelectData as $key => $value) {
                $grOfProteinFood[$key]=round(($proteinaRepartida*100)/$value->proteins);
                $comida->foods()->attach($key,['quantity'=>$grOfProteinFood[$key]]);
            }
            foreach ($carbsSelectData as $key => $value) {
                $grOfCarbFood[$key]=round(($carbaRepartida*100)/$value->carbs);
                $comida->foods()->attach($key,['quantity'=>$grOfCarbFood[$key]]);
            }
            foreach ($fatsSelectData as $key => $value) {
                $grOfFatFood[$key]=round(($grasaRepartida*100)/$value->fats);
                $comida->foods()->attach($key,['quantity'=>$grOfFatFood[$key]]);

            }


        }



    }






    public function render()
    {
        return view('livewire.crear-comida-controller');
    }
}
