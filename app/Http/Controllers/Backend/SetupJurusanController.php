<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jurusan;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportJurusan;


class SetupJurusanController extends Controller
{
    public function LihatJurusan(){
    	// $dataJurusan = Jurusan::all();
    	$dataJurusan = Jurusan::orderBy('id','asc')->get();
    	return view('backend.setup.jurusan.lihat_jurusan', compact('dataJurusan'));
    }

    public function TambahJurusan(){
        
        return view('backend.setup.jurusan.tambah_jurusan');
    }

    public function SimpanJurusan(Request $request){
        
        $validatedData = $request->validate([
	    		'nama' => 'required|unique:jurusan,nama',
	    		
	    	]);

	    	$data = new Jurusan();
	    	$data->nama = $request->nama;
	    	$data->kode = $request->kode;
	    	$data->save();

	    	$notification = array(
	    		'message' => 'Jurusan Berhasil ditambahkan',
	    		'alert-type' => 'success'
	    	);

	    	return redirect()->route('lihat.jurusan')->with($notification);
	    }

	    public function EditJurusan($id){
	        $editJurusan = Jurusan::find($id);
	        return view('backend.setup.jurusan.edit_jurusan', compact('editJurusan'));
    	}

    	public function UpdateJurusan(Request $request, $id){
	       $data = Jurusan::find($id);
     
     		$validatedData = $request->validate([
    		'nama' => 'required|unique:jurusan,nama,'.$data->id
    		
    		]);

    	
	    	$data->nama = $request->nama;
	    	$data->kode = $request->kode;
	    	$data->save();

	    	$notification = array(
	    		'message' => 'Jurusan Berhasil diperbaharui',
	    		'alert-type' => 'success'
	    	);

	    	return redirect()->route('lihat.jurusan')->with($notification);
    	}

	    public function HapusJurusan($id){
	    	$agama = Jurusan::find($id);
	    	$agama->delete();

	    	$notification = array(
	    		'message' => 'Jurusan Berhasil dihapus',
	    		'alert-type' => 'info'
	    	);

	    	return redirect()->route('lihat.jurusan')->with($notification);

	    }

	    public function ImportJUrusan(Request $request){

        $notification = array(
                'message' => 'Jurusan diimport',
                'alert-type' => 'success'
            );

        $import = Excel::import(new ImportJurusan, $request->file('file')->store('files'));
        //dd($import);
        return redirect()->route('lihat.jurusan')->with($notification);
    }
}
