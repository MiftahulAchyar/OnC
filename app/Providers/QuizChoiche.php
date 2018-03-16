<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizChoiche extends Model
{
    protected $table ="quiz_choiches";
    protected $fillable = [
        'quiz_question_id','choiches_number','text'
    ];
    public $timestamps = false;
}
