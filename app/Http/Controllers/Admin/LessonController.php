<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LessonType;
use App\Lesson;
use Image;
use Youtube;
use App\Quiz;
use App\QuizChoiche;
use App\QuizQuestion;
use App\Helper\Slug;
use App\LessonImage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

class LessonController extends Controller
{
    //

    function __construct(Slug $slug)
    {
        $this->slug = $slug;
    }

    public function store(Request $request){
        
       
        $lesson = new Lesson;
        $slug = $this->slug->create($request->title,$lesson);
        $request["slug"] = $slug;
        if($request->lesson_type_id == 2){
            if(!isset($request["video_id"])){
                $request["video_id"] = $this->uplodVideo($_FILES["video"]["tmp_name"],$request->slug) ;
            }
        }

        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required',
            'lesson_type_id' => 'required',
            'section_id' => 'required|exists:sections,id',
        ]);
        $lesson = $lesson->create($request->all());
        
        if($request->lesson_type_id == 3){
            $this->insertQuiz($lesson->id,$request);
        }

        return redirect('admin/sections/'.$lesson->section->id)->withSuccess("Materi baru berhasil dibuat");

    }

    public function create($section_id){
    	$lessonTypes = LessonType::all();
    	$lesson = Lesson::find($section_id);
    	if(empty($lesson)){
    		abort(404);
    	}
    	return view('admin/lessons/create',[
    											"lessonTypes" => $lessonTypes,
    											"lesson" => $lesson,
    										]);
    }

    public function getForm(Request $request,$lesson_type_id){

        if ($request->ajax()) {
            switch ($lesson_type_id) {
            case 1:
                return view('admin/lessons/form-text')->render(); 
                break;
            case 2:
                return view('admin/lessons/form-video')->render(); 
                break;
            case 3:
                return view('admin/lessons/form-quiz')->render(); 
                break;
            
            default:
                return "";
                break;
            } 
        }else{
            return "";
        }
       
    }


    public function uploadImage(Request $request){
        $path = "images/lessons/".$request->get("lesson_id")."_".uniqid().".png";
        $funcNum = $request->get("CKEditorFuncNum");
        $imageMimeTypes = array(
            'image/png',
            'image/gif',
            'image/PNG',
            'image/jpg',
            'image/JPG',
            'image/JPEG',
            'image/jpeg');

        $fileMimeType = mime_content_type($_FILES['upload']['tmp_name']);

        if (!in_array($fileMimeType, $imageMimeTypes)) {
            return "wrong file format";
        }
        LessonImage::create(["path"=>$path,"lesson_id" => $request->get("lesson_id")]);
        Image::make(Input::file('upload'))->save($path);
        $url =  url($path);
        $message = "Success";
        echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";

    }

    private function uplodVideo($path,$name){
        $video = Youtube::upload($path, [
            'title'       => $name,
            'description' => '-',

        ], 'unlisted');

        return $video->getVideoId();
    }


    private function insertQuiz($lesson_id,$request){
        $quiz = Quiz::create([
                                "lesson_id" => $lesson_id
                            ]);
        if(isset($request->question_id)){
            $numberOfChoice = array_count_values($request->question_id);
        }

        $choichesPointer = 0; // untuk menandai chocie ini milik question siapa
        for ($i=0; $i < sizeof($request->question) ; $i++) {             
            $question = [];
            $question["question_number"] = $i+1;
            $question["quiz_id"] = $quiz->id;
            $question["question"] = $request->question[$i];
            $question["question_type_id"] = $request->question_type_id[$i];
            $question["answer"] = $request->answer[$i];
            $quizQuestion = QuizQuestion::create($question);
            //for
            if($request->question_type_id[$i] == 2){
                 for ($j=0; $j < $numberOfChoice[$i] ; $j++) { 
                    QuizChoiche::create([
                        "quiz_question_id" => $quizQuestion->id,
                        "choiches_number" => $j+1,
                        "text" => $request->text[$choichesPointer+$j],
                    ]);
                 }
                 $choichesPointer = $choichesPointer + $numberOfChoice[$i];

            }

        }
        

    }

       public function remove(Request $request){
        $lesson = Lesson::find($request->input("id"));
        if(empty($lesson)){
            abort(404);
        }
        $lesson->delete();
        return redirect('admin/sections/'.$lesson->section->id)->withSuccess($lesson->name." Berhasil dihapus");

    }

}
