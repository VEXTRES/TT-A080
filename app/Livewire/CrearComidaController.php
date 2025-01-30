<?php

namespace App\Livewire;

use App\Models\Answer;
use App\Models\Comida;
use App\Models\Food;
use App\Models\MealPlan;
use App\Services\FatSecretService;
use Livewire\Component;

class CrearComidaController extends Component
{
    public $plan,$answersSelected,$numMeals,$foods;
    public $proteinsPerMeal,$carbsPerMeal,$fatsPerMeal;
    public $proteinsSelect=[],$carbsSelect=[],$fatsSelect=[],$vegetablesSelect=[];
    public $currentFood,$showModal=false;
    public $search,$foodCatalog,$foodsSelect=[];


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

        $meals=Comida::where('meal_plan_id',$id)->get();
        if($meals->isEmpty()){
            $this->currentFood=1;
        }else{
            $aux = $meals->pluck('num_of_food')->toArray();
            $min = 1;
            $max = $this->numMeals;

            $range = range($min, $max);
            $missingNumbers = array_diff($range, $aux);

            if (!empty($missingNumbers)) {
                $this->currentFood = min($missingNumbers);
            } else {
                // Si no hay números faltantes, asignar el número máximo existente
                $this->currentFood = max($meals);
            }
        }



    }

    public function guardandoAlimento(){

        if(isset($this->foodsSelect)){

            foreach($this->foodCatalog as $keyCatalog => $food){

                foreach ($this->foodsSelect as $keySelect => $value) {
                    if($value===true){
                        if($food['food_id']==$keySelect){
                            $foodnew[$keyCatalog]=$food;
                        }
                    }
                }
            }
            foreach ($foodnew as $key => $value) {
                $name=$value['food_name'];

                if(is_array($value['servings']['serving'])){
                    foreach ($value['servings']['serving'] as $keyServing => $valueServing) {
                        if($valueServing['metric_serving_unit']=='g' || $valueServing['metric_serving_unit']=='ml'){
                            $calories=($valueServing['calories']*100)/$valueServing['metric_serving_amount'];
                            $proteins=($valueServing['protein']*100)/$valueServing['metric_serving_amount'];
                            $carbs=($valueServing['carbohydrate']*100)/$valueServing['metric_serving_amount'];
                            $fats=($valueServing['fat']*100)/$valueServing['metric_serving_amount'];
                        }
                    }
                }elseif($value['servings']['serving']['metric_serving_amount']!=100){

                    $calories=($value['servings']['serving']['calories']*100)/$value['servings']['serving']['metric_serving_amount'];
                    $proteins=($value['servings']['serving']['protein']*100)/$value['servings']['serving']['metric_serving_amount'];
                    $carbs=($value['servings']['serving']['carbohydrate']*100)/$value['servings']['serving']['metric_serving_amount'];
                    $fats=($value['servings']['serving']['fat']*100)/$value['servings']['serving']['metric_serving_amount'];

                }else{
                    $calories=$value['servings']['serving']['calories'];
                    $proteins=$value['servings']['serving']['protein'];
                    $carbs=$value['servings']['serving']['carbohydrate'];
                    $fats=$value['servings']['serving']['fat'];
                }
                $calories=number_format($calories,2);
                $proteins=number_format($proteins,2);
                $carbs=number_format($carbs,2);
                $fats=number_format($fats,2);

                if($proteins>$carbs && $proteins>$fats){
                    Food::create([
                        'name'=>$name,
                        'calories'=>$calories,
                        'proteins'=>$proteins,
                        'carbs'=>$carbs,
                        'fats'=>$fats,
                        'type'=>'Proteinas',
                        
                    ]);
                }elseif($carbs>$proteins && $carbs>$fats){
                    Food::create([
                        'name'=>$name,
                        'calories'=>$calories,
                        'proteins'=>$proteins,
                        'carbs'=>$carbs,
                        'fats'=>$fats,
                        'type'=>'Carbohidratos',
                    ]);
                }else{
                    Food::create([
                        'name'=>$name,
                        'calories'=>$calories,
                        'proteins'=>$proteins,
                        'carbs'=>$carbs,
                        'fats'=>$fats,
                        'type'=>'Grasas',
                    ]);
                }

            }
        }else{
            dd('no existe nada');
        }
        dd($foodnew);

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
                'num_of_food' => $this->currentFood,
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

    public function mostrarModal(){

        $this->showModal=!$this->showModal;

    }

    public function buscarAlimento(){

        $fatSecret= new FatSecretService();
        $foodsSearch=$fatSecret->getFoods($this->search);

        foreach ($foodsSearch['results']['food'] as $key => $food) {
            $this->foodCatalog[$key]= $food;
        }
    }





    public function render()
    {
        return view('livewire.crear-comida-controller');
    }
}
