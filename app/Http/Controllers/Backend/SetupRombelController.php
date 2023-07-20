<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rombel;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Group;
use App\Models\Guru;
use App\Models\userrfid;
use App\Imports\ImportRombongan_belajar;
use App\Models\Rombongan_belajar;
use Maatwebsite\Excel\Facades\Excel;

class SetupRombelController extends Controller
{
    public function LihatRombel(){
        $dataRombel = Rombel::all();
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        $group = Group::all();
        $dataGuru = Guru::all();
        $userRfid = userrfid::all();
        $dataRombongan_belajar = Rombongan_belajar::all();
        return view('backend.setup.rombel.lihat_rombel', compact('dataRombel','kelas', 'jurusan', 'group','dataGuru','userRfid', 'dataRombongan_belajar'));
    }

    public function TambahRombel(){
        $dataKelas = Kelas::all();
        $dataJurusan = Jurusan::all();
        $dataGroup = Group::all();
        $dataGuru = Guru::all();
        $userRfid = userrfid::all();
        return view('backend.setup.rombel.tambah_rombel', compact('dataKelas', 'dataJurusan', 'dataGroup','dataGuru','userRfid'));
    }

    public function SimpanRombel(Request $request){
        
        // $validatedData = $request->validate([
        //         'nama' => 'required|unique:rombel,nama',
                
        //     ]);
        $jurusan = $request->jurusan_id;
        $kelas = $request->kelas_id;
        $group = $request->group_id;
        $walas = $request->guru_id;
        $namaRombel = $request->nama;
        // dd($namaRombel);

            $data = new Rombongan_belajar();
            $data->nama = $namaRombel;
            $data->jurusan_id = $jurusan;
            $data->kelas_id = $kelas;
            $data->group_id = $group;
            $data->guru_id = $walas;
            $data->save();

            $notification = array(
                'message' => 'Rombel Berhasil ditambahkan',
                'alert-type' => 'success'
            );

            return redirect()->route('lihat.rombel')->with($notification);
        }

        public function EditRombel($id){
            $editRombel = Rombel::find($id);
            return view('backend.setup.rombel.edit_rombel', compact('editRombel'));
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

    public function ImportRombel(Request $request){

        $notification = array(
                'message' => 'Rombongan Belajar Berhasil diimport',
                'alert-type' => 'success'
            );

        $import = Excel::import(new ImportRombongan_belajar, $request->file('file')->store('files'));
        //dd($import);
        return redirect()->route('lihat.rombel')->with($notification);


    }

    

    
}
