<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Validator;

class RegisterController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }

    public function register(){
    	return view('register.form_register');
    }

    public function postRegister(Request $request){
        $data = $request->all();
        $rules = array(
            'nama' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|min:4'
        );

        $messages = array(
            'required' => 'Maaf :attribute belum diisi',
            'unique' => ':attribute Sudah ada',
            'min' => ':attribute Tidak boleh kurang dari 4 karakter'
        );

        validator::make($data,$rules,$messages)->validate();

    	$user = new User;
    	$user->name        = Input::get('nama');
    	$user->username    = Input::get('username');
    	$user->email       = Input::get('email');
        $user->token       = str_random(25);
        $user->status      = false;
    	$user->password    = bcrypt(Input::get('password'));
    	$user->id_role     = DB::table('roles')->where('nama_role','admin')->first()->id;
    	$user->save();
        $user->sendVerificationEmail();
       
        return redirect('home')->with('message','Silahkan Buka email anda dan verfikasi untuk mengaktifkan akun !');
    }
}
