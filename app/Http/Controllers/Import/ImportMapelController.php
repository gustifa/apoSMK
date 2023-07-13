<?php

namespace App\Http\Controllers\Import;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\ImportMapel;

use Maatwebsite\Excel\Facades\Excel;


class ImportMapelController extends Controller
{
    public function importMapel(Request $request){
    	$notification = array(
	    		'message' => 'Mata Pelajaran Berhasil diimport',
	    		'alert-type' => 'success'
	    	);

        Excel::import(new ImportMapel, $request->file('file')->store('files'));
        return redirect()->route('lihat.mapel')->with($notification);


    }
}
