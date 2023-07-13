<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mapel;

class SetupMataPelajaranController extends Controller
{
     public function Index(){
        $dataMapel = Mapel::latest()->get();
        return view('backend.setup.mapel.index', compact('dataMapel'));
    }

    public function template_excel_mapel(){
        $path = public_path('/file/excel/import/import_template/template_excel_mapel.xlsx');
        $name = basename($path);
        $headers = ["Content-Type:   application/vnd.ms-excel; charset=utf-8"];
        return response()->download($path, $name, $headers);
    }
}
