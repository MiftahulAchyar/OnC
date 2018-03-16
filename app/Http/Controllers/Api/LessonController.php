<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Lesson;
use App\Discussion;
use App\Http\Controllers\Controller;
use App\Abstracts\Transformers\LessonTransformer;
use App\Abstracts\Transformers\DiscussionTransformer;

class LessonController extends Controller
{
    protected $lessonTransformer,$discussionTransformer;
  
    function __construct(LessonTransformer $lessonTransformer,DiscussionTransformer $discussionTransformer)
    {
        $this->lessonTransformer = $lessonTransformer;
        $this->discussionTransformer = $discussionTransformer;
    }
  
    public function show($slug){
      $lesson = Lesson::where("slug",$slug)->first();
      if(empty($lesson)){
        abort(404);
      }
      $discussion = Discussion::where("lesson_id",$lesson["id"])->whereNull("discussion_id")->get();
      return response()->json([
            'lesson' =>  $this->lessonTransformer->transform($lesson),
            'discussions' =>  $this->discussionTransformer->transformCollection($discussion)        
      ]);
    }
}
