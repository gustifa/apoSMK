<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal_pelajaran;

class SetupJadwalPelajaranController extends Controller
{
    public function lihatJadwal_pelajaran(){
        $jadwalpelajaran = Jadwal_pelajaran::orderBy('id')->get();
        return view('backend.setup.jadwal_pelajaran.lihat_jadwal_pelajaran', compact('jadwalpelajaran'));
    }

    public function simpanJadwal_pelajaran(Request $request){
        $simpanJadwal_pelajaran = Jadwal_pelajaran::insert([
            'nama_jadwal' => $request->nama_jadwal,
            'jadwal' => $request->jadwal,
        ]);
        $notification = array(
            'message' => 'Jadwal Pelajaran Berhasil ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('lihat.jadwal.pelajaran')->with($notification);
    }
}
