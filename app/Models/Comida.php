<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comida extends Model
{
    protected $table = 'comidas';
    protected $fillable = ['num_of_food','meal_plan_id'];



    public function meal_plan(){
        return $this->belongsTo(MealPlan::class);
    }
    public function foods(){
        return $this->belongsToMany(Food::class)
        ->withPivot('quantity');
    }

}
