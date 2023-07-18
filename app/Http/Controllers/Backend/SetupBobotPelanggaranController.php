<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bobot_pelanggaran;
use App\Imports\ImportBobot_palanggaran;

class SetupBobotPelanggaranController extends Controller
{
    public function lihatBobot_pelanggaran(){
        $bobotPelanggaran = Bobot_pelanggaran::orderBy('id')->get();
        return view('backend.setup.bobot_pelanggaran.lihat_bobot_pelanggaran', compact('bobotPelanggaran'));
    }

    public function simpanBobot_pelanggaran(Request $request){
        $simpanBobot_pelanggaran = Bobot_pelanggaran::insert([
            'nama_pelanggaran' => $request->nama_pelanggaran,
            'bobot' => $request->bobot,
        ]);
        $notification = array(
            'message' => 'Bobot Pelanggaran Berhasil ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('lihat.bobot.pelanggaran')->with($notification);
    }

    public function ImportBobot_pelanggaran(Request $request){

        $notification = array(
                'message' => 'Bobot Pelanggaran Berhasil diimport',
                'alert-type' => 'success'
            );

        $import = Excel::import(new ImportBobot_pelanggaran, $request->file('file')->store('files'));
        //dd($import);
        return redirect()->route('lihat.bobot.pelanggaran')->with($notification);


    }
}
