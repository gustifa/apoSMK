<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserRfid;
use App\Models\Presensi;
use App\Models\tblsholat;
use App\Models\Guru;
use App\Models\Rombel;
//use App\Models\User;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    public function GuruDashboard(){
         // $adminData = User::all();
         $user = Auth::user()->user_id;
         $guruData = User::where('role','guru')->where('user_id', $user)->get();
       
         $dataPresensi = Presensi::all();
         $dataUserRfid = Rombel::all();
         // dd($dataUserRfid);
         $presensiData = Presensi::all();
         $tabelsholat = tblsholat::all();

        return view('guru.index',compact('guruData', 'presensiData','tabelsholat','dataUserRfid','dataPresensi'));
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
