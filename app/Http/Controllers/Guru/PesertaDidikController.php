<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Rombongan_belajar;
use App\Models\Anggota_rombel;

class PesertaDidikController extends Controller
{
    public function lihatAnggota_rombel_walas(){
        $user = Auth::user()->guru_id;
        $walas = Rombongan_belajar::where('guru_id', $user )->get();
        $implode_rombel = $walas->implode('rombongan_belajar_id');
        // dd($implode_rombel);
        if($implode_rombel == !NULL){
            $anggota_rombel_walas = Anggota_rombel::where('rombongan_belajar_id', $implode_rombel)->get();
        }else{
            $anggota_rombel_walas = Anggota_rombel::all();
        }
       
        return view('guru.rombel.anggota_rombel_lihat', compact('anggota_rombel_walas','implode_rombel'));
    }

    public function getAnggotaRombelPesertaDidik($rombongan_belajar_id){

        $getAnggotaRombel = Anggota_rombel::where('rombongan_belajar_id',$rombongan_belajar_id)->orderBy('peserta_didik_id', 'DESC')->get();
        // dd($getAnggotaRombel);
        return json_encode($getAnggotaRombel);
     }

     public function getKelas($kelas_id){

        $getkelas = Rombongan_belajar::where('kelas_id',$kelas_id)->orderBy('kelas_id', 'DESC')->get();
        // dd($getAnggotaRombel);
        return json_encode($getkelas);
     }

     public function getJurusan($jurusan_id){

        $getjurusan = Rombongan_belajar::where('jurusan_id',$jurusan_id)->orderBy('jurusan_id', 'DESC')->get();
        // dd($getAnggotaRombel);
        return json_encode($getjurusan);
     }

     
}
