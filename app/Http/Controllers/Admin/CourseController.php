<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Group;
use App\Course;
use App\Helper\Slug;

class CourseController extends Controller
{

    function __construct(Slug $slug)
    {
        $this->slug = $slug;
    }
    
	public function index(){
		$courses = Course::paginate(10);
    	return view('admin/courses/index',[
    											"courses" => $courses
    										]);
	}

    public function create(){
    	$groups = Group::whereNotNull("parent_id")->get();
    	return view('admin/courses/create',[
    											"groups" => $groups
    										]);
    }


    public function show($id){
        $course = Course::find($id);
        $groups = Group::whereNotNull("parent_id")->get();
        if(empty($course)){
            abort(404);
        }
        return view('admin/courses/view',[
                                                "course" => $course,
                                                "groups"=> $groups
                                            ]);
    }


    public function update(Request $request,$id){
        $slug = $this->slug->create($request->name,new Course);
        $request["slug"] = $slug;
        $request->validate([
            'name' => 'required|max:255',
            'group_id' => 'required|exists:groups,id',
        ]);
        $course = Course::find($id);
        if(empty($course)){
            abort(404);
        }

        $course->update($request->all());
        return redirect('admin/courses/'.$id)->withSuccess("Mata Pelajaran Berhasil di Ubah");


        
    }


    public function remove(Request $request){
        $course = Course::find($request->input("id"));
        if(empty($course)){
            abort(404);
        }
        $course->delete();
        return redirect('admin/courses')->withSuccess($course->name);

    }


    public function store(Request $request){
    	
    	$course = new Course;
    	$slug = $this->slug->create($request->name,$course);
    	$request["slug"] = $slug;

    	$request->validate([
    		'name' => 'required|max:255',
    		'group_id' => 'required|exists:groups,id',
		]);
		$course = $course->create($request->all());
		return redirect('admin/courses/create')->withSuccess($course->id);

    }

}
