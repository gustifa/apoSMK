<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\User;
use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class SetupGuruController extends Controller
{
    public function Index(){
        $dataGuru = Guru::latest()->get();
        return view('backend.setup.guru.lihat_guru', compact('dataGuru'));
    }

    public function SimpanGuru(Request $request){
        
        $validatedData = $request->validate([
                'nama' => 'required|unique:guru,nama',
                
            ]);

            $data = new Guru();
            $data->nama = $request->nama;
            $data->nik = $request->nik;
            $data->nuptk = $request->nuptk;
            $data->save();

            $notification = array(
                'message' => 'Guru Berhasil ditambahkan',
                'alert-type' => 'success'
            );

            return redirect()->route('lihat.guru')->with($notification);
        }

        public function TambahGuru(){
            return view('backend.setup.guru.tambah_guru');
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

        foreach($data as $d){
           $new_password = strtolower(Str::random(8));
           $user = User::create([
                        'name' => $d->nama,
                        'user_id' => $d->id,
                        'username' => $new_password,
                        'password' => Hash::make($new_password),
                        'email' => $new_password.'@smkn1kinali.sch.id',
                        'role' => 'guru',
                        'status' => '1',
                    ]);
           
       }

       $notification = array(
                'message' => 'User Guru Berhasil di Generate',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
    
       


    }

    public function LihatUserGuru(){
        $dataGuru = User::where('role','guru')->get();
        return view('backend.setup.guru.lihat_user_guru', compact('dataGuru'));
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
