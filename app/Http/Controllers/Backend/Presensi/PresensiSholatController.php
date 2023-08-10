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
use App\Models\Peserta_didik;
use Carbon\Carbon;
use DB;

class PresensiSholatController extends Controller
{
    public function LihatPresensiSholat(){
        $time = strtotime(date('H:i'));
        $waktuZuhurMulai = (WaktuSholat::where('nama', 'Zhuhur')->select('waktu_mulai', 'waktu_selesai')->get())->implode('waktu_mulai');
        $waktuZuhurSelesai = (WaktuSholat::where('nama', 'Zhuhur')->select('waktu_mulai', 'waktu_selesai')->get())->implode('waktu_selesai');
        $selectedTimeZuhur = strtotime(date($waktuZuhurMulai));
        $endTimeZuhur = strtotime(date($waktuZuhurSelesai));

        $waktuAsharMulai = (WaktuSholat::where('nama', 'Ashar')->select('waktu_mulai', 'waktu_selesai')->get())->implode('waktu_mulai');
        $waktuAsharSelesai = (WaktuSholat::where('nama', 'Ashar')->select('waktu_mulai', 'waktu_selesai')->get())->implode('waktu_selesai');
        $selectedTimeAshar = strtotime(date($waktuAsharMulai));
        $endTimeAshar = strtotime(date($waktuAsharSelesai));

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
        // $dateNow = date('m-d-Y');
        $dateNow = date('Y-m-d');
        // dd($dateNow);
        // $dataPresensi = PresensiSholat::all();
        $dataPresensi = PresensiSholat::where('presensi', '2')->where('date', $dateNow)->get();
        
        
        $dataPresensiAshar = PresensiSholat::where('presensi', '22')->where('date', $dateNow)->get();

        $create_Presensi = (PresensiSholat::select('created_at')->get())->implode('created_at');
        // dd($create_Presensi);
        return view('guru.presensi.sholat.lihat_presensi_sholat', compact('dataPresensi', 'implode_rombel', 'selectedTimeZuhur', 'endTimeZuhur', 'time', 'selectedTimeAshar', 'endTimeAshar', 'dateNow','waktuZuhurMulai','waktuZuhurSelesai','waktuAsharMulai', 'waktuAsharSelesai', 'dataPresensiAshar'));

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
        /*Awal Waktu*/ 
        $time = strtotime(date('H:i'));
        $waktuZuhurMulai = (WaktuSholat::where('nama', 'Zhuhur')->select('waktu_mulai', 'waktu_selesai')->get())->implode('waktu_mulai');
        $waktuZuhurSelesai = (WaktuSholat::where('nama', 'Zhuhur')->select('waktu_mulai', 'waktu_selesai')->get())->implode('waktu_selesai');
        $selectedTimeZuhur = strtotime(date($waktuZuhurMulai));
        $endTimeZuhur = strtotime(date($waktuZuhurSelesai));

        $waktuAsharMulai = (WaktuSholat::where('nama', 'Ashar')->select('waktu_mulai', 'waktu_selesai')->get())->implode('waktu_mulai');
        $waktuAsharSelesai = (WaktuSholat::where('nama', 'Ashar')->select('waktu_mulai', 'waktu_selesai')->get())->implode('waktu_selesai');
        $selectedTimeAshar = strtotime(date($waktuAsharMulai));
        $endTimeAshar = strtotime(date($waktuAsharSelesai));

        $peserta_didik = Peserta_didik::all();
        // $cekPesertaDidik = Peserta_didik::where('rfid_')
        $cekrfid_id = $request->rfid_id;
        $dateNow = date('Y-m-d');

        $rfid_idZhuhur = PresensiSholat::where('presensi', '2')->where('rfid_id',$cekrfid_id )->where('date', $dateNow)->first();
        $rfid_idAshar = PresensiSholat::where('presensi', '22')->where('rfid_id',$cekrfid_id )->where('date', $dateNow)->first();
        $tidakZuhur = PresensiSholat::where('presensi', '1')->where('rfid_id',$cekrfid_id )->where('date', $dateNow)->first();
        $tidakAshar = PresensiSholat::where('presensi', '1')->where('rfid_id',$cekrfid_id )->where('date', $dateNow)->first();
        $non = PresensiSholat::where('presensi', '3')->where('rfid_id',$cekrfid_id )->where('date', $dateNow)->first();
        /*Akhir Waktu*/

        $user = Auth::user()->guru_id;
        $rombel = Rombongan_belajar::where('guru_id', $user )->get();
        $implode_rombel = $rombel->implode('rombongan_belajar_id');
        // Anggota Rombel
        $anggota_rombel = Anggota_rombel::where('rombongan_belajar_id',$implode_rombel)->get();
        $countanAgota_rombel = count($anggota_rombel);
        $presensi =$request->presensi;
        if($presensi != NULL){
            $countPresensi = count($presensi);
        }else{
            $countPresensi = NULL;
        }
        
        if($time >= $selectedTimeZuhur && $time <= $endTimeZuhur){
        // dd($countPresensi);
            if(!$rfid_idZhuhur && !$rfid_idAshar && !$tidakZuhur && !$tidakAshar && !$non){
                if($countPresensi != NULL){
                    for ($i=0; $i < $countPresensi; $i++) { 
                        $presensi = new PresensiSholat();
                        $presensi->rfid_id = $request->rfid_id[$i];
                        $presensi->presensi = $request->presensi[$i];
                        $presensi->status = '2';
                        $presensi->date = Carbon::now();
                        $presensi->save();
                    }
                    $notification = array(
                    'message' => 'Presensi Sholat Berhasil ditambahkan',
                    'alert-type' => 'success'
                    );

                    return redirect()->route('lihat.presensi.sholat')->with($notification);
                }else{
                    $notification = array(
                    'message' => 'Gagal Menyimpan Data',
                    'alert-type' => 'error'
                    );

                    return redirect()->route('lihat.presensi.sholat')->with($notification);
                }

                
            }else{
                $notification = array(
                    'message' => 'Sudah Mengambil Presensi',
                    'alert-type' => 'error'
                );

                return redirect()->route('lihat.presensi.sholat')->with($notification);
            }
        }else{
            $notification = array(
                'message' => 'Gagal Menyimpan Presensi, Belum Waktunya',
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
