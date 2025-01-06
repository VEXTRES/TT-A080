<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meal_Plan extends Model
{

    public function progress()
    {
        return $this->hasMany(Progress::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function foods(){
        return $this->belongsToMany(Food::class);
    }
    public function workout_plan(){
        return $this->hasOne(Workout_Plan::class);
    }
}
