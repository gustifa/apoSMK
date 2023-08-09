<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Guru;
use App\Models\User;
use App\Models\Agama;
use App\Models\userrfid;
use App\Models\Peserta_didik;
use App\DataTables\GuruDataTable;
use App\Imports\ImportGuru;
use DB;

class SetupGuruController extends Controller
{
    public function Index(GuruDataTable $dataTable){
        // $dataGuru = Guru::latest()->get();
        // return view('backend.setup.guru.lihat_guru', compact('dataGuru'));
        return $dataTable->render('backend.setup.guru.lihat_guru');
    }

    public function SimpanGuru(Request $request){
        
        $validatedData = $request->validate([
                'nama' => 'required|unique:guru,nama',
                
            ]);

            $data = new Guru();
            $data->nama = $request->nama;
            $data->nik = $request->nik;
            $data->nuptk = $request->nuptk;
            $data->email = $request->email;
            $data->tanggal_lahir = $request->tanggal_lahir;
            $data->tempat_lahir = $request->tempat_lahir;
            $data->jenis_kelamin = $request->jenis_kelamin;
            $data->agama_id = $request->agama_id;
            $data->save();

            $notification = array(
                'message' => 'Data Guru Berhasil ditambahkan',
                'alert-type' => 'success'
            );

            return redirect()->route('lihat.guru')->with($notification);
        }

        public function TambahGuru(){
            $agama = Agama::all();
            return view('backend.setup.guru.tambah_guru', compact('agama'));
        }

        public function EditGuru($id){
            $editAgama = Guru::find($id);
            return view('backend.setup.agama.edit_guru', compact('editGuru'));
        }

        public function UpdateGuru(Request $request, $id){
           $data = Guru::find($id);
     
            $validatedData = $request->validate([
            'nama' => 'required|unique:guru,nama,'.$data->id
            
            ]);

        
            $data->nama = $request->nama;
            $data->save();

            $notification = array(
                'message' => 'Guru Berhasil diperbaharui',
                'alert-type' => 'success'
            );

            return redirect()->route('lihat.agama')->with($notification);
        }

        public function HapusGuru($id){
            $agama = Guru::find($id);
            $agama->delete();

            $notification = array(
                'message' => 'Guru Berhasil dihapus',
                'alert-type' => 'info'
            );

            return redirect()->route('lihat.guru')->with($notification);

        }

        public function template_excel_guru(){
        $path = public_path('/file/excel/import/import_template/template_excel_guru.xlsx');
        $name = basename($path);
        $headers = ["Content-Type:   application/vnd.ms-excel; charset=utf-8"];
        return response()->download($path, $name, $headers);
    }

    public function AllDeleteGuru(){

        $delete = DB::table('guru')->delete();
        if($delete){
            $notification = array(
                'message' => 'Table Guru Berhasil dikosongkan',
                'alert-type' => 'success'
            );
            return redirect()->route('lihat.guru')->with($notification);

        }else{
            $notification = array(
                'message' => 'Table Guru Gagal dihapus',
                'alert-type' => 'error'
            );
            return redirect()->route('lihat.guru')->with($notification);
        }
    }

    public function GuruGenerate(Request $request){
       $data = Guru::all();
       $cek_email = Guru::select('email')->get();
       $implode_email = $cek_email->implode('email');
       $email_user = User::select('email')->get();
       // dd($email_user);

       $user = User::all();
       $countGuru = count($data);
       $countuser = Count($user);
       for ($i=$countuser; $i <= $countGuru ; $i++) { 
           
       }

       $id_guru =  $i; 

       
       // dd($id_guru);
       // dd($countuser);
       if($implode_email == !NULL){

        foreach($data as $d){
           $new_password = strtolower(Str::random(8));
           $user = User::create([
                        // 'id' => $countuser++, 
                        'name' => $d->nama,
                        'guru_id' => $d->guru_id,
                        'username' => $d->email,
                        'password' => Hash::make('12345678'),
                        'email' => $d->email,
                        'role' => 'guru',
                        'status' => 'active',
                    ]);
           
       }

       $notification = array(
                'message' => 'User Guru Berhasil di Generate',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

       }else{
        foreach($data as $d){
           $new_password = strtolower(Str::random(8));
           $user = User::create([
                        'name' => $d->nama,
                        'guru_id' => $d->guru_id,
                        'username' => $new_password,
                        'password' => Hash::make($new_password),
                        'email' => $new_password.'@smkn1kinali.sch.id',
                        'role' => 'guru',
                        'status' => 'active',
                    ]);
           
       }

       $notification = array(
                'message' => 'User Guru Berhasil di Generate',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
    
       }
        
       


    }

    public function SiswaGenerate(Request $request){
       $data = Peserta_didik::all();
       $id = Peserta_didik::select('peserta_didik_id')->get();

        foreach($data as $d){
           $new_password = strtolower(Str::random(8));
           $user = User::create([
                        'name' => $d->nama,
                        'siswa_id' => $d->id,
                        'username' => $new_password,
                        'password' => '12345678',
                        'email' => $new_password.'@smkn1kinali.sch.id',
                        'role' => 'siswa',
                        'status' => 'active',
                    ]);
           
       }

       $notification = array(
                'message' => 'User Siswa Berhasil di Generate',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        
       


    }


    public function importGuru(Request $request){
        $notification = array(
                'message' => 'Guru Berhasil diimport',
                'alert-type' => 'success'
            );

        Excel::import(new ImportGuru, $request->file('file')->store('files'));
        return redirect()->route('lihat.guru')->with($notification);


    }

    public function LihatUserGuru(){
        $dataGuru = User::where('role','guru')->get();
        return view('backend.setup.guru.lihat_user_guru', compact('dataGuru'));
    }

    public function LihatUserSiswa(){
        $dataGuru = User::where('role','siswa')->get();
        return view('backend.setup.guru.lihat_user_siswa', compact('dataGuru'));
    }

    public function HapusUserGuru($id){
        $user = User::find($id);
            $user->delete();

            $notification = array(
                'message' => 'User '.$user->name.' Berhasil dihapus',
                'alert-type' => 'info'
            );

            return redirect()->route('lihat.user.guru')->with($notification);
    }


}
