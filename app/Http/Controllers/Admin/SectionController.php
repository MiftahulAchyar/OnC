<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Section;
use App\Course;
use App\Helper\Slug;

class SectionController extends Controller
{
	function __construct(Slug $slug)
    {
        $this->slug = $slug;
    }

     public function store(Request $request){
    	
    	$section = new Section;
    	$slug = $this->slug->create($request->name,$section);
    	$request["slug"] = $slug;

    	$request->validate([
    		'name' => 'required|max:255',
            'slug' => 'required',
    		'chapter_id' => 'required|exists:chapters,id',
		]);
		$section = $section->create($request->all());
		return redirect('admin/courses/'.$section->chapter->course->id)->withSuccess("Sub Bab ".$section->name." Berhasil ditambahkan");

    }

    public function show($id){
        $section = Section::find($id);
        if(empty($section)){
            abort(404);
        }
        return view('admin/sections/view',[
                                                "section" => $section,
                                            ]);
    }


    public function edit($id){
        $section = Section::find($id);
        $courses = Course::all();
        if(empty($section)){
            abort(404);
        }
        return view('admin/sections/edit',[
                                                "section" => $section,
                                                "courses" => $courses
                                            ]);
    }

     public function update(Request $request,$id){
        $slug = $this->slug->create($request->name,new Section);
        $request["slug"] = $slug;
        $request->validate([
            'name' => 'required|max:255',
            'chapter_id' => 'required|exists:chapters,id',
        ]);
        $section = Section::find($id);
        if(empty($section)){
            abort(404);
        }

        $section->update($request->all());
        return redirect('admin/sections/'.$request->id)->withSuccess("SUB Bab Berhasil di Ubah");

        
    }
}
