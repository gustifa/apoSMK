<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;


class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('group')->insert([
            //admin
            [
                'nama' => '1',
                'created_at' => Carbon::now(),
            ],

                        [
                'nama' => '2',
                'created_at' => Carbon::now(),
            ],

            [
                'nama' => '3',
                'created_at' => Carbon::now(),
            ],

                        [
                'nama' => '4',
                'created_at' => Carbon::now(),
            ],

            // [
            //     'nama' => '5',
            //     'created_at' => Carbon::now(),
            // ],

            //             [
            //     'nama' => '6',
            //     'created_at' => Carbon::now(),
            // ],

        ]);
    }
}
