<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Siswa extends Model
{
	//use SoftDeletes;
	//protected $dates = ['deleted_at']; //untuk softdeletes

	//public $timestamps = false; //tambahkan baris ini jika tidak ada atribut created_at dan update_at di tabel
	protected $table = 'siswa'; // mendeklarasikan nama tabel ke dalam variabel (wajib) jika nama tabel tidak plural
	//protected $primaryKey = 'id_siswa'; // mendeklarasikan atribut kunci ke variabel $primaryKey (wajib) jika namanya bukan "id"
	protected $fillable = ['nama', 'alamat', 'tgl_lahir', 'jenis_kelamin','id_kelas','foto']; // $fillable berisi atribut yang boleh di akses mass assigment
	//protected $guarded = ['id']; // $guarded berisi atribut yang tidak boleh akses mass assigment
	protected $dates = ['tgl_lahir'];

	public function telepon(){
		return $this->hasOne('App\Models\Telepon','id_siswa');
	}

	public function kelas(){
		return $this->belongsTo(Kelas::class,'id_kelas');
	}

	public function hobi(){
		return $this->belongsToMany(Hobi::class, 'hobi_siswa', 'id_siswa', 'id_hobi')->WithTimeStamps();
	}

	public function getHobiSiswaAttribute(){
		return $this->hobi->pluck('id')->toArray();
	}
}
