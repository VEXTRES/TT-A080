<?php

namespace App\Livewire;

use App\Models\MealPlan;
use App\Models\Progress;
use Carbon\Carbon;
use Livewire\Component;

class SeguimientoController extends Component
{

    public $trackings,$meal_plans,$showModal=true,$fecha;


    public function mount(){
        $this->loadPlans();
    }

    public function mostrarModal(){
        $this->fecha = Carbon::today()->format('d-m-Y');
        $this->showModal=!$this->showModal;

    }


    public function crearSeguimiento(){
        // $planActual= $this->meal_plans::where('is_active',true)->first();
        // dd($planActual);
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
