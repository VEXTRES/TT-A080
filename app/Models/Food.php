<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'foods';
    public function meal_plans(){
        return $this->belongsToMany(MealPlan::class);
    }
}
