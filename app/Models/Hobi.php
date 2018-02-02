<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hobi extends Model
{
    protected $table = 'hobi';
    protected $fillable = ['nama_hobi'];

    public function siswa(){
    	return $this->belongsToMany(Siswa::class, 'hobi_siswa', 'id_hobi', 'id_siswa');
    }
}
