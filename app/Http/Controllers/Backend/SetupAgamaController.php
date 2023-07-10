<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agama;

class SetupAgamaController extends Controller
{
    public function Agama(){
        // $dataAgama = Agama::latest()->get();
         $dataAgama = Agama::orderBy('id','asc')->get();
        return view('backend.setup.agama.index', compact('dataAgama'));
    }

    public function TambahAgama(){
        
        return view('backend.setup.agama.tambah_agama');
    }

    public function SimpanAgama(Request $request){
        
        $validatedData = $request->validate([
	    		'nama' => 'required|unique:agama,nama',
	    		
	    	]);

	    	$data = new Agama();
	    	$data->nama = $request->nama;
	    	$data->save();

	    	$notification = array(
	    		'message' => 'Agama Berhasil ditambahkan',
	    		'alert-type' => 'success'
	    	);

	    	return redirect()->route('lihat.agama')->with($notification);
	    }

	    public function EditAgama($id){
	        $editAgama = Agama::find($id);
	        return view('backend.setup.agama.edit_agama', compact('editAgama'));
    	}

    	public function UpdateAgama(Request $request, $id){
	       $data = Agama::find($id);
     
     		$validatedData = $request->validate([
    		'nama' => 'required|unique:agama,nama,'.$data->id
    		
    		]);

    	
	    	$data->nama = $request->nama;
	    	$data->save();

	    	$notification = array(
	    		'message' => 'Agama Berhasil diperbaharui',
	    		'alert-type' => 'success'
	    	);

	    	return redirect()->route('lihat.agama')->with($notification);
    	}

	    public function HapusAgama($id){
	    	$agama = Agama::find($id);
	    	$agama->delete();

	    	$notification = array(
	    		'message' => 'Agama Berhasil dihapus',
	    		'alert-type' => 'info'
	    	);

	    	return redirect()->route('lihat.agama')->with($notification);

	    }
}
