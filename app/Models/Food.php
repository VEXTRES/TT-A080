<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'foods';

    public function comidas(){
        return $this->belongsToMany(Comida::class)
        ->withPivot('quantity');
    }
}
