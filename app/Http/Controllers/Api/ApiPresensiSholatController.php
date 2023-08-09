<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PresensiSholat;
use App\Models\WaktuSholat;
use App\Models\Peserta_didik;
use Carbon\Carbon;
class ApiPresensiSholatController extends Controller
{
     public function lihatPresensiSholat(){

        $presensiSholat = PresensiSholat::all();
            return response()->json($presensiSholat);

    }

    public function simpanPresensiSholat(Request $request){
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
        // $dateNow = date('m-d-Y');
        $dateNow = date('Y-m-d');
        $dateStart = date('Y-m-d 00:01');
        $dateEnd = date('Y-m-d '.$waktuAsharMulai);
        // $dateNow = date(now());
        $cekrfid_id = $request->rfid_id;

        $rfid_idZhuhur = PresensiSholat::where('presensi', '2')->where('rfid_id',$cekrfid_id )->where('date', $dateNow)->first();
        $rfid_idAshar = PresensiSholat::where('presensi', '22')->where('rfid_id',$cekrfid_id )->where('date', $dateNow)->first();
        
        // dd($data);
        
        

        if($time >= $selectedTimeZuhur && $time <= $endTimeZuhur){
            if(!$rfid_idZhuhur){
                $data = new PresensiSholat();
                $data->rfid_id = $request->rfid_id;
                $data->presensi = '2';
                // $data->presensi = $request->presensi;
                $data->date = Carbon::now();
                $data->save();
                return response()->json([
                    "message" => "Presensi Sholat Zhuhur Berhasil ditambahkan"
                ], 201);  
            }else{
                return response()->json([
                    "message" => "Sudah Mengambil Presensi Sholat Zhuhur"
                ], 201); 
            }
            
        }elseif($time >= $selectedTimeAshar && $time <= $endTimeAshar){
            if(!$rfid_idAshar){
                $data = new PresensiSholat();
                $data->rfid_id = $request->rfid_id;
                $data->presensi = '22';
                $data->date = Carbon::now();
                // $data->created_at = Carbon::now();
                $data->save();
                return response()->json([
                    "message" => "Presensi Sholat Ashar Berhasil ditambahkan"
                ], 201); 
            }else{
                return response()->json([
                    "message" => "Sudah Mengambil Presensi Sholat Ashar"
                ], 201); 
            }
             
        }else{
            return response()->json([
                "message" => "Belum Jadwal Sholat"
            ], 201);
    }
       
        
    }
}
