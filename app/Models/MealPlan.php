<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MealPlan extends Model
{
    protected $table = 'meal_plans';
    protected $fillable = ['name', 'total_calories', 'total_fats', 'total_carbs',
    'total_proteins', 'user_id', 'workout_plan_id'];
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
        return $this->hasOne(WorkoutPlan::class);
    }
    public function answer(){
        return $this->hasOne(Answer::class);
    }
    public function survey(){
        return $this->belongsTo(Survey::class);
    }
}
