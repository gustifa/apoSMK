<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;
use App\Traits\Uuid;
use Illuminate\Support\Str;

class SekolahTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sekolah')->insert([
            //admin
            [
                'sekolah_id' => Str::uuid()->toString(),
                'npsn' => '10308183',
                'nama' => 'SMK N 1 KINALI',
                'nss' => '10308183',
                'alamat' => 'JL. TEUKU UMAR KM.1 KAPUNDUANG',
                'kecamatan' => 'Kinali',
                'kabupaten' => 'Pasaman Barat',
                'provinsi' => 'Sumatera Barat',
                'email' => 'smkn1kinali@gmail.com',
                'website' => 'smkn1kinali.sch.id',
                'kode_pos' => '26361',
                'desa_kelurahan' => 'Bandua Balai',
                'created_at' => Carbon::now(),
            ],

        ]);
    }
}
