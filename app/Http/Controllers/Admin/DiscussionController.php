<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Discussion;

class DiscussionController extends Controller
{
    
    public function index(){
		$discussions = Discussion::paginate(10);
    	return view('admin/discussions/index',[
    											"discussions" => $discussions
    										]);
	}

	 public function remove(Request $request){
        $discussion = discussion::find($request->input("id"));
        if(empty($discussion)){
            abort(404);
        }
        if(sizeof($discussion->discussions) > 0){
            return redirect('admin/discussions')->withErrors(["diskusi ini mempunyai sub diskusi"]);
        }
        $discussion->delete();
        return redirect('admin/discussions')->withSuccess($discussion->name." berhasil dihapus" );

    }



}
