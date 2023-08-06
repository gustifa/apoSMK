<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserRfid;
use App\Models\Presensi;
use App\Models\tblsholat;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Group;
use App\Models\Guru;
use App\Models\Rombel;
use App\Models\Anggota_rombel;
use App\Models\PresensiSholat;
use App\Models\Rombongan_belajar;
use App\Models\Peserta_didik;
use App\Models\Pengumuman;
//use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DB;

class GuruController extends Controller
{
    public function GuruDashboard(){
         $user = Auth::user()->guru_id;
         $dataRombongan_belajar_all = Rombongan_belajar::all();
         $implode = Rombongan_belajar::where('guru_id', $user)->get();
         $id_rombelImplode = $implode->implode('rombongan_belajar_id');
         $dataRombongan_belajar = $implode->implode('nama'); 
         if($dataRombongan_belajar == !NULL){
         $countSiswa = count(Anggota_rombel::where('rombongan_belajar_id', $id_rombelImplode)->get());
         }else{
            $countSiswa = count(Peserta_didik::all());
         }
         $countPresensi = PresensiSholat::all();
         $presensiSholat = count($countPresensi );
         $pengAll = Pengumuman::all();
         $implodePengumuman = $pengAll->implode('created_at');
         $implodeupdate = $pengAll->implode('updated_at');
         $pengumuman = Pengumuman::orderBy('created_at', 'ASC')->limit(1)->get();
         $pengumuman_select = Pengumuman::orderBy('id', 'DESC')->limit(1)->get();
         $pengumuman_updated = Pengumuman::orderBy('updated_at', 'DESC')->limit(1)->get();
         


         
        return view('guru.index', compact('dataRombongan_belajar', 'countSiswa', 'dataRombongan_belajar_all', 'pengumuman', 'pengumuman_select', 'implodePengumuman', 'pengumuman_updated', 'implodeupdate', 'countPresensi'));
    }

    public function GuruDestroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function GuruLogin(){
        return view('guru.guru_login');
    }


    public function GuruProfile(){
        $id = Auth::user()->id;
        $guruData = User::find($id);
        return view('guru.guru_profile_view',compact('guruData'));
    }

    public function GuruProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        

        if ($request->file('photo')) {
            $file = $request->file('photo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/guru_images'),$filename);
            $data['photo'] = $filename;
        }

        $notification = array(
            'message' => 'Profile Guru Berhasil diperbaharui',
            'alert-type' => 'success',
        );

        $data->save();
        return redirect()->back()->with($notification);        
    }


    public function GuruChangePassword(){
        return view('guru.ganti_password');
    } //end Method

    public function GuruUpdatePassword(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if (!Hash::check($request->old_password, auth::user()->password)) {
            return back()->with("error", "Old Password Doesn't Mach!!!");
        }
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)

        ]);

        return back()->with("status", "Password Change Susccesfully");

    } //End Method


    public function guruLihatPresensiSholat(){
        // $presensiSolat = tblsholat::all();
        $jurusan = Jurusan::latest()->get();
        $kelas = Kelas::latest()->get();
        $group = Group::latest()->get();
        $userLoginId = Auth::user()->guru_id;
        $userRfId = DB::table('user')->where('Walas_id', $userLoginId)->get();
         // $userPresensiSholat = DB::table('user')->where('Walas_id', $userRfId)->get();
         // dd($userRfId);
        $dataPresensi = PresensiSholat::all();
        return view('guru.presensi.sholat.lihat_presensi_sholat', compact('dataPresensi'));
    }


    


}
