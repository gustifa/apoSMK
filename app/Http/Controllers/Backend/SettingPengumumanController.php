<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengumuman;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

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

            
            Alert::success('Pengumuman '.$dataPengumuman->isi_pengumuman, 'Berhasil ditambahkan');

            return redirect()->route('lihat.pengumuman');


    }
}
