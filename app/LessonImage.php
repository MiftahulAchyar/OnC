<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonImage extends Model
{
    protected $fillable = [
        'path', 'lesson_id'
    ];

    public $timestamps = false;
}
