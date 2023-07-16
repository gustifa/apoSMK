<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Guru;
use App\Models\Presensi;
use App\Models\tblsholat;
use App\Models\Sekolah;
use App\Models\Peserta_didik;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function AdminDashboard(){
         // $adminData = User::all();
         $adminData = User::all();
         // dd($adminData);
         $dataPeserta_didik = Peserta_didik::all();
         $dataGuru = Guru::all();

         $sek = Sekolah::select('sekolah_id')->get();
         $implodeSek = $sek->implode('sekolah_id');
         $sekolah = Sekolah::find($implodeSek);
         //dd($implodeSek);

        return view('admin.index',compact('adminData', 'dataPeserta_didik','dataGuru','sekolah'));
    }

    public function AdminDestroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function AdminLogin(){
        return view('admin.admin_login');
    }


    public function AdminProfile(){
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_view',compact('adminData'));
    }

    public function AdminProfileStore(Request $request){
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
            $file->move(public_path('upload/admin_images'),$filename);
            $data['photo'] = $filename;
        }

        $notification = array(
            'message' => 'Admin Profile Update Succesfully',
            'alert-type' => 'success',
        );

        $data->save();
        return redirect()->back()->with($notification);



        
    }


    public function AdminChangePassword(){
        return view('admin.change_password');
    } //end Method

    public function AdminUpdatePassword(Request $request){
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


    public function genereteUser(){
        // $dataUserRfid = UserRfid::all();
        // $user =  User::create([
        //         'username' => 'fauzan',
        //         'role' => 'siswa',
        //         'password' => Hash::make('password'),
        //     ]);

        // $user = new App\Models\User();
        // $user->password = Hash::make('the-password-of-choice');
        // $user->email = 'the-email@example.com';
        // //$user->name = 'My Name';
        // $user->save();

        return redirect()->route('lihat.user')->with($notification);
    }



}
