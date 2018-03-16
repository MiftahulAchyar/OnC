<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Chapter;
use App\Section;
use App\Group;
use App\Helper\Slug;
use Illuminate\Support\Facades\Input;

class ChapterController extends Controller
{
	function __construct(Slug $slug)
    {
        $this->slug = $slug;
    }

    public function store(Request $request){
    	
    	$chapter = new Chapter;
    	$slug = $this->slug->create($request->name,$chapter);
    	$request["slug"] = $slug;

    	$request->validate([
    		'name' => 'required|max:255',
            'slug' => 'required',
    		'course_id' => 'required|exists:courses,id',
		]);
		$chapter = $chapter->create($request->all());
		return redirect('admin/courses/'.$chapter->course->id)->withSuccess("Bab ".$chapter->name." Berhasil ditambahkan");

    }

    public function update(Request $request,$id){
        $slug = $this->slug->create($request->name,new Chapter);
        $request["slug"] = $slug;
        $request->validate([
            'name' => 'required|max:255',
            'course_id' => 'required|exists:courses,id',
        ]);
        $chapter = Chapter::find($id);
        if(empty($chapter)){
            abort(404);
        }

        $chapter->update($request->all());
        return redirect('admin/courses/'.$request->course_id)->withSuccess("Bab Berhasil di Ubah");

        
    }

    public function edit($id){
        $chapter = Chapter::find($id);
        $groups = Group::whereHas('courses')->get();
        if(empty($chapter)){
            abort(404);
        }
        return view('admin/chapters/edit',[
                                                "chapter" => $chapter,
                                                "groups" => $groups
                                            ]);
    }



    public function remove(Request $request){

        if(empty($request->input("chapter_id")) && empty($request->input("section_id")) ){

            return redirect('admin/courses/'.$request->input("course_id"));
        }
        
        Chapter::destroy($request->input("chapter_id"));
        Section::destroy($request->input("section_id"));
        return redirect('admin/courses/'.$request->input("course_id"))->withSuccess("Data Berhasil dihapus");

    }
}
