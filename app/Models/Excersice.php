<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Excersice extends Model
{
    public function workout_plans(){
        return $this->belongsToMany(Workout_Plan::class);
    }
}
