<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Lesson extends Model
{
    protected $fillable = [
        'title', 'description',"slug","video_id","body","lesson_type_id","section_id"
    ];

     public function section()
    {
        return $this->belongsTo('App\Section');
    }
  
   public function lessonType()
    {
        return $this->belongsTo('App\LessonType');
    }
  
   public function discussions()
    {
        return $this->hasMany('App\Discussion');
    }
  
  public function quizzes()
    {
        return $this->hasMany('App\Quiz');
    }
  
   public function getCreatedDateLocalized()
    {
        setlocale(LC_TIME, 'id_ID.UTF-8');
        return Carbon::parse($this->attributes['created_at'])->formatLocalized('%A, %d %B %Y');
    }
  
   public function getCreatedDateTimeLocalized()
    {
        setlocale(LC_TIME, 'id_ID.UTF-8');
        return Carbon::parse($this->attributes['created_at'])->formatLocalized('%H:%S %A, %d %B %Y');
    }

     public function getUpdatedDateTimeLocalized()
    {
        setlocale(LC_TIME, 'id_ID.UTF-8');
        return Carbon::parse($this->attributes['updated_at'])->formatLocalized('%H:%S %A, %d %B %Y');
    }
}
