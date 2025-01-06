<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workout_Plan extends Model
{
    public function excercises(){
        return $this->belongsToMany(Excersice::class);
    }
    public function meal_plan(){
        return $this->belongsTo(Meal_Plan::class);
    }
}
