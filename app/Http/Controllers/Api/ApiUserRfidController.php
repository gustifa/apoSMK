<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\userrfidsiswa;

class ApiUserRfidController extends Controller
{
    public function lihatUserRFid(){

        $userRfid = userrfidsiswa::all();
            return response()->json($userRfid);

    }

    public function simpanUserRFid(Request $request){
        $data = new userrfidsiswa();
        $data->rfid_id = $request->rfid_id;
        // $data->created_at = Carbon::now();
        $data->save();

        return response()->json([
            "message" => "RFID Berhasil ditambahkan"
        ], 201);
    }
}
