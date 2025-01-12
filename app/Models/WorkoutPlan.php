<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkoutPlan extends Model
{
    protected $table = 'workout_plans';
    protected $fillable = ['name'];

    public function excercises(){
        return $this->belongsToMany(Excersice::class);
    }
    public function meal_plan(){
        return $this->belongsTo(MealPlan::class);
    }
}
