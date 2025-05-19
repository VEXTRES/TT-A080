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
    public $idPlan,$notification;


    public function mount($id){
        $this->plan = MealPlan::find($id);
        $this->idPlan = $id;
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
        $foodnew = [];
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
                $name = $value['food_name'];

                $servings = $value['servings']['serving'];

                // Si es un array asociativo (único serving)
                if (isset($servings['metric_serving_unit'])) {
                    $servings = [$servings]; // lo convertimos en un array de 1 elemento
                }

                foreach ($servings as $keyServing => $valueServing) {
                    if ($valueServing['metric_serving_unit'] == 'g' || $valueServing['metric_serving_unit'] == 'ml') {
                        $calories = ($valueServing['calories'] * 100) / $valueServing['metric_serving_amount'];
                        $proteins = ($valueServing['protein'] * 100) / $valueServing['metric_serving_amount'];
                        $carbs = ($valueServing['carbohydrate'] * 100) / $valueServing['metric_serving_amount'];
                        $fats = ($valueServing['fat'] * 100) / $valueServing['metric_serving_amount'];
                    }
                }

                $calories = number_format($calories, 2);
                $proteins = number_format($proteins, 2);
                $carbs = number_format($carbs, 2);
                $fats = number_format($fats, 2);

                if($proteins>$carbs && $proteins>$fats){
                    Food::updateOrCreate([
                        'name'=>$name,
                        'calories'=>$calories,
                        'proteins'=>$proteins,
                        'carbs'=>$carbs,
                        'fats'=>$fats,
                        'type'=>'Proteinas',

                    ]);
                }elseif($carbs>$proteins && $carbs>$fats){
                    Food::updateOrCreate([
                        'name'=>$name,
                        'calories'=>$calories,
                        'proteins'=>$proteins,
                        'carbs'=>$carbs,
                        'fats'=>$fats,
                        'type'=>'Carbohidratos',
                    ]);
                }else{
                    Food::updateOrCreate([
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
        $this->foods = Food::all();
        $this->mostrarModal();
    }

    public function crearComida(){

        if(empty($this->proteinsSelect)||empty($this->carbsSelect)||empty($this->fatsSelect)||empty($this->vegetablesSelect)){
            $this->notification=0;
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
            return redirect()->route('plan-alimentacion', ['id' => $this->idPlan]);
        }
    }

    public function mostrarModal(){

        $this->showModal=!$this->showModal;

    }
    public function buscarAlimento(){

        $fatSecret= new FatSecretService();
        $foodsSearch=$fatSecret->getFoods($this->search);
        // dd($foodsSearch);
        if(isset($foodsSearch['results']['food'])){
            foreach ($foodsSearch['results']['food'] as $key => $food) {
                $this->foodCatalog[$key]= $food;
            }
        }else{
            $this->foodCatalog[0]= ['food_id'=>0,'food_name'=>'Nada'];
        }
    }





    public function render()
    {
        return view('livewire.crear-comida-controller');
    }
}
