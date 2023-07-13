<?php

namespace App\Http\Controllers\Backend\Presensi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tblsholat;
use App\Models\userrfid;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Group;
use App\Models\PresensiSholat;
use Carbon\Carbon;

class PresensiSholatController extends Controller
{
    public function LihatPresensiSholat(){
        //$dateNow = Carbon::now()->toDateTimeString();
        // $dateNow = Carbon::now()->addDay()->toDateTimeString();
        //$dateNow = Carbon::now()->subWeek()->toDateTimeString();
        $dataPresensi = PresensiSholat::latest()->get();
        
        //dd($dateNow);
        return view('backend.presensi.sholat.lihat_presensi_sholat', compact('dataPresensi'));

    }

    public function TambahPresensiSholat(){
        $userRfid = UserRfid::latest()->get();
        $jurusan = Jurusan::latest()->get();
        $kelas = Kelas::latest()->get();
        $group = Group::latest()->get();
        return view('backend.presensi.sholat.tambah_presensi_sholat', compact('userRfid','jurusan', 'kelas', 'group'));
    }

    public function SimpanPresensiSholat(Request $request){
        $data = new PresensiSholat();
            $data->siswa_id = $request->siswa_id;
            $data->presensi = $request->presensi;
            $data->save();

            $notification = array(
                'message' => 'Presensi Sholat Berhasil ditambahkan',
                'alert-type' => 'success'
            );

            return redirect()->route('lihat.presensi.sholat')->with($notification);
    }
}
