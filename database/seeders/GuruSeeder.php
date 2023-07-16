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
        DB::table('guru')->insert([
            //admin
            [
                'guru_id' => Str::uuid()->toString(),
                'nama' => 'GUSTIFA FAUZAN',
                'nik' => '131204020886002',
                'created_at' => Carbon::now(),
            ],

            [
                'guru_id' => Str::uuid()->toString(),
                'nama' => 'M. GIBRAN ASKARA',
                'nik' => '131206020886002',
                'created_at' => Carbon::now(),
            ],

            [
                'guru_id' => Str::uuid()->toString(),
                'nama' => 'M. ALFATIH RISKI',
                'nik' => '131207020886002',
                'created_at' => Carbon::now(),
            ],

        ]);
    }
}
