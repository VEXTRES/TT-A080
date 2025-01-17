<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkoutPlan extends Model
{
    protected $table = 'workout_plans';
    protected $fillable = ['name','meal_plan_id'];

    public function excercises(){
        return $this->belongsToMany(Excersice::class);
    }
    public function meal_plan(){
        return $this->hasOne(MealPlan::class);
    }
}
