<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    public function option()
    {
        return $this->belongsTo(Option::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}
