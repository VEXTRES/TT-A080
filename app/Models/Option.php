<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

}
