<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Section extends Model
{
    protected $fillable = [
        'name', 'chapter_id',"slug","description"
    ];

    public function lessons()
    {
        return $this->hasMany('App\Lesson');
    }

     public function chapter()
    {
        return $this->belongsTo('App\Chapter');
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
