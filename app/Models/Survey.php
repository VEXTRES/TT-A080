<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];


    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
    public function meal_plans(){
        return $this->belongsTo(MealPlan::class);
    }

}
