<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function index()
    {
    	$kelas = Kelas::all();
    	return view('kelas.daftar_kelas',compact('kelas'));
    }

    public function input()
    {
    	return view('kelas.input_kelas');
    }

    public function insert(Request $request)
    {
    	$data = $request->all();
    	Kelas::create(['nama_kelas' => $data['nama_kelas']]);
    	return redirect('kelas')->with('succes','Berhasil input kelas');
    }

    public function edit($id)
    {
    	$data = Kelas::findOrFail($id);
    	return view('kelas.edit_kelas',compact('data'));
    }

    public function update(Request $request)
    {
    	$data = $request->all();
    	Kelas::where('id',$data['id'])->update(['nama_kelas' => $data['nama_kelas']]);
    	return redirect('kelas')->with('success','Berhasil update kelas');
    }

    public function delete($id)
    {
    	Kelas::where('id',$id)->delete();
    	return redirect('kelas')->with('success','Berhasil delete kelas');
    }
}
