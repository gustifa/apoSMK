<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Traits\GenUuid;
use App\Models\Peserta_didik;

class Peserta_didik implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        return new Peserta_didik([
            'id' => substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0,  5),
            'nama' => $row[0],
            'no_induk' => $row[1],
            'nisn' => $row[2],
            'nik' => $row[3],
            'jenis_kelamin' => $row[4],
            'tempat_lahir' => $row[5],
            'tanggal_lahir' => $row[6],
            'agama_id' => $row[7],
            'status' => $row[8],
            'anak_ke' => $row[9],
            'alamat' => $row[10],
            'rt' => $row[11],
            'rw' => $row[12],
            'desa_kelurahan' => $row[13],
            'kecamatan' => $row[14],
            'kode_pos' => $row[15],
            'no_telp' => $row[16],
            'sekolah_asal' => $row[17],
            'diterima_kelas' => $row[18],
            'diterima' => $row[19],
            'email' => $row[20],
            'nama_ayah' => $row[21],
            'nama_ibu' => $row[22],
            'kerja_ayah' => $row[23],
            'kerja_ibu' => $row[24],
            'nama_wali' => $row[25],
            'alamat_wali' => $row[26],
            'telp_wali' => $row[27],
            'kerja_wali' => $row[28],
            'active' => $row[29],
        ]);
    }
}
