<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;
use File;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('jurusan')->insert([
        //     //admin
        //     [
        //         'nama' => 'Teknik Jaringan Komputer dan Telekomunikasi',
        //         'kode' => 'TJKT',
        //         'created_at' => Carbon::now(),
        //     ],

        //     [
        //         'nama' => 'Teknik Elektronika',
        //         'kode' => 'ELKA',
        //         'created_at' => Carbon::now(),
        //     ],

        //     [
        //         'nama' => 'Desain Komunikasi Visual',
        //         'kode' => 'DKV',
        //         'created_at' => Carbon::now(),
        //     ],

        //     [
        //         'nama' => 'Akuntansi dan Keuangan Lembaga',
        //         'kode' => 'AKL',
        //         'created_at' => Carbon::now(),
        //     ],

        //     [
        //         'nama' => 'Manajemen Perkantoran Lembaga Binis',
        //         'kode' => 'MPLB',
        //         'created_at' => Carbon::now(),
        //     ],

        //     [
        //         'nama' => 'Teknik Komputer dan Jaringan',
        //         'kode' => 'TKJ',
        //         'created_at' => Carbon::now(),
        //     ],

        //     [
        //         'nama' => 'Teknik Audio dan Video',
        //         'kode' => 'TAV',
        //         'created_at' => Carbon::now(),
        //     ],

        //     [
        //         'nama' => 'Multimedia',
        //         'kode' => 'MM',
        //         'created_at' => Carbon::now(),
        //     ],


        // ]);

        DB::table('jurusan')->truncate();
        $json = File::get('database/data/jurusan.json');
        $data = json_decode($json);
        foreach($data as $obj){
            DB::table('jurusan')->updateOrInsert([
                'jurusan_id'            => trim($obj->jurusan_id),
                'nama_jurusan'          => $obj->nama_jurusan,
                'nama_jurusan_en'       => $obj->nama_jurusan_en,
                'untuk_sma'             => $obj->untuk_sma,
                'untuk_smk'             => $obj->untuk_smk,
                'untuk_pt'              => $obj->untuk_pt,
                'untuk_slb'             => $obj->untuk_slb,
                'untuk_smklb'           => $obj->untuk_smklb,
                'jenjang_pendidikan_id' => $obj->jenjang_pendidikan_id,
                'jurusan_induk'         => $obj->jurusan_induk,
                'level_bidang_id'       => $obj->level_bidang_id,
                'created_at'            => $obj->created_at,
                'updated_at'            => $obj->updated_at,
            ]);
        }
    }
}
