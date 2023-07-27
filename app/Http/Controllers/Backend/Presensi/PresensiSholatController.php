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
use Carbon\Carbon;
use DB;

class PresensiSholatController extends Controller
{
    public function LihatPresensiSholat(){
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
        
        //dd($dateNow);
        return view('backend.presensi.sholat.lihat_presensi_sholat', compact('dataPresensi'));

    }

    public function TambahPresensiSholat(){
        $user = Auth::user()->guru_id;
        $rombel = Rombongan_belajar::where('guru_id', $user )->get();
        $implode_rombel = $rombel->implode('rombongan_belajar_id');
        $anggota_rombel = Anggota_rombel::where('rombongan_belajar_id', $implode_rombel)->get();

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
        $selectedTimeZuhur = strtotime(date('d-m-Y 12:12:00'));
        $endTimeZuhur = strtotime(date('d-m-Y 12:51:00'));
        $selectedTimeAshar = strtotime(date('d-m-Y 15:30:00'));
        $endTimeAshar = strtotime(date('d-m-Y 16:00:00'));

        // $endTime = strtotime("+45 minutes", strtotime($selectedTime));
        // $oktime =  date('h:i:s', $endTime);


        // dd($oktime);

        return view('backend.presensi.sholat.tambah_presensi_sholat', compact('rombel', 'anggota_rombel', 'date_now', 'time', 'selectedTimeZuhur', 'endTimeZuhur', 'selectedTimeAshar', 'endTimeAshar'));
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
