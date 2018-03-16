<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    protected $table ="quiz_questions";
    protected $fillable = [
        'quiz_id','question_number','question','answer','question_type_id'
    ];
      
      public function quiz()
    {
        return $this->belongsTo('App\Quiz');
    }
}
