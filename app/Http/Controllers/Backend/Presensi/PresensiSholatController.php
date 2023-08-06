<?php

namespace App\Http\Controllers\Backend\Presensi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\tblsholat;
use App\Models\userrfid;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Group;
use App\Models\PresensiSholat;
use App\Models\Rombongan_belajar;
use App\Models\Anggota_rombel;
use App\Models\User;
use App\Models\WaktuSholat;
use Carbon\Carbon;
use DB;

class PresensiSholatController extends Controller
{
    public function LihatPresensiSholat(){
        $time = strtotime(date('H:i'));
        $hari = strtotime(date('Y-m-d H:i'));
        $now_awal = date('Y-m-d 1:01');
        // dd($now);
        $waktuZuhurMulai = (WaktuSholat::where('nama', 'Zhuhur')->select('waktu_mulai', 'waktu_selesai')->get())->implode('waktu_mulai');
        $waktuZuhurSelesai = (WaktuSholat::where('nama', 'Zhuhur')->select('waktu_mulai', 'waktu_selesai')->get())->implode('waktu_selesai');
        $selectedTimeZuhur = strtotime(date($waktuZuhurMulai));
        $endTimeZuhur = strtotime(date($waktuZuhurSelesai));

        $user = Auth::user()->guru_id;
        $walas = Rombongan_belajar::where('guru_id', $user )->get();
        $implode_rombel = $walas->implode('rombongan_belajar_id');
        //$dateNow = Carbon::now()->toDateTimeString();
        // $dateNow = Carbon::now()->addDay()->toDateTimeString();
        //$dateNow = Carbon::now()->subWeek()->toDateTimeString();
        $jurusan = Jurusan::latest()->get();
        $kelas = Kelas::latest()->get();
        $group = Group::latest()->get();
        $userLoginId = Auth::user()->id;
        // $userRfId = DB::table('user')->select('Walas_id')->where('Walas_id', $userLoginId)->get();
        // dd($userLoginId);
        $dataPresensi = PresensiSholat::all();
        $create_Presensi = (PresensiSholat::select('created_at')->get())->implode('created_at');
        // dd($create_Presensi);
        return view('guru.presensi.sholat.lihat_presensi_sholat', compact('dataPresensi', 'implode_rombel', 'selectedTimeZuhur', 'endTimeZuhur', 'time' ));

    }

    public function TambahPresensiSholat(){
        $user = Auth::user()->guru_id;
        $rombel = Rombongan_belajar::where('guru_id', $user )->get();
        $implode_rombel = $rombel->implode('rombongan_belajar_id');
        if($implode_rombel == !NULL){
            $anggota_rombel = Anggota_rombel::where('rombongan_belajar_id', $implode_rombel)->get();
        }else{
             $anggota_rombel = Anggota_rombel::all();
        }
        
        $rombel = Rombongan_belajar::latest()->get();
        $date_now = date('d-m-Y H:i');

        $time = strtotime(date('H:i'));
        $awalSholat = strtotime('2017--10 10:05:25');
        $selesaiSholat = strtotime('2017-08-10 11:05:25');
        $diff = $awalSholat - $selesaiSholat;
        $jam   = floor($diff / (60 * 60));
        $menit = $diff - ( $jam * (60 * 60) );
        $jadwal_sholat = date('d-m-Y 12:01:00');

        $time1 = '10:20';
        $time2 = '12:40';

        $time1_unix = strtotime(date('Y-m-d').' '.$time1.':00');
        $time2_unix = strtotime(date('Y-m-d').' '.$time2.':00');

        $begin_day_unix = strtotime(date('Y-m-d').' 00:00:00');

        $jumlah_time = date('H:i', ($time1_unix + ($time2_unix - $begin_day_unix)));

        // $selectedTime = $_REQUEST['time'];
        $waktuZuhurMulai = (WaktuSholat::where('nama', 'Zhuhur')->select('waktu_mulai', 'waktu_selesai')->get())->implode('waktu_mulai');
        $waktuZuhurSelesai = (WaktuSholat::where('nama', 'Zhuhur')->select('waktu_mulai', 'waktu_selesai')->get())->implode('waktu_selesai');
        $selectedTimeZuhur = strtotime(date($waktuZuhurMulai));
        $endTimeZuhur = strtotime(date($waktuZuhurSelesai));
        $selectedTimeAshar = strtotime(date('d-m-Y 15:30:00'));
        $endTimeAshar = strtotime(date('d-m-Y 16:00:00'));

        // $endTime = strtotime("+45 minutes", strtotime($selectedTime));
        // $oktime =  date('h:i:s', $endTime);


        // dd($endTimeZuhur);

        return view('guru.presensi.sholat.tambah_presensi_sholat', compact('rombel', 'anggota_rombel', 'date_now', 'time', 'selectedTimeZuhur', 'endTimeZuhur', 'selectedTimeAshar', 'endTimeAshar','implode_rombel'));
    }

    public function SimpanPresensiSholatManual(Request $request){
        $user = Auth::user()->guru_id;
        $rombel = Rombongan_belajar::where('guru_id', $user )->get();
        $implode_rombel = $rombel->implode('rombongan_belajar_id');
        $implode_peserta_didik = $rombel->implode('peserta_didik_id'); 
        $peserta_didik_id = $request->peserta_didik_id;
        $presensi = $request->presensi;
        // dd($peserta_didik_id && $presensi);
        if ($peserta_didik_id && $presensi == true){
        foreach ($presensi as $key => $presensi_sholat) {
            $data = new PresensiSholat();
            // $data->rfid_id = $request->peserta_didik_id;
            $data->presensi = $presensi_sholat;
            $data->save();
        }
            $notification = array(
                'message' => 'Presensi Sholat Berhasil ditambahkan',
                'alert-type' => 'success'
            );

            return redirect()->route('lihat.presensi.sholat')->with($notification);
    }else{
        $notification = array(
                'message' => 'Presensi Gagal ditambahkan',
                'alert-type' => 'error'
            );

            return redirect()->route('lihat.presensi.sholat')->with($notification);
    }
    }

    public function SimpanPresensiSholat(Request $request){
        $data = new PresensiSholat();
            $data->rfid_id = $request->rfid_id;
            $data->presensi = $request->presensi;
            $data->save();
            // $data = PresensiSholat::insert([
            //             'siswa_id' => $request->siswa_id,
            //             'presensi' => $request->presensi,

            //         ]);
// dd($data);
            $notification = array(
                'message' => 'Presensi Sholat Berhasil ditambahkan',
                'alert-type' => 'success'
            );

            return redirect()->route('lihat.presensi.sholat')->with($notification);
    }
}
