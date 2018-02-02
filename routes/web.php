<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('register','RegisterController@register');

Route::post('postRegister','RegisterController@postRegister');

Route::get('login',['as' => 'login', 'uses' => 'LoginController@login']);

Route::post('cek_login','LoginController@cek_login');

Route::get('logout', function(){
	Auth::logout();
	return redirect('login');
});

Route::get('halaman_user',function(){
	return view('halaman_user');
});

Route::get('home','HomeController@home')->name('home');

Route::get('tes_query','SiswaController@tes_query');

Route::get('tes_collection','SiswaController@tes_collection');

Route::get('siswa','SiswaController@daftar_siswa');

Route::get('siswa/input','SiswaController@form_input');

Route::get('siswa/{id}','SiswaController@detail_siswa');

Route::get('siswa/edit/{id}','SiswaController@edit_siswa');

Route::post('insert_siswa','SiswaController@insert_siswa');

Route::post('update_siswa','SiswaController@update_siswa');

Route::get('delete_siswa/{id}','SiswaController@delete_siswa');

Route::get('kelas','KelasController@index');

Route::get('kelas/input_kelas','KelasController@input');

Route::post('kelas/insert_kelas','KelasController@insert');

Route::get('kelas/edit_kelas/{id}','KelasController@edit');

Route::get('kelas/delete_kelas/{id}','KelasController@delete');

Route::post('update_kelas','KelasController@update');

Route::get('email','MailController@index');

Route::post('send','MailController@send');

Route::get('/verify/{token}', 'verifyController@verify')->name('verify');

Route::get('verify_status',function(){
	$status = Auth::user()->status;
	if($status == false){
		Auth::logout();
		return redirect('home')->with('message','Maaf Akun anda Belum Aktif');
	}else{
		return redirect('siswa');
	}
});
