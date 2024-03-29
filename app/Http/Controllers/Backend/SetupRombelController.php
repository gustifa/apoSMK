<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Rombel;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Group;
use App\Models\Guru;
use App\Models\userrfid;
use App\Imports\ImportRombongan_belajar;
use App\Models\Rombongan_belajar;
use App\Models\Anggota_rombel;

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
        // $totalrombel = Rombongan_belajar::find('10 TJKT1');
        // $total = count($totalrombel);
        // dd($total);
        // $rombel_1 = Rombongan_belajar::select('nama')->where('nama', '10 TJKT1')->get();
        // dd( $rombel_1);
        // $kelas_id = Kelas::find();
        // $anggotaRombel = Anggota_rombel::find($rombel_1);
        // $countanggotaRombel;
        // $countRombel = count(Rombongan_belajar::where('nama', '10 TJKT1')->get());
        // dd(count($anggotaRombel));
        

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
        
    //    $request->validate([
    //             'nama' => 'required|unique:rombongan_belajar,nama',
    //             'guru_id' => 'required|unique:rombongan_belajar,guru_id',
                
    //         ]);
        $jurusan = $request->jurusan_id;
        $kelas = $request->kelas_id;
        $group = $request->group_id;
        $nama_kelas = $request->nama_kelas;
        $kode_jurusan = $request->kode_jurusan;
        $nama_group = $request->nama_group;
        $nama = $nama_kelas. ' '.$kode_jurusan.$nama_group; 
        $walas = $request->guru_id;

        $nama_rombel = Rombongan_belajar::where('nama',$nama )->first();
        $walas = Rombongan_belajar::where('guru_id',$walas )->first();
        // dd($nama_rombel);
        
        // $namaRombel = $request->nama;
        
        // dd($namaRombel);
                if(!$nama_rombel){
                    if(!$walas){
                        $data = new Rombongan_belajar();
                        // $data->nama =  $nama_kelas;
                        $data->jurusan_id = $jurusan;
                        $data->kelas_id = $kelas;
                        $data->group_id = $group;
                        $data->guru_id = $request->guru_id;
                        $data->nama = $nama_kelas. ' '.$kode_jurusan.$nama_group;
                        $data->save();

                       
                            Alert::success('Rombel '.$data->nama. ' & Walas '.$data->walas->nama , 'Berhasil ditambahkan');
                    

                        return redirect()->route('lihat.rombel');
                    }else{
                        Alert::error('Walas Sudah Ada', 'Gagal disimpan');
                        return redirect()->route('lihat.rombel');
                    }
                }else{
                    Alert::error('Rombel Sudah Ada', 'Gagal disimpan');
                    return redirect()->route('lihat.rombel');
                }
            
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


    public function getKelasAjax($kelas_id){
    $getkelas = Kelas::where('id', $kelas_id)->orderBy('id', 'DESC')->get();
        // dd($getkelas);
    return json_encode($getkelas);
    }

    public function getJurusanAjax($jurusan_id){
    $getjurusan = Jurusan::where('id', $jurusan_id)->orderBy('id', 'DESC')->get();
        // dd($getkelas);
    return json_encode($getjurusan);
    }

    public function getGroupAjax($group_id){
    $getgroup = Group::where('id', $group_id)->orderBy('id', 'DESC')->get();
        // dd($getkelas);
    return json_encode($getgroup);
    }

    public function getGuruAjax($guru_id){
    $getguru = Guru::where('guru_id', $guru_id)->get();
        // dd($getguru);
    return json_encode($getguru);
    }

        

    

    
}
