<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WaktuSholat;
use Alert;

class SetupWaktuSholatController extends Controller
{
    public function lihatWaktuSholat(){
        $waktuSholat = WaktuSholat::orderBy('id')->get();
        return view('backend.setup.waktu_sholat.lihat_waktu_sholat', compact('waktuSholat'));
    }

    public function simpanWaktuSholat(Request $request){
        $simpanWaktuSholat = WaktuSholat::insert([
            'nama' => $request->nama,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
        ]);
        Alert::success('Waktu Sholat ', 'Berhasil ditambahkan');
        return redirect()->route('lihat.waktu.sholat');
    }

    public function editWaktuSholat($id){
        $WaktuSholat = WaktuSholat::find($id);
       return view('backend.setup.waktu_sholat.edit_waktu_sholat', compact('WaktuSholat'));
    }

    public function updateWaktuSholat(Request $request){
            $id = $request->id;
            $data = WaktuSholat::find($id);
            //dd($data);
            
            $data->waktu_mulai = $request->waktu_mulai;
            $data->waktu_selesai = $request->waktu_selesai;
            $data->save();

            Alert::success('Waktu Sholat ', 'Berhasil diperbaharui');


            return redirect()->route('lihat.waktu.sholat');
        }


    public function hapusWaktuSholat($id){
        $hapusWaktuSholat = WaktuSholat::findOrFail($id)->delete();
        // $hapusWaktuSholat->delete();
        $notification = array(
            'message' => 'Waktu Sholat dihapus',
            'alert-type' => 'warning'
        );

         return redirect()->route('lihat.waktu.sholat')->with($notification);
    }
}
