<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rombongan_belajar;
use App\Models\Anggota_rombel;
use App\Models\PresensiSholat;
use Yajra\DataTables\Facades\Datatables;
use DB;
use Carbon\Carbon;

class LaporanPresensiSholatController extends Controller
{
    public function laporanAll(){
        $semuaROmbel = Rombongan_belajar::all();
        // $walasRombel = Rombongan_belajar::
        return view('admin.laporan.presensi_sholat.semua_presensi_sholat', compact('semuaROmbel'));
    }

    public function laporanAllAjax(Request $request){
         $rombongan_belajar_id = $request->rombongan_belajar_id;
         if ($rombongan_belajar_id !='') {
            $where[] = ['rombongan_belajar_id','like',$rombongan_belajar_id.'%'];
         }
         
         $allStudent = Anggota_rombel::where($where)->get();
         // dd($allStudent);
         $html['thsource']  = '<th>SL</th>';
         $html['thsource'] .= '<th>ID No</th>';         
         $html['thsource'] .= '<th>Action</th>';


         foreach ($allStudent as $key => $v) {
            $color = 'success';
            $html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['peserta_didik']['nama'].'</td>';
            
            $html[$key]['tdsource'] .='<td>';
            $html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blanks" href="">Fee Slip</a>';
            $html[$key]['tdsource'] .= '</td>';

         }  
        return response()->json(@$html);

    }// end method 

    function fetch_data(Request $request){
     if($request->ajax()){
      if($request->from_date != '' && $request->to_date != ''){
       $data = DB::table('presensi_sholat')
         ->whereBetween('date', array($request->from_date, $request->to_date))
         ->get();
      }else{
       $data = DB::table('presensi_sholat')->orderBy('date', 'desc')->get();
      }
      echo json_encode($data);
     }
    }


    public function laporanPresensiSholat(Request $request){
        if ($request->ajax()) {
            $data = PresensiSholat::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('rfid_id', function ($query) {
                   return $query->peserta_didik->nama;
                })
                

                ->addColumn('date', function ($query) {
                    return $query->date;  
                })
                ->addColumn('created_at', function ($query) {
                    return $query->created_at;  
                })

                // ->addColumn('action', function($row){
                //     $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                //     return $actionBtn;
                // })
                ->addColumn('presensi', function ($query) {
                    if($query->presensi == '2'){
                       return 'Sholat Zhuhur' ;  
                    }else{
                        return 'Sholat Ashar' ;
                    }
                     
                })

                ->filter(function ($instance) use ($request) {
                        if ($request->get('presensi') == '2' || $request->get('presensi') == '22') {
                            $instance->where('presensi', $request->get('presensi'));
                        }
                        if (!empty($request->get('search'))) {
                             $instance->where(function($w) use($request){
                                $search = $request->get('search');
                                $w->orWhere('presensi', 'LIKE', "%$search%")
                                ->orWhere('email', 'LIKE', "%$search%");
                            });
                        }
                    })
                ->rawColumns(['presensi'])

                ->make(true);
        }
        

        return view('admin.laporan.presensi_sholat.semua_presensi_sholat', compact('dataRombongan_belajar'));

        // if ($request->ajax()) {
 
        //     if ($request->input('start_date') && $request->input('end_date')) {
 
        //         $start_date = Carbon::parse($request->input('start_date'));
        //         $end_date = Carbon::parse($request->input('end_date'));
 
        //         if ($end_date->greaterThan($start_date)) {
        //             $students = PresensiSholat::whereBetween('created_at', [$start_date, $end_date])->get();
        //         } else {
        //             $students = PresensiSholat::latest()->get();
        //         }
        //     } else {
        //         $students = PresensiSholat::latest()->get();
        //     }
 
        //     return response()->json([
        //         'students' => $students
        //     ]);
        // } else {
        //     abort(403);
        // }
    }

    public function laporanPresensiSholatTanggal(){
        $dataLaporan = PresensiSholat::all();
        return view('admin.laporan.presensi_sholat.per_tanggal', compact('dataLaporan'));
    }

    public function laporanCetakTanggal(){
        return view('admin.laporan.presensi_sholat.cetak_laporan_per_tanggal');
    }

     public function laporanCetakPerTanggal($presensi, $tgl_awal, $tgl_akhir){
        $awal =$tgl_awal;
        $akhir = $tgl_akhir;
        $pre = $presensi; 
        // dd("Presensi: " .$presensi, "tgl Awal: " .$tgl_awal, "Tgl Akhir: ".$tgl_akhir);
        $dataLaporan = PresensiSholat::whereBetween('date', [$tgl_awal, $tgl_akhir])->where('presensi', $presensi)->get();
         return view('admin.laporan.presensi_sholat.per_tanggal', compact('dataLaporan','awal', 'akhir','pre'));


     }


}
