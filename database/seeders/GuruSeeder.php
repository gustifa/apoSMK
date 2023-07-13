<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

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
                'nama' => 'GUSTIFA FAUZAN',
                'nik' => '131204020886002',
                'created_at' => Carbon::now(),
            ],

            [
                'nama' => 'M. GIBRAN ASKARA',
                'nik' => '131206020886002',
                'created_at' => Carbon::now(),
            ],

            [
                'nama' => 'M. ALFATIH RISKI',
                'nik' => '131207020886002',
                'created_at' => Carbon::now(),
            ],

        ]);
    }
}
