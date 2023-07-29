<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rombongan_belajar;
use App\Models\Anggota_rombel;
use App\Models\Bobot_pelanggaran;
use App\Models\Kasus_pelanggaran;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Group;

class BobotPelanggaranController extends Controller
{
    public function lihatBobotPelanggaranSiswa(){
        $user = Auth::user()->guru_id;
        $walas = Rombongan_belajar::where('guru_id', $user )->get();
        $implode_rombel = $walas->implode('rombongan_belajar_id');
        if($implode_rombel == !NULL){
            $anggota_rombel_walas = Anggota_rombel::where('rombongan_belajar_id', $implode_rombel)->get();
        }else{
            $anggota_rombel_walas = Anggota_rombel::all();
        }
         // Bobot Pelanggaran
         $kasusPelanggaran = Kasus_pelanggaran::all();
         $bobotPelanggaran = Bobot_pelanggaran::all();
        return view('guru.bobot_pelanggaran.lihat_bobot_pelanggaran', compact('kasusPelanggaran','bobotPelanggaran','implode_rombel', 'anggota_rombel_walas'));
    }


    public function tambahBobotPelanggaranSiswa(){
        
        $anggota_rombel_walas = rombongan_belajar::all();
        $kelas = Kelas::all();
         $kasusPelanggaran = Kasus_pelanggaran::all();
         $bobotPelanggaran = Bobot_pelanggaran::all();
        return view('guru.bobot_pelanggaran.tambah_bobot_pelanggaran', compact('kasusPelanggaran','bobotPelanggaran', 'anggota_rombel_walas','kelas'));
    }
}
