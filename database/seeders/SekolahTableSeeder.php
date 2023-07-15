<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;
use App\Traits\GenUuid;

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
                'sekolah_id' => substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0,  5),
                'npsn' => '10308183',
                'nama' => 'SMK N 1 KINALI',
                'nss' => '10308183',
                'alamat' => 'Jln. TEUKU UMAR PADANG KURANJI KM.1 KAPUNDUANG',
                'provinsi' => 'Sumatera Barat',
                'created_at' => Carbon::now(),
            ],

        ]);
    }
}
