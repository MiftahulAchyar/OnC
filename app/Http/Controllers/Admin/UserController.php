<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class userController extends Controller
{
    public function index(){
		$users = User::paginate(10);
    	return view('admin/users/index',[
    											"users" => $users
    										]);
	}
}
