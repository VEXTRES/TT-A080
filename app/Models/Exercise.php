<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    public function workout_plans(){
        return $this->belongsToMany(WorkoutPlan::class);
    }
}
