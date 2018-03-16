<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Course extends Model
{
    protected $fillable = [
        'name', 'description', 'slug','group_id'
    ];


    public function chapters()
    {
        return $this->hasMany('App\Chapter');
    }

      public function group()
    {
        return $this->belongsTo('App\Group');
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
