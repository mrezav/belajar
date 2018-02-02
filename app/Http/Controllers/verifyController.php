<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class verifyController extends Controller
{
    public function verify($token)
    {
    	$id = User::where('token',$token)->value('id');
    	$verify = User::where('token',$token)->first()->update(['token' => null]);
    	if($verify){
    		User::where('id',$id)->update(['status' => true]);
    		return redirect()->route('home')->with('message','Selamat akun anda sudah aktif');
    	}else{
    		echo "Gagal verifikasi";
    	}
    }
}
