<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengumuman;
use Carbon\Carbon;

class SettingPengumumanController extends Controller
{
    public function lihatPengumuman(){
        $pengumuman = Pengumuman::all();
        return view('backend.setting.pengumuman.lihat_pengumuman', compact('pengumuman'));
    }

    public function simpanPengumuman(Request $request){

            $dataPengumuman = new Pengumuman();
            $dataPengumuman->judul = $request->judul;
            $dataPengumuman->isi_pengumuman = $request->isi_pengumuman;
            $dataPengumuman->created_at = Carbon::now();
            $dataPengumuman->save();

            $notification = array(
                    'message' => 'Pengumuman Berhasil ditambahkan',
                    'alert-type' => 'success'
                    );

            return redirect()->route('lihat.pengumuman')->with($notification);


    }
}
