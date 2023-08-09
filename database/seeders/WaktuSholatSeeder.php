<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class WaktuSholatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                 DB::table('waktu_sholat')->insert([
            //admin
            [
                'nama' => 'Zhuhur',
                'waktu_mulai' => '12:30',
                'waktu_selesai' => '13:40',
                'created_at' => Carbon::now(),
            ],

            [
                'nama' => 'Ashar',
                'waktu_mulai' => '15:30',
                'waktu_selesai' => '16:43',
                'created_at' => Carbon::now(),
            ],

        ]);
    }
}
