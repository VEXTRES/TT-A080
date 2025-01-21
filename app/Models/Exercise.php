<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = ['name', 'example', 'type'];

    public function workout_plans(){
        return $this->belongsToMany(WorkoutPlan::class, 'exercise_workout_plan')
                    ->withPivot('series', 'reps');
    }
}
