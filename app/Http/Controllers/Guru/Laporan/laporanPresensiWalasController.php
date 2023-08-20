<?php

namespace App\Http\Controllers\Guru\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rombongan_belajar;
use App\Models\Anggota_rombel;
use App\Models\Peserta_didik;
use App\Models\PresensiSholat;

class laporanPresensiWalasController extends Controller
{
    public function laporanPresensiWalas(){
        $user = Auth::user()->guru_id;
        $walas = Rombongan_belajar::where('guru_id', $user )->get();
        $implode_rombel = $walas->implode('rombongan_belajar_id');
        // dd($implode_rombel);
        if($implode_rombel == !NULL){
            $anggota_rombel_walas = Anggota_rombel::where('rombongan_belajar_id', $implode_rombel)->get();
        }else{
            $anggota_rombel_walas = Anggota_rombel::all();
        }
        return view('guru.laporan.presensi_sholat.semua_presensi_sholat', compact('anggota_rombel_walas'));
    }

    public function laporanWalasAll($peserta_didik_id){
        $user = Auth::user()->guru_id;
        $walas = Rombongan_belajar::where('guru_id', $user )->get();
        $implode_rombel = $walas->implode('nama');
        $peserta_didikId = Peserta_didik::select('rfid_id', 'peserta_didik_id', 'nama')->where('peserta_didik_id', $peserta_didik_id)->get();
        $implodePesertaDidik =$peserta_didikId->implode('rfid_id');
        $namaPesertaDidik =$peserta_didikId->implode('nama');

        $dataLaporan = PresensiSholat::where('rfid_id', $implodePesertaDidik)->get();

        return view('guru.laporan.presensi_sholat.cetak_semua_laporan', compact('dataLaporan', 'namaPesertaDidik', 'implode_rombel'));

    }
}
