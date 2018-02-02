<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telepon extends Model
{
	protected $table = 'telepon';
    protected $primaryKey = 'id_siswa';
    protected $fillable = ['id_siswa','nomor_telepon'];

    public function siswa(){
    	return $this->belongsTo('Apps\Models\Siswa','id_siswa');
    }
}
