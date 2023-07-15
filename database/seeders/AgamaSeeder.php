<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Traits\GenUuid;

class AgamaSeeder extends Seeder
{

    
    // }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    use GenUuid;
    public function run()
    {
        DB::table('agama')->insert([
            //admin
            [   
                'id' => substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0,  5),
                'nama' => 'Islam',
                'created_at' => Carbon::now(),
            ],

            // [   
            //     'id' => Str::uuid()->toString(),
            //     'nama' => 'Kristen',
            //     'created_at' => Carbon::now(),
            // ],

            // [
            //     'id' => Str::uuid()->toString(),
            //     'nama' => 'Khatolik',
            //     'created_at' => Carbon::now(),
            // ],

            // [
            //     'id' => Str::uuid()->toString(),
            //     'nama' => 'Hindu',
            //     'created_at' => Carbon::now(),
            // ],

            // [
            //     'id' => Str::uuid()->toString(),
            //     'nama' => 'Budha',
            //     'created_at' => Carbon::now(),
            // ],

            // [
            //     'id' => Str::uuid()->toString(),
            //     'nama' => 'Kong Hu Cu',
            //     'created_at' => Carbon::now(),
            // ],

        ]);
    }
}
