<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'lesson_id'
    ];

    public function lesson()
    {
        return $this->belongsTo('App\Lesson');
    }
  
   public function questions()
    {
        return $this->hasMany('App\QuizQuestion');
    }
}
