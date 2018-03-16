<?php

namespace App\Helper;


use Illuminate\Support\Str;

class Slug
{
    public function create($text,$model){
    	$slug = Str::slug($text);
        $count = $model->whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
        return $count ? "{$slug}-{$count}" : $slug;
    }
}
