<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WaktuSholat;

class SetupWaktuSholatController extends Controller
{
    public function lihatWaktuSholat(){
        $waktuSholat = WaktuSholat::orderBy('id')->get();
        return view('backend.setup.waktu_sholat.lihat_waktu_sholat', compact('waktuSholat'));
    }

    public function simpanWaktuSholat(Request $request){
        $simpanWaktuSholat = WaktuSholat::insert([
            'nama' => $request->nama,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
        ]);
        $notification = array(
            'message' => 'Waktu Sholat Berhasil ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('lihat.waktu.sholat')->with($notification);
    }

    public function hapusWaktuSholat($id){
        $hapusWaktuSholat = WaktuSholat::findOrFail($id)->delete();
        // $hapusWaktuSholat->delete();
        $notification = array(
            'message' => 'Waktu Sholat dihapus',
            'alert-type' => 'warning'
        );

         return redirect()->route('lihat.waktu.sholat')->with($notification);
    }
}
