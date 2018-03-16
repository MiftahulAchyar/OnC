<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;

class RoleController extends Controller
{
    public function index(){
		$roles = Role::paginate(10);
    	return view('admin/roles/index',[
    											"roles" => $roles
    										]);
	}

	 public function store(Request $request){
    	$request->validate([
    		'name' => 'required|max:255',
		]);
		Role::create($request->all());
		return redirect('admin/roles')->withSuccess($request->name." berhasil dibuat");

    }

}
