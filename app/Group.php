<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Group extends Model
{
    protected $fillable = [
        'parent_id', 'name'
    ];

      public function courses()
    {
        return $this->hasMany('App\Course');
    }

    public function parent() {
     return $this->belongsTo('App\Group', 'parent_id');
    }

    public function children() {
     return $this->hasMany('App\Group', 'parent_id');
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
