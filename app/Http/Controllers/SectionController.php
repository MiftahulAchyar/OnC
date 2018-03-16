<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
use App\Group;

class SectionController extends Controller
{
    public function show($course_slug,$chapter_slug,$section_slug){
				$group = Group::with('courses')->get();
        return view('sections/view', 
										['section_slug' => $section_slug,
										 'group' => $group
										]);
    }   
}
