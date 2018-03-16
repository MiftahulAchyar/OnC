<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Chapter extends Model
{
	protected $fillable = [
        'name', 'course_id',"slug"
    ];

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

     public function sections()
    {
        return $this->hasMany('App\Section');
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
