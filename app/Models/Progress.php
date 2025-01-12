<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    public function meal_plan()
    {
        return $this->belongsTo(MealPlan::class);
    }
}
