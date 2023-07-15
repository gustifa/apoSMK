<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PresensiSholat;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Group;
use App\Models\userrfid;


class SettingMapingController extends Controller
{
    public function settingMapingPembelajaran(){
        $dataPresensi = PresensiSholat::all();
        $jurusan = Jurusan::latest()->get();
        $kelas = Kelas::latest()->get();
        $group = Group::latest()->get();
        $userRfid = UserRfid::latest()->get();
        return view('backend.setting.setting_maping_pembelajaran',compact('dataPresensi', 'jurusan', 'kelas', 'group', 'userRfid') );
    }

    public function settingMapingPembelajaranSimpan(Request $request){
        $kelas = $request->kelas;
        $jurusan = $request->jurusan;
        $group = $request->group;

        $getPresensi = userrfid::where('Kelas',$kelas )->where('Jurusan', $jurusan)->where('Group', $group)->latest()->get();
        dd($getPresensi);
    }

    public function getKelasMaping($id){
        $getKelas = userrfid::where('Kelas', $id)->get();
        return response()->json($getKelas);
    }
}
