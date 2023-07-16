<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserRfid;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Group;
use App\Models\Peserta_didik;
use App\Imports\ImportPeserta_didik;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class SetupPeserta_didikController extends Controller
{
    public function lihatPeserta_didik(){
        $dataRfid = Peserta_didik::latest()->get();
        return view('backend.setup.peserta_didik.lihat_peserta_didik', compact('dataRfid'));
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