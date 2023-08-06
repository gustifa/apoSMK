<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PresensiSholat;
class ApiPresensiSholatController extends Controller
{
     public function lihatPresensiSholat(){

        $presensiSholat = PresensiSholat::all();
            return response()->json($presensiSholat);

    }

    public function simpanPresensiSholat(Request $request){
        $data = new PresensiSholat();
        $data->rfid_id = $request->rfid_id;
        $data->presensi = $request->presensi;
        // $data->created_at = Carbon::now();
        $data->save();

        return response()->json([
            "message" => "Presensi Sholat Berhasil ditambahkan"
        ], 201);
    }
}
