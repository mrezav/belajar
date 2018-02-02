<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Rules;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Telepon;
use App\Models\Hobi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\support\collection;
use Validator;
use \Input as Input;

class SiswaController extends Controller
{
	protected $request;
	public function __construct(request $request){
		$this->request = $request;
        $this->middleware('auth');
        $this->middleware('admin');
	}

    public function form_input(){
        $list_kelas = Kelas::pluck('nama_kelas','id');
        $list_hobi  = Hobi::pluck('nama_hobi','id');
        
    	return view('siswa.form_input', compact('list_kelas', 'list_hobi'));
    }

    public function insert_siswa(){
    	//DB::table('siswa')->insert([['nama' => 'tes', 'alamat' => 'Bandung', 'tgl_lahir' => '12-11-1995', 'jenis_kelamin' => 'P']]); 
        $request = $this->request;
        $data = $this->request->all();
    	$rules = array(
			'nama' => 'required',
    		'alamat' => 'required|min:5',
    		'tgl_lahir' => 'required',
    		'jenis_kelamin' => 'required',
            'nomor_telepon' => 'sometimes|numeric|digits_between:10,15|unique:telepon,nomor_telepon',
            'id_kelas' => 'required',
            'foto' => 'required|image|max:1000|mimes:jpeg,jpg,png'
    	);

        $messages = array(
            'required' => ':Attribute belum diisi',
            'image' => 'Maaf :attribute salah',
            'min' => 'Maaf :attrubute kurang dari 5 karakter',
            'max' => ':Attribute melebihi kapasitas',
            'mimes' => 'Ekstensi salah',
            'int' => ':Attribute harus angka'
        );

        validator::make($data,$rules,$messages)->validate();
        
        $namaFoto = $data['foto']->getClientOriginalName();
        $foto = $data['foto'];
        $foto->move('uploads', $namaFoto);
        $data['foto'] = $namaFoto;
       
    	$siswa = Siswa::create($data);
        
        $telepon = new Telepon;
        $telepon->nomor_telepon = $request->input('nomor_telepon');

        $siswa->hobi()->attach($request->input('hobi'));

        $siswa->telepon()->save($telepon);

    	return redirect('siswa');
    }

    public function edit_siswa($id){
        $siswa = Siswa::findOrFail($id);
        $list_kelas = Kelas::pluck('nama_kelas','id');
        $list_hobi = Hobi::pluck('nama_hobi','id');
        $chk_id_hobi = $siswa->getHobiSiswaAttribute();
    	//$siswa = DB::table('siswa')->where('id', $id)->get();
    	return view('siswa.edit_siswa', compact('siswa','list_kelas','list_hobi','chk_id_hobi'));
    }

    public function update_siswa(){
    	//DB::table('siswa')->where('nama', 'tes')->update(['nama' => 'Rudi', 'jenis_kelamin' => 'L']);
        $request = $this->request;
        $data = $this->request->all();
        $rules = array(
            'nama' => 'required',
            'alamat' => 'required|min:5',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'nomor_telepon' => 'sometimes|numeric|digits_between:10,15|unique:telepon,nomor_telepon,' . $request->input('id') . ',id_siswa',
            'id_kelas' => 'required',
            'foto' => 'sometimes|image|max:1000|mimes:jpeg,jpg,png'
        );

        $messages = array(
            'required' => ':Attribute belum diisi',
            'image' => 'Maaf :attribute salah',
            'min' => 'Maaf :attrubute kurang dari 5 karakter',
            'max' => ':Attribute melebihi kapasitas',
            'mimes' => 'Ekstensi salah'
        );
        validator::make($data,$rules,$messages)->validate();

        if($request->hasFile('foto')){
            $namaFoto = $data['foto']->getClientOriginalName();
            $foto = $data['foto'];
            $foto->move('uploads', $namaFoto);
            $data['foto'] = $namaFoto;
        }        

    	$siswa = Siswa::findOrFail($data['id']);
        $siswa->update($data);

        $telepon = $siswa->telepon;
        $telepon->nomor_telepon = $request->input('nomor_telepon');
        $siswa->telepon()->save($telepon);

        $siswa->hobi()->sync($request->input('hobi_siswa'));
    	return redirect('siswa');
    }

    public function delete_siswa($id){
    	//DB::table('siswa')->where('id' , '>', '7')->delete();
    	//Soft deletes
    	//$delete = Siswa::find($id);
    	//$delete->delete();
    	
    	$id = $id;
    	Siswa::where('id', $id)->delete();
    	return redirect('siswa');
    }

    public function daftar_siswa(){
    	//$record = Siswa::all()->sortBy('id');
    	//$record = DB::table('siswa')->where('nama', 'like', '%a%')->get();
    	//Siswa::withTrashed()->restore(); //mengembalikan record yang sudah dihapus
    	$siswa_list = Siswa::orderBy('id','asc')
    						->Paginate(5);
                            
    	$jumlah_siswa = Siswa::count();
    	return view('siswa.daftar_siswa', compact('siswa_list','jumlah_siswa'));
    }

    public function detail_siswa($id){
        $data = Siswa::findOrFail($id);

        return view('siswa.detail_siswa', compact('data'));
    }

    public function tes_query(){
    	//insert

    	/*$siswa = new Siswa;
    	$siswa->id = '1';
    	$siswa->nama = 'Bedul';
    	$siswa->alamat = 'Cisaat';
    	$siswa->tgl_lahir = '30-01-1994';
    	$siswa->jenis_kelamin = 'L';

    	$siswa->save();*/

    	//Insert Mass assigment
    	//Siswa::create(['nama' => 'Adam', 'alamat' => 'Jakarta', 'tgl_lahir' => '12-01-1992', 'jenis_kelamin' => 'L']);

    	//Update
    	/*
     	$siswa = Siswa::where('nama','Adam')->first();//penggunaan first akan mengambil record yang lebih awal
    	$siswa->nama = 'Usman';
    	$siswa->save();
    	*/

    	//Update mass assigment
    	//Siswa::find(10)->update(['nama' => 'Riska', 'jenis_kelamin' => 'P']);
    	//Siswa::where('nama', 'Adam')->update(['alamat' => 'Cianjur']);

    	//delete
    	//Siswa::where('nama','Usman')->delete();

    	//Siswa::destroy([3,5]);
    	//$siswa = Siswa::all();
    	//dd($siswa);
    }

    public function tes_collection(){
        // $collection = Siswa::all()->first(); //mengambil record pertama
        // $collection = Siswa::all()->last(); //mengambil record terakhir
        // $collection = Siswa::all()->take(3); //mengambir 3 record
        // $collection = Siswa::all()->pluck('nama'); //Hanya mengambil satu atribut seluruh record
        // $collection = Siswa::all()->where('id', 7); //mengambil satu record berdasarkan kriteria tertentu
        // $collection = Siswa::all()->whereIn('id', [4,7]); //mengambil banyak record berdaserkan kriteria tertentu
        // $collection = Siswa::select('nama','alamat','tgl_lahir')->take(3)->get()->toArray();
        // foreach ($collection as $row){
        //     echo $row['nama']."<br>";
        // }
        // $collection = Siswa::all()->count(); //menghitung jumlah record yang telah di filter
        // $collection = Siswa::count(); //menghitung jumlah record yang belum di filter
        
        $orang = ['rasmus','otwel','john'];
        $koleksi = collect($orang)->map(function($nama){
            return ucwords($nama);
        });

        return $orang;  
    }
}
