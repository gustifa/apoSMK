<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TahunAjaran;

class SetupTahunAjaranController extends Controller
{
    public function LihatTahunAjaran(){
    $dataTahunAjaran = TahunAjaran::all();
    return view('backend.setup.tahun_ajaran.lihat_tahunajaran', compact('dataTahunAjaran'));
   }

   public function TahunPelajaranTambah(){
    return view('backend.setup.tahun_ajaran.tambah_tahun_ajaran');
   }

   public function TahunPelajaranSimpan(Request $request){
        
        $validatedData = $request->validate([
                'nama' => 'required|unique:tahun_ajaran,nama',
                
            ]);

            $data = new TahunAjaran();
            $data->nama = $request->nama;
            $data->save();

            $notification = array(
                'message' => 'Tahun Pelajaran Berhasil ditambahkan',
                'alert-type' => 'success'
            );

            return redirect()->route('lihat.tahunajaran')->with($notification);
        }
    public function TahunPelajaranHapus($id){
    $hapusTA = TahunAjaran::find($id)->delete();
         $notification = array(
                'message' => 'Tahun Pelajaran Berhasil dihapus',
                'alert-type' => 'success'
            );
    return redirect()->route('lihat.tahunajaran')->with($notification);

    }
}
