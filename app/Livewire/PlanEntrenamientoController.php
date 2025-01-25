<?php

namespace App\Livewire;

use App\Models\WorkoutPlan;
use Livewire\Component;

class PlanEntrenamientoController extends Component
{

    public $workoutPlan;
    public $exercises;

    public function mount($id)
    {
        // Obtener un plan de ejercicios
            $this->workoutPlan = WorkoutPlan::find($id);

            // Acceder a todos los ejercicios con sus datos de la tabla intermedia
            foreach ($this->workoutPlan->exercises as $exercise) {
                $this->exercises[$exercise->id] = [
                    'name' => $exercise->name,
                    'series' => $exercise->pivot->series,
                    'reps' => $exercise->pivot->reps,
                    'type' => $exercise->type,
                    'example' => $exercise->example,
                ];
            }
            dd($this->exercises);


    }



    public function render()
    {
        return view('livewire.plan-entrenamiento-controller');
    }
}
