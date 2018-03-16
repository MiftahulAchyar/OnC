<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chapter;
use App\Group;

class ChapterController extends Controller
{
    public function show($course_slug,$chapter_slug){
    	$chapter = Chapter::where("slug",$chapter_slug)
    	->whereHas('course', function($query) use($course_slug) {
       			 $query->where('slug', '=',$course_slug);
   		 })->first();
      	if(empty($chapter)){
        	abort(404);
      	}
			$group = Group::with('courses')->get();
    	return view('chapters/view_v2', [
				'group'=>$group ,
    									'chapter' => $chapter,
										]);
    }
}
