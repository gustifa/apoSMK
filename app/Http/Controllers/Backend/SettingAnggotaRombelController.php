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
}
