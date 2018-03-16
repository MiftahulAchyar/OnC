<?php

namespace App;

use Laratrust\Models\LaratrustRole;
use Carbon\Carbon;


class Role extends LaratrustRole
{
    protected $fillable = [
        'name','display_name','description'
    ];
     public function roleUsers()
    {
        return $this->hasMany('App\RoleUser');
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
