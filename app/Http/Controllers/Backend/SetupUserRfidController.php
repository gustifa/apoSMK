<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserRfid;
use App\Models\UserRfidSiswa;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Group;
use App\Models\Peserta_didik;
use App\Models\Rombongan_belajar;
use App\Models\Anggota_rombel;
use DB;

class SetupUserRfidController extends Controller
{
    public function Index(){
        // $rfid_id = UserRfidSiswa::
        // $dataRombel[] = Anggota_rombel::select('peserta_didik_id')->get();;
        // dd($dataRombel);
        $dataRfid = Peserta_didik::select('rfid_id','nama')->get();
        // $hitungRfid = count($dataRombel[]);



        //$dataRfid = UserRfid::all();
        return view('backend.setup.user_rfid.view_user_rfid', compact('dataRfid'));
    }

    
    public function getrfid($rfid_id){

        $getrfid = UserRfidSiswa::all();
        // dd($getAnggotaRombel);
        return json_encode($getrfid);
     }

    public function DownloadTemplateUserRfid()
    {
        $path = public_path('/file/excel/template/template_user_rfid.xlsx');
        $name = basename($path);
        $headers = ["Content-Type:   application/vnd.ms-excel; charset=utf-8"];
        return response()->download($path, $name, $headers);
    }

    public function AllDeleteUserRfid(){

        $delete = DB::table('user')->delete();
        if($delete){
            $notification = array(
                'message' => 'Table RFID Berhasil dihapus',
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

    public function UserRfidDelete($id){

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

    public function UserRfidEdit($id){
        $userRfid = UserRfid::find($id);
        $jurusan = Jurusan::latest()->get();
        $kelas = Kelas::latest()->get();
        $group = Group::latest()->get();

        return view('backend.setup.user_rfid.edit_user_rfid', compact('userRfid', 'jurusan', 'kelas', 'group'));
    }

    public function UserRfidUpdate(Request $request){
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

            return redirect()->route('lihat.user')->with($notification);
        }

}
