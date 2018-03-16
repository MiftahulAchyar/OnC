<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Discussion extends Model
{
    public function lesson()
    {
        return $this->belongsTo('App\Lesson');
    }
  
  public function user()
    {
        return $this->belongsTo('App\User');
    }
  
   public function discussions() {
     return $this->hasMany('App\Discussion', 'discussion_id');
    }

    public function parent() {
     return $this->belongsTo('App\Discussion', 'discussion_id');
    }
  
  public function getCreatedDateTimeLocalized()
    {
        setlocale(LC_TIME, 'id_ID.UTF-8');
        return Carbon::parse($this->attributes['created_at'])->formatLocalized('%H:%S %A, %d %B %Y');
    }
}
