<?php

namespace App\Imports;

use App\Models\Bobot_pelanggaran;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportBobotPelanggaran implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Bobot_pelanggaran([
            'id' => $row['id'],
            'nama_pelanggaran' => $row['nama_pelanggaran'],
            'bobot' => $row['bobot'],

        ]);
    }
}
