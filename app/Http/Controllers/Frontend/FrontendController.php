<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sekolah;

class FrontendController extends Controller
{
    public function frontendHome(){
        $idSekolah = Sekolah::select('sekolah_id')->get();
        $implodeId = $idSekolah->implode('sekolah_id');
    	$dataSekolah = Sekolah::find($implodeId);
        return view('frontend.index', compact('dataSekolah'));
    }
}
