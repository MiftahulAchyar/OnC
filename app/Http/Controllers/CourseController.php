<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Group;

class CourseController extends Controller
{
		public function home(){
			$group = Group::with('courses')->get();

// 			$group = Group::get();
// 			print_r($group);
// 			die();
			return view('home/myhome', [
    									'group' => $group,
										]);
		}
		
    public function show($course_slug){
    	$course = Course::with('chapters')->where("slug",$course_slug)->first();
      	if(empty($course)){
        	abort(404);
      	}
			$group = Group::with('courses')->get();
    	return view('courses/view', [
											'group'=>$group,
    									'course' => $course,
										]);
    }
}
