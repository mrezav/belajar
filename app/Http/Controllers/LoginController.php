<?php

namespace App\Http\Controllers;

use App\models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function __construct(){
        $this->middleware('guest');
    }
    
    public function login(){
    	return view('login.form_login');
    }

    public function cek_login(Request $request){
    	if (Auth::attempt([
    		'email' => $request->username,
    		'password' => $request->password
    	])){
    		return redirect('verify_status');
    	}elseif(Auth::attempt([
    		'username' => $request->username,
    		'password' => $request->password
    	])){
    		return redirect('verify_status');
    	}else{
    		return redirect('login');
    	}
    }
}
