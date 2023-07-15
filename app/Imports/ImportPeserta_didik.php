<?php

namespace App\Imports;

use App\Models\Peserta_didik;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Traits\GenUuid;

class ImportPeserta_didik implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Peserta_didik([
            'peserta_didik_id' => substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0,  5),
            'nama' => $row['nama'],
            'no_induk' => $row['no_induk'],
            'nisn' => $row['nisn'],
            'nik' => $row['nik'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tanggal_lahir' => $row['tanggal_lahir'],
            'agama_id' => $row['agama_id'],
            'status' => $row['status'],
            'anak_ke' => $row['anak_ke'],
            'alamat' => $row['alamat'],
            'rt' => $row['rt'],
            'rw' => $row['rw'],
            'desa_kelurahan' => $row['desa_kelurahan'],
            'kecamatan' => $row['kecamatan'],
            'kode_pos' => $row['kode_pos'],
            'no_telp' => $row['no_telp'],
            'sekolah_asal' => $row['sekolah_asal'],
            'diterima_kelas' => $row['diterima_kelas'],
            'diterima' => $row['diterima'],
            'email' => $row['email'],
            'nama_ayah' => $row['nama_ayah'],
            'nama_ibu' => $row['nama_ibu'],
            'kerja_ayah' => $row['kerja_ayah'],
            'kerja_ibu' => $row['kerja_ibu'],
            'nama_wali' => $row['nama_wali'],
            'alamat_wali' => $row['alamat_wali'],
            'telp_wali' => $row['telp_wali'],
            'kerja_wali' => $row['kerja_wali'],
            'active' => $row['active'],
        ]);
    }
}
