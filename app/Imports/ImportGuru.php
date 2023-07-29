<?php

namespace App\Imports;

use App\Models\Guru;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Traits\GenUuid;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportGuru implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Guru([
            'guru_id' => $row['guru_id'],
            'nama' => $row['nama'],
            'nuptk' => $row['nuptk'],
            'nip' => $row['nip'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tanggal_lahir' => $row['tanggal_lahir'],
            'nik' => $row['nik'],
            'jenis_ptk_id' => $row['jenis_ptk_id'],
            'agama_id' => $row['agama_id'],
            'status_kepegawaian_id' => $row['status_kepegawaian_id'],
            'alamat' => $row['alamat'],
            'rt' => $row['rt'],
            'rw' => $row['rw'],
            'desa_kelurahan' => $row['desa_kelurahan'],
            'kecamatan' => $row['kecamatan'],
            'kode_wilayah' => $row['kode_wilayah'],
            'kode_pos' => $row['kode_pos'],
            'no_hp' => $row['no_hp'],
            'email' => $row['email'],

        ]);
    }
}
