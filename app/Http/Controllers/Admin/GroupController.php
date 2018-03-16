<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Group;

class GroupController extends Controller
{
    public function index(){
		$groups = Group::paginate(10);
    	return view('admin/groups/index',[
    											"groups" => $groups
    										]);
	}


	 public function store(Request $request){
    	$request["name"] = strtoupper($request->name);
    	$request->validate([
    		'name' => 'required|max:255',
		]);
		Group::create($request->all());
		return redirect('admin/groups')->withSuccess($request->name." berhasil dibuat");

    }

     public function remove(Request $request){
        $group = Group::find($request->input("id"));
        if(empty($group)){
            abort(404);
        }
        if(!is_null($group->children)){
            return redirect('admin/groups')->withErrors(["grup ini mempunyai sub grup"]);
        }
        $group->delete();
        return redirect('admin/groups')->withSuccess($group->name." berhasil dihapus" );

    }

    
}
