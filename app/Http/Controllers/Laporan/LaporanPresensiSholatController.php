<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rombongan_belajar;
use App\Models\Anggota_rombel;

class LaporanPresensiSholatController extends Controller
{
    public function laporanAll(){
        $semuaROmbel = Rombongan_belajar::all();
        // $walasRombel = Rombongan_belajar::
        return view('admin.laporan.presensi_sholat.semua_presensi_sholat', compact('semuaROmbel'));
    }

    public function ExamFeeClassData(Request $request){
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
}
