<?php

namespace App\Imports;

use App\Models\Rombongan_belajar;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportRombongan_belajar implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Rombongan_belajar([
           'rombongan_belajar_id' => $row['rombongan_belajar_id'],
            'jurusan_id' => $row['jurusan_id'],
            'jurusan_sp_id' => $row['jurusan_sp_id'],
            'kurikulum_id' => $row['kurikulum_id'],
            'nama' => $row['nama'],
            'guru_id' => $row['guru_id'],
            'ptk_id' => $row['ptk_id'],
            'tingkat' => $row['tingkat'],
            'jenis_rombel' => $row['jenis_rombel'],
            'rombel_id_dapodik' => $row['rombel_id_dapodik'],
            'kunci_nilai' => $row['kunci_nilai'],

        ]);
    }
}
