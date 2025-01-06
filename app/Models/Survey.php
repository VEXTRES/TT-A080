<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{


    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function meal_plans()
    {
        return $this->hasMany(Meal_Plan::class);
    }
}
