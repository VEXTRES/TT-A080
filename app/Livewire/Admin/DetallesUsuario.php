<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Models\WorkoutPlan;
use Livewire\Component;

class DetallesUsuario extends Component
{
    public $meal_plans,$workoutPlans;

    public function mount($id){
        $this->meal_plans = WorkoutPlan::join('meal_plans', 'meal_plans.id', '=', 'workout_plans.meal_plan_id')
            ->where('meal_plans.user_id', $id)
            ->get();

        foreach ($this->meal_plans as $meal_plan) {
            $this->workoutPlans[]=WorkoutPlan::find($meal_plan->id);
        }


    }





    public function render()
    {
        return view('livewire.admin.detalles-usuario');
    }
}
