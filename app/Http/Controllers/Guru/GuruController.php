<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserRfid;
use App\Models\Presensi;
use App\Models\tblsholat;
//use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class GuruController extends Controller
{
    public function GuruDashboard(){
         // $adminData = User::all();
         $adminData = User::where('role','guru')->get();;
         $dataPresensi = Presensi::all();
         $dataUserRfid = UserRfid::all();
         $presensiData = Presensi::all();
         $tabelsholat = tblsholat::all();

        return view('guru.index',compact('adminData', 'presensiData','tabelsholat','dataUserRfid','dataPresensi'));
    }

    public function GuruDestroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/guru/login');
    }

    public function GuruLogin(){
        return view('guru.guru_login');
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
