<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkoutPlan extends Model
{
    protected $table = 'workout_plans';
    protected $fillable = ['name','meal_plan_id'];

    public function exercises(){
        return $this->belongsToMany(Exercise::class, 'exercise_workout_plan')
                    ->withPivot('series', 'reps');
    }
    public function meal_plan(){
        return $this->hasOne(MealPlan::class);
    }
}
