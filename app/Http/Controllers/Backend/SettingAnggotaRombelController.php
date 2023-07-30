<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Anggota_rombel;
use App\Models\Rombongan_belajar;

class SettingAnggotaRombelController extends Controller
{
    public function LihatAnggotaRombel(){
        $anggotaRombel = Anggota_rombel::all();
        $rombonganBelajar = Rombongan_belajar::all();
        return view('backend.setup.rombel.anggota_rombel', compact('anggotaRombel', 'rombonganBelajar'));
    }

    public function getRombelPesertaDidik($rombongan_belajar_id){

        $getAnggotaRombel = Anggota_rombel::where('rombongan_belajar_id',$rombongan_belajar_id)->orderBy('peserta_didik_id', 'DESC')->get();
         
        // dd($getAnggotaRombel);
        return json_encode($getAnggotaRombel);
     }
}
