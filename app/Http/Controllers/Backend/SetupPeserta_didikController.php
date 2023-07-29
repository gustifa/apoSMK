<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserRfid;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Group;
use App\Models\Peserta_didik;
use App\Models\Rombongan_belajar;
use App\Models\Anggota_rombel;
use App\Models\userrfidsiswa;
use App\Imports\ImportPeserta_didik;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use Carbon\Carbon;

class SetupPeserta_didikController extends Controller
{
    public function lihatPeserta_didik(){
        $dataPeserta_didik = Peserta_didik::orderBy('updated_at', 'DESC')->latest()->get();
        // $dataRfid_id = Peserta_didik::select('rfid_id')->get(); 
        return view('backend.setup.peserta_didik.lihat_peserta_didik', compact('dataPeserta_didik'));
    }

    public function getPesertaDidik(Request $request){
        // return DataTables::of(Peserta_didik::query())->make(true);
        if ($request->ajax()) {
            $data = Peserta_didik::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function EditPeserta_didik($peserta_didik_id){
        $dataPeserta_didik = Peserta_didik::find($peserta_didik_id);
        $jurusan = Jurusan::all();
        $kelas = Kelas::all();
        $group = Group::all();
        // $rfid_id = Peserta_didik::select('rfid_id')->get();
        // $userrfid = userrfidsiswa::select('rfid_id')->get();
        $userrfidsiswa = userrfidsiswa::select('rfid_id')->orderBy('created_at', 'DESC')->limit(1)->latest()->get();
        $implodeRfid = $userrfidsiswa->implode('rfid_id');
        // dd($implodeRfid);
        $dataRombongan_belajar = Rombongan_belajar::all();
        return view('backend.setup.peserta_didik.edit_peserta_didik', compact('dataPeserta_didik', 'jurusan', 'kelas', 'group','dataRombongan_belajar', 'implodeRfid'));
        
    }

     public function UpdatePeserta_didik(Request $request){


            $id = $request->peserta_didik_id;
            $peserta_didik = Anggota_rombel::where('peserta_didik_id', $id)->get();
            $dataImplode = $peserta_didik->implode('peserta_didik_id');
            // dd($dataImplode);
            if($id == $dataImplode ){
                Peserta_didik::findOrfail($id)->update([
                    // 'peserta_didik_id' => $request->peserta_didik_id,
                    // 'kelas_id' => $request->kelas_id,
                    // 'jurusan_id' => $request->jurusan_id,
                    // 'group_id' => $request->group_id,
                    'updated_at' => Carbon::now(),
                ]);

                Peserta_didik::findOrfail($id)->update([
                'rfid_id' => $request->rfid_id,
            ]);

                $delete = DB::table('user_rfid')->delete();
            

                $notification = array(
                'message' => 'Update RFID Berhasil',
                'alert-type' => 'success'
            );

            return redirect()->route('lihat.peserta_didik')->with($notification);


            }else{
                $data = new Anggota_rombel();
                $data->peserta_didik_id = $id;
                $data->rombongan_belajar_id = $request->rombongan_belajar_id;
                $data->created_at = Carbon::now();
                $data->save();
            Peserta_didik::findOrfail($id)->update([
                'rfid_id' => $request->rfid_id,
            ]);
             $delete = DB::table('user_rfid')->delete();
            }

            $notification = array(
                'message' => 'USER_RFID Berhasil disimpan',
                'alert-type' => 'success'
            );

            return redirect()->route('lihat.peserta_didik')->with($notification);
        }




    public function DownloadTemplatePeserta_didik()
    {
        $path = public_path('/file/excel/template/template_user_rfid.xlsx');
        $name = basename($path);
        $headers = ["Content-Type:   application/vnd.ms-excel; charset=utf-8"];
        return response()->download($path, $name, $headers);
    }

    public function AllDeletePeserta_didik(){

        $delete = DB::table('peserta_didik')->delete();
        if($delete){
            $notification = array(
                'message' => 'Table Peserta Didik Berhasil dihapus',
                'alert-type' => 'success'
            );
            return redirect()->route('lihat.peserta_didik')->with($notification);

        }else{
            $notification = array(
                'message' => 'Table Peserta Didik Gagal dihapus',
                'alert-type' => 'error'
            );
            return redirect()->route('lihat.peserta_didik')->with($notification);
        }
    }

    public function Peserta_didikDelete($id){

        $delete = UserRfid::findOrFail($id)->delete();
        if($delete){
            $notification = array(
                'message' => 'User id ' .$id. ' Berhasil dihapus',
                'alert-type' => 'success'
            );
            return redirect()->route('lihat.user')->with($notification);

        }else{
            $notification = array(
                'message' => 'Table RFID Gagal dihapus',
                'alert-type' => 'error'
            );
            return redirect()->route('lihat.user')->with($notification);
        }
    }

    public function Peserta_didikEdit($id){
        $userRfid = UserRfid::find($id);
        $jurusan = Jurusan::latest()->get();
        $kelas = Kelas::latest()->get();
        $group = Group::latest()->get();

        return view('backend.setup.user_rfid.edit_user_rfid', compact('userRfid', 'jurusan', 'kelas', 'group'));
    }

    public function Peserta_didikUpdate(Request $request){
            $id = $request->id;
            UserRfid::findOrfail($id)->update([
                'Nama' => $request->Nama,
                'Nis' => $request->Nis,
                'Jurusan' => $request->Jurusan,
                'Kelas' => $request->Kelas,
                'Group' => $request->Group,
                'RFID_ID' => $request->RFID_ID,
            ]);

            $notification = array(
                'message' => 'USER_RFID Berhasil diperbaharui',
                'alert-type' => 'success'
            );

            return redirect()->route('lihat.peserta_didik')->with($notification);
        }

    public function ImportPeserta_didik(Request $request){

        $notification = array(
                'message' => 'Peserta Didik Berhasil diimport',
                'alert-type' => 'success'
            );

        $import = Excel::import(new ImportPeserta_didik, $request->file('file')->store('files'));
        //dd($import);
        return redirect()->route('lihat.peserta_didik')->with($notification);


    }
}
