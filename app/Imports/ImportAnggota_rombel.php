<?php

namespace App\Imports;

use App\Models\Anggota_rombel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportAnggota_rombel implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Anggota_rombel([
            'anggota_rombel_id' => $row['anggota_rombel_id'],
            'rombongan_belajar_id' => $row['rombongan_belajar_id'],
            'peserta_didik_id' => $row['peserta_didik_id'],
            'anggota_rombel_id_migrasi' => $row['anggota_rombel_id_migrasi'],

        ]);
    }
}
