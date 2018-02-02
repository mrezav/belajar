<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
//jika terjadi error saat mengirim email maka ubah settingan keamanan email caranaya klik account dan pilih keamanan izinkan aplikasi kurang aman:aktif

class MailController extends Controller
{
    public function index()
    {
    	return view('mail');
    }

    public function send(Request $request)
    {
    	$data 		= $request->all();
    	// Variable data ini yang berupa array ini akan bisa diakses di dalam "view".
    	// $data = ['nama' => 'Muhammad Reza vahlevi', 'hasil' => 'Lulus' ];

    	//parameter pertama berisi view yang akan di kirim dan tipenya (html/text), parameter kedua adalah variabel yang di passing ke view
    	Mail::send(['html' => 'email'], $data, function($message) use ($data){
    		$message->to($data['emailTujuan'], $data['penerima'])->subject($data['subjek']);
    		$message->from('mrezavahlevi66@gmail.com','Admin');
    	});
    	return redirect()->back()->with('success' , 'Kirim email berhasi');
    }
}
