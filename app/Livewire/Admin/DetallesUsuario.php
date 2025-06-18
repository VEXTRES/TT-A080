<?php

namespace App\Livewire\Admin;

use App\Models\MealPlan;
use App\Models\User;
use App\Models\WorkoutPlan;
use Livewire\Component;

class DetallesUsuario extends Component
{
    public $meal_plans, $workoutPlans;
    public $userId;

    public function mount($id)
    {
        $this->userId = $id;
        $this->loadPlans();
    }

    public function loadPlans()
    {
        $this->meal_plans = MealPlan::where('user_id', $this->userId)
            ->orderBy('created_at', 'desc')
            ->get();

        $this->workoutPlans = WorkoutPlan::join('meal_plans', 'meal_plans.id', '=', 'workout_plans.meal_plan_id')
            ->where('meal_plans.user_id', $this->userId)
            ->select('workout_plans.*')
            ->orderBy('workout_plans.created_at', 'desc')
            ->get();
    }

    public function deleteMealPlan($id)
    {
        try {
            $mealPlan = MealPlan::findOrFail($id);

            // Verificar que pertenece al usuario correcto (seguridad)
            if ($mealPlan->user_id == $this->userId) {
                $mealPlan->delete();
                $this->loadPlans();
                session()->flash('success', 'Plan de alimentación eliminado correctamente.');
            } else {
                session()->flash('error', 'No tienes permisos para eliminar este plan.');
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Error al eliminar el plan de alimentación.');
        }
    }

    public function deleteWorkoutPlan($id)
    {
        try {
            $workoutPlan = WorkoutPlan::findOrFail($id);

            // Verificar que pertenece al usuario correcto (seguridad)
            $mealPlan = MealPlan::find($workoutPlan->meal_plan_id);
            if ($mealPlan && $mealPlan->user_id == $this->userId) {
                $workoutPlan->delete();
                $this->loadPlans();
                session()->flash('success', 'Plan de entrenamiento eliminado correctamente.');
            } else {
                session()->flash('error', 'No tienes permisos para eliminar este plan.');
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Error al eliminar el plan de entrenamiento.');
        }
    }

    public function render()
    {
        return view('livewire.admin.detalles-usuario');
    }
}
