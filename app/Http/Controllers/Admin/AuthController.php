<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(){
		$this->middleware('guest:admin');
	}

    public function getLogin()
    {
    	return view('admin.page.auth.login');
    }

    public function postLogin(Request $request)
    {
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required|min:6'
    	]);
    	$credentials = $request->only('email', 'password');
    	if (Auth::guard('admin')->attempt($credentials)) {
    		return redirect()->intended(route('admin.dashboard'));
    	}
    	return redirect()->back()->withInput($request->only('email', 'remember'))->with('message','Tài khoản không đúng');
    }
}
