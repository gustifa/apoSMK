<?php

namespace App\Http\Controllers\Backend\Presensi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tblsholat;
use App\Models\UserRfid;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Group;

class PresensiSholatController extends Controller
{
    public function LihatPresensiSholat(){
        $dataPresensi = tblsholat::all();
        return view('backend.presensi.sholat.lihat_presensi_sholat', compact('dataPresensi'));
    }

    public function TambahPresensiSholat(){
        $userRfid = UserRfid::latest()->get();
        $jurusan = Jurusan::latest()->get();
        $kelas = Kelas::latest()->get();
        $group = Group::latest()->get();
        return view('backend.presensi.sholat.tambah_presensi_sholat', compact('userRfid','jurusan', 'kelas', 'group'));
    }

    public function SimpanPresensiSholat(){
        
    }
}
