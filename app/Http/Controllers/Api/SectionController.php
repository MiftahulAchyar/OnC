<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Section;
use App\Abstracts\Transformers\SectionTransformer;
use App\Abstracts\Transformers\LessonTransformer;

class SectionController extends Controller
{
    protected $sectionTransformer,$lessonTransformer;
  
    function __construct(SectionTransformer $sectionTransformer,LessonTransformer $lessonTransformer)
    {
        $this->sectionTransformer = $sectionTransformer;
        $this->lessonTransformer = $lessonTransformer;
    }

    public function show($slug){
      $section = Section::where("slug",$slug)->first();
      if(empty($section)){
        abort(404);
      }
      $section["lessons"] = $section->lessons->map(function ($lesson) {
    				return [
    					"slug" => $lesson["slug"],
    					"title" => $lesson["title"],
    					"lesson_type_code" => $lesson->lessonType["code"],
    				];
        		});     
      return response()->json(  
            $this->sectionTransformer->transform($section)     
      );
    }
}
