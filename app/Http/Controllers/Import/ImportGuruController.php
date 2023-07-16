<?php

namespace App\Http\Controllers\Import;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\ImportGuru;

use Maatwebsite\Excel\Facades\Excel;

class ImportGuruController extends Controller
{

    // public function importGuru(Request $request){
    // 	$notification = array(
	   //  		'message' => 'Guru Berhasil diimport',
	   //  		'alert-type' => 'success'
	   //  	);

    //     Excel::import(new ImportGuru, $request->file('file')->store('files'));
    //     return redirect()->route('lihat.mapel')->with($notification);


    // }
}
