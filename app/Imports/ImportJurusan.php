<?php

namespace App\Imports;

use App\Models\Jurusan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportJurusan implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Jurusan([
            'jurusan_id' => $row['jurusan_id'],
            'nama_jurusan' => $row['nama_jurusan'],
            'nama_jurusan_en' => $row['nama_jurusan_en'],
            'untuk_sma' => $row['untuk_sma'],
            'untuk_smk' => $row['untuk_smk'],
            'untuk_pt' => $row['untuk_pt'],
            'untuk_slb' => $row['untuk_slb'],
            'untuk_smklb' => $row['untuk_smklb'],
            // 'jenjang_pendidikan_id' => $row['jenjang_pendidikan_id'],
            'jurusan_induk' => $row['jurusan_induk'],
            'level_bidang_id' => $row['level_bidang_id'],
        ]);
    }
}
