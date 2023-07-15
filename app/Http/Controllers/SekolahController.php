<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sekolah;

class SekolahController extends Controller
{
    public function Sekolah(){
        // $idsekolah = Sekolah::select('id')->get();
        $implodeId = Sekolah::select('id')->get()->implode('id');
        $adminData = Sekolah::find($implodeId);
        return view('sekolah.sekolah_view',compact('adminData'));
    }


        public function UpdateSekolah(Request $request){
        $implodeId = Sekolah::select('id')->get()->implode('id');
        $data = Sekolah::find($implodeId);
        $data->nama = $request->nama;
        $data->npsn = $request->npsn;
        $data->nss = $request->nss;
        $data->alamat = $request->alamat;
        $data->desa_kelurahan = $request->desa_kelurahan;
        $data->kecamatan = $request->kecamatan;
        $data->kabupaten = $request->kabupaten;
        $data->provinsi = $request->provinsi;
        $data->website = $request->website;
        $data->kode_pos = $request->kode_pos;
        

        if ($request->file('logo_sekolah')) {
            $file = $request->file('logo_sekolah');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/sekolah_images'),$filename);
            $data['logo_sekolah'] = $filename;
        }

        $notification = array(
            'message' => 'Admin Profile Update Succesfully',
            'alert-type' => 'success',
        );

        $data->save();
        return redirect()->back()->with($notification);



        
    }
}
