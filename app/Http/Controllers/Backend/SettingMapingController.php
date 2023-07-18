<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PresensiSholat;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Group;
use App\Models\userrfid;
use App\Imports\ImportAnggota_rombel;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Anggota_rombel;


class SettingMapingController extends Controller
{
    public function settingMapingPembelajaran(){
        $dataPresensi = PresensiSholat::all();
        $jurusan = Jurusan::latest()->get();
        $kelas = Kelas::latest()->get();
        $group = Group::latest()->get();
        $dataRfid = Anggota_rombel::latest()->get();
        return view('backend.setting.setting_maping_pembelajaran',compact('dataPresensi', 'jurusan', 'kelas', 'group', 'dataRfid') );
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

    public function ImportAnggota_rombel(Request $request){

        $notification = array(
                'message' => 'Anggota Rombel Berhasil diimport',
                'alert-type' => 'success'
            );

        $import = Excel::import(new ImportAnggota_rombel, $request->file('file')->store('files'));
        //dd($import);
        return redirect()->route('setting.maping.pembelajaran')->with($notification);


    }

    
}
