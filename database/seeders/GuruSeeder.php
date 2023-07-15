<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Traits\GenUuid;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gurus')->insert([
            //admin
            [
                'id' => substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0,  5),
                'nama' => 'GUSTIFA FAUZAN',
                'nik' => '131204020886002',
                'created_at' => Carbon::now(),
            ],

            [
                'id' => substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0,  5),
                'nama' => 'M. GIBRAN ASKARA',
                'nik' => '131206020886002',
                'created_at' => Carbon::now(),
            ],

            [
                'id' => substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0,  5),
                'nama' => 'M. ALFATIH RISKI',
                'nik' => '131207020886002',
                'created_at' => Carbon::now(),
            ],

        ]);
    }
}
