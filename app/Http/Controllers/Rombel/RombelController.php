<?php

namespace App\Http\Controllers\Rombel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rombel;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Group;
use App\Models\Guru;

class RombelController extends Controller
{
    public function LihatRombel(){
    	$dataRombel = Rombel::all();
        $dataKelas = Kelas::all();
        $dataJurusan = Jurusan::all();
        $dataGroup = Group::all();
        $dataGuru = Guru::all();
    	return view('admin.rombel.lihat_rombel', compact('dataRombel','dataKelas', 'dataJurusan', 'dataGroup','dataGuru'));
    }

    public function TambahRombel(){
    	$dataKelas = Kelas::all();
    	$dataJurusan = Jurusan::all();
    	$dataGroup = Group::all();
        $dataGuru = Guru::all();
    	return view('admin.rombel.tambah_rombel', compact('dataKelas', 'dataJurusan', 'dataGroup','dataGuru'));
    }

    public function SimpanRombel(Request $request){
        
        // $validatedData = $request->validate([
        //         'nama' => 'required|unique:rombel,nama',
                
        //     ]);

            $data = new Rombel();
            //$data->nama = $request->nama;
            $data->jurusan_id = $request->jurusan_id;
            $data->kelas_id = $request->kelas_id;
            $data->group_id = $request->group_id;
            $data->guru_id = $request->guru_id;
            $data->save();

            $notification = array(
                'message' => 'Rombel Berhasil ditambahkan',
                'alert-type' => 'success'
            );

            return redirect()->route('lihat.rombel')->with($notification);
        }

        public function EditRombel($id){
            $editRombel = Rombel::find($id);
            return view('admin.agama.edit_rombel', compact('editRombel'));
        }

        public function UpdateRombel(Request $request, $id){
           $data = Rombel::find($id);
     
            $validatedData = $request->validate([
            'nama' => 'required|unique:rombel,nama,'.$data->id
            
            ]);

        
            $data->nama = $request->nama;
            $data->save();

            $notification = array(
                'message' => 'Rombel Berhasil diperbaharui',
                'alert-type' => 'success'
            );

            return redirect()->route('lihat.rombel')->with($notification);
        }

        public function HapusRombel($id){
            $agama = Rombel::find($id);
            $agama->delete();

            $notification = array(
                'message' => 'Rombel Berhasil dihapus',
                'alert-type' => 'info'
            );

            return redirect()->route('lihat.rombel')->with($notification);

        }
}
