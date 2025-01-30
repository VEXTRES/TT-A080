<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'foods';
    protected $fillable = ['name','calories','proteins','carbs','fats','type','photo_url'];

    public function comidas(){
        return $this->belongsToMany(Comida::class)
        ->withPivot('quantity');
    }
}
