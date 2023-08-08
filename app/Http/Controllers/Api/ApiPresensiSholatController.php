<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PresensiSholat;
use App\Models\WaktuSholat;
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

        if($time >= $selectedTimeZuhur && $time <= $endTimeZuhur){
        
        $data = new PresensiSholat();
        $data->rfid_id = $request->rfid_id;
        $data->presensi = $request->presensi;
        // $data->created_at = Carbon::now();
        $data->save();
        return response()->json([
            "message" => "Presensi Sholat Berhasil ditambahkan"
        ], 201);  
    }else{
        return response()->json([
            "message" => "Tidak Jadwal Sholat"
        ], 201);
    }
       
        
    }
}
