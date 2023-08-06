<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Anggota_rombel;
use App\Models\Rombongan_belajar;
// use App\DataTables\Anggota_rombelDataTable;
use Yajra\DataTables\Facades\Datatables;

class SettingAnggotaRombelController extends Controller
{
    // public function LihatAnggotaRombel(Anggota_rombelDataTable $dataTable){
    //     $anggotaRombel = Anggota_rombel::all();
    //     // $rombonganBelajar = Rombongan_belajar::all();
    //     // return view('backend.setup.rombel.anggota_rombel', compact('anggotaRombel', 'rombonganBelajar'));
    //     return $dataTable->render('backend.setup.rombel.anggota_rombel');
    // }

    public function LihatAnggotaRombel(Request $request){
        $anggotaRombel = Anggota_rombel::all();
        $dataRombongan_belajar = Rombongan_belajar::all();
        
        $rombongan_belajar_id = $request->rombongan_belajar_id;
        // dd($rombongan_belajar_id);

        if ($request->ajax()) {
            $data = Anggota_rombel::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('peserta_didik_id', function ($query) {
                    return $query->peserta_didik->nama;
                })

                // ->addColumn('no', function ($query) {
                //     $data = Peserta_didik::all();
                //         return count($data) ;  
                // })

                ->addColumn('rombongan_belajar_id', function ($query) {
                    $kelas = $query->rombongan_belajar->kelas->nama;
                    $jurusan = $query->rombongan_belajar->jurusan->kode;
                    $group = $query->rombongan_belajar->group->nama;
                        return $kelas.' '.$jurusan.''.$group ;  
                })

                ->addColumn('no_induk', function ($query) {
                    $no_induk = $query->peserta_didik->no_induk;
                        return $no_induk;  
                })

                ->addColumn('nisn', function ($query) {
                    $nisn = $query->peserta_didik->nisn;
                        return $nisn;  
                })

                ->addColumn('walas', function ($query) {
                    $walas = $query->rombongan_belajar->walas->nama;
                        return $walas;  
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend.setup.rombel.anggota_rombel', compact('dataRombongan_belajar'));
    }

    public function LihatAnggotaRombelDatatable(Request $request){
        $anggotaRombel = Anggota_rombel::all();
        $dataRombongan_belajar = Rombongan_belajar::all();
        
        $rombongan_belajar_id = $request->rombongan_belajar_id;
        // dd($rombongan_belajar_id);

        if ($request->ajax()) {
            $data = Anggota_rombel::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('peserta_didik_id', function ($query) {
                    return $query->peserta_didik->nama;
                })

                // ->addColumn('no', function ($query) {
                //     $data = Peserta_didik::all();
                //         return count($data) ;  
                // })

                ->addColumn('rombongan_belajar_id', function ($query) {
                    $kelas = $query->rombongan_belajar->kelas->nama;
                    $jurusan = $query->rombongan_belajar->jurusan->kode;
                    $group = $query->rombongan_belajar->group->nama;
                        return $kelas.' '.$jurusan.''.$group ;  
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend.setup.rombel.anggota_rombel', compact('dataRombongan_belajar'));
    }

    public function getRombelPesertaDidik($rombongan_belajar_id){

        $getAnggotaRombel = Anggota_rombel::where('rombongan_belajar_id',$rombongan_belajar_id)->orderBy('peserta_didik_id', 'DESC')->get();
         
        // dd($getAnggotaRombel);
        return json_encode($getAnggotaRombel);
     }
}
