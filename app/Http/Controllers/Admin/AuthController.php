<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AuthController extends Controller
{
    public function view_login(){
    	
    	if (Auth::check()) {
    		return redirect('admin');
		}

    	return view('admin/login');
    }

    public function login(Request $request){
    	$request->validate([
    		'email' => 'required|email|max:255',
    		'password' => 'required',
		]);

		if(! Auth::attempt($this->getCredentials($request)))
        {
            return redirect('admin/login')->withErrors(["Invalid Credentials"]);
        }

        $user = Auth::user();

        if(!$user->hasRole(['superadministrator', 'administrator'])){
        	$guard = Auth::guard();
        	$guard->logout();
        	$request->session()->flush();
		    $request->session()->regenerate();
        	return redirect('admin/login')->withErrors(["Invalid Credentials"]);
        }
			
        return redirect('/admin');
        
    }

    protected function getCredentials(Request $request)
    {
        return [
            'email' => $request->email,
            'password' => $request->password
        ];
    }
}
