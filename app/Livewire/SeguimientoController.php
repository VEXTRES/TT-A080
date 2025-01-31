<?php

namespace App\Livewire;

use App\Models\MealPlan;
use App\Models\Progress;
use Livewire\Component;

class SeguimientoController extends Component
{

    public $trackings,$meal_plans;


    public function mount(){
        $this->loadPlans();
    }


    public function loadPlans(){
        $this->trackings = Progress::join('meal_plans','meal_plans.id','=','progress.meal_plan_id')
        ->where('meal_plans.user_id',auth()->user()->id)
        ->orderby('progress.created_at','desc')
        ->get();

        $this->meal_plans = MealPlan::where('user_id',auth()->user()->id)
        ->orderby('created_at','desc')
        ->get();

    }


    public function render()
    {
        return view('livewire.seguimiento-controller');
    }
}
