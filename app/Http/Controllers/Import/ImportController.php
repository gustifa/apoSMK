<?php

namespace App\Http\Controllers\Import;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\ImportUserRfid;
use App\Imports\ImportGuru;

use App\Models\UserRfid;
use App\Models\Guru;

class ImportController extends Controller
{
    public function LihatImportUserRfid(Request $request){
        return view('admin.import.import_userrfid');
    }

    public function importUserRfid(Request $request){

      
    	$notification = array(
	    		'message' => 'UserRfid Berhasil ditambahkan',
	    		'alert-type' => 'success'
	    	);

        Excel::import(new ImportUserRfid, $request->file('file')->store('files'));
        return redirect()->route('lihat.user')->with($notification);


    }
    // public function LihatPeserta_didik(Request $request){
    //     return view('backend.setup.peserta_didik.lihat_peserta_didik');
    // }

    // public function ImportPeserta_didik(Request $request){

    //     $notification = array(
    //             'message' => 'Peserta Didik Berhasil diimport',
    //             'alert-type' => 'success'
    //         );

    //     Excel::import(new Peserta_didik, $request->file('file')->store('files'));
    //     return redirect()->route('lihat.peserta_didik')->with($notification);


    // }

    // public function importGuru(Request $request){

    //   //   $validatedData = $request->validate([
    //         //  'Nis' => 'required|unique:user,Nis',
                
    //         // ]);
    //     $notification = array(
    //             'message' => 'UserRfidBerhasil ditambahkan',
    //             'alert-type' => 'success'
    //         );

    //     Excel::import(new Guru, $request->file('file')->store('files'));
    //     return redirect()->route('lihat.guru')->with($notification);


    // }

    // public function importUserRfid(Request $request){

    //     $file = $request->file('file'); 
    //     $nama_file = time() . ' ' . $file->getClientOriginalName(); 
    //     $file->move(public_path() . '/file/excel/import_file/', $nama_file); // masukin file 
    //     $import = new UserRfid; 
    //         try { 
    //             $import->import(public_path('/file/excel/import_file/' . $nama_file)); 
    //             return redirect()->route('lihat.user')->with('success', 'Data siswa berhasil di import'); 
    //         } catch (\Throwable $th) { 
    //             //dd($import->failures()); 
    //             if ($import->failures()->isNotEmpty()) { 
    //                 return redirect()->route('lihat.user')->with('erorr', $import->failures()); 
    //             }else { 
    //                 return redirect()->route('lihat.user')->with('fail', 'Excel Tidak sesuai dengan template'); 
    //             } 
 
    //         }

    // }

    public function LihatImportGuru(Request $request){
        return view('admin.import.import_guru');
    }

    public function ImportGuru(Request $request){

      //   $validatedData = $request->validate([
	    	// 	'Nis' => 'required|unique:user,Nis',
	    		
	    	// ]);
    	$notification = array(
	    		'message' => 'UserRfidBerhasil ditambahkan',
	    		'alert-type' => 'success'
	    	);

        Excel::import(new ImportUserRfid, $request->file('file')->store('files'));
        return redirect()->route('lihat.user')->with($notification);


    }
}
