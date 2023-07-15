<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Traits\GenUuid;
use App\Models\Peserta_didik;
// use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportPesertaDidik implements ToCollection
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {

        'peserta_didik_id' => substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0,  5),
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
            // 'peserta_didik_id' => substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0,  5),
            // 'nama' => $row['nama'],
            // 'no_induk' => $row['no_induk'],
            // 'nisn' => $row['nisn'],
            // 'nik' => $row['nik'],
            // 'jenis_kelamin' => $row['jenis_kelamin'],
            // 'tempat_lahir' => $row['tempat_lahir'],
            // 'tanggal_lahir' => $row['tanggal_lahir'],
            // 'agama_id' => $row['agama_id'],
            // 'status' => $row['status'],
            // 'anak_ke' => $row['anak_ke'],
            // 'alamat' => $row['alamat'],
            // 'rt' => $row['rt'],
            // 'rw' => $row['rw'],
            // 'desa_kelurahan' => $row['desa_kelurahan'],
            // 'kecamatan' => $row['kecamatan'],
            // 'kode_pos' => $row['kode_pos'],
            // 'no_telp' => $row['no_telp'],
            // 'sekolah_asal' => $row['sekolah_asal'],
            // 'diterima_kelas' => $row['diterima_kelas'],
            // 'diterima' => $row['diterima'],
            // 'email' => $row['email'],
            // 'nama_ayah' => $row['nama_ayah'],
            // 'nama_ibu' => $row['nama_ibu'],
            // 'kerja_ayah' => $row['kerja_ayah'],
            // 'kerja_ibu' => $row['kerja_ibu'],
            // 'nama_wali' => $row['nama_wali'],
            // 'alamat_wali' => $row['alamat_wali'],
            // 'telp_wali' => $row['telp_wali'],
            // 'kerja_wali' => $row['kerja_wali'],
            // 'active' => $row['active'],
        ]);
    }
}
