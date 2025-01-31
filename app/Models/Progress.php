<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    protected $fillable = ['title', 'note', 'photo', 'meal_plan_id'];

    public function meal_plan()
    {
        return $this->belongsTo(MealPlan::class);
    }
}
