<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelas')->insert([
            //admin
            [
                'nama' => '10',
                'created_at' => Carbon::now(),
            ],

            [
                'nama' => '11',
                'created_at' => Carbon::now(),
            ],

            [
                'nama' => '12',
                'created_at' => Carbon::now(),
            ],

        ]);
    }
}
