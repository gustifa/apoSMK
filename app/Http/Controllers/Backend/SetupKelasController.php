<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;

class SetupKelasController extends Controller
{
    public function LihatKelas(){
    	// $dataKelas = Kelas::all();
    	$dataKelas = Kelas::orderBy('id','asc')->get();
    	return view('backend.setup.kelas.lihat_kelas', compact('dataKelas'));
    }

    public function TambahKelas(){
        
        return view('backend.setup.kelas.tambah_kelas');
    }

    public function SimpanKelas(Request $request){
        
        $validatedData = $request->validate([
	    		'nama' => 'required|unique:kelas,nama',
	    		
	    	]);

	    	$data = new Kelas();
	    	$data->nama = $request->nama;
	    	$data->save();

	    	$notification = array(
	    		'message' => 'Kelas Berhasil ditambahkan',
	    		'alert-type' => 'success'
	    	);

	    	return redirect()->route('lihat.kelas')->with($notification);
	    }

	    public function EditKelas($id){
	        $editKelas = Kelas::find($id);
	        return view('backend.setup.kelas.edit_kelas', compact('editKelas'));
    	}

    	public function UpdateKelas(Request $request, $id){
	       $data = Kelas::find($id);
     
     		$validatedData = $request->validate([
    		'nama' => 'required|unique:kelas,nama,'.$data->id
    		
    		]);

    	
	    	$data->nama = $request->nama;
	    	$data->save();

	    	$notification = array(
	    		'message' => 'Kelas Berhasil diperbaharui',
	    		'alert-type' => 'success'
	    	);

	    	return redirect()->route('lihat.kelas')->with($notification);
    	}

	    public function HapusKelas($id){
	    	$agama = Kelas::find($id);
	    	$agama->delete();

	    	$notification = array(
	    		'message' => 'Kelas Berhasil dihapus',
	    		'alert-type' => 'info'
	    	);

	    	return redirect()->route('lihat.kelas')->with($notification);

	    }

	    
}
