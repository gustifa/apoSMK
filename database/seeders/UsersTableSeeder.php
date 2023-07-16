<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Traits\Uuid;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            //admin
            [
                'id' => Str::uuid()->toString(),
                'name' => 'admin',
                'username' => 'admin',
                'email' => 'fauzangustifa@gmail.com',
                // 'password' => rand(123456, 999999),
                'password' => Hash::make('111'),
                'role' => 'admin',
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            //guru
            [
                'id' => Str::uuid()->toString(),
                'name' => 'guru',
                'username' => 'guru',
                'email' => 'guru@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'guru',
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            //user
            [
                'id' => Str::uuid()->toString(),
                'name' => 'user',
                'username' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'user',
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            //siswa
            // [
            //     'id' => Str::uuid()->toString(),
            //     'name' => 'siswa',
            //     'username' => 'siswa',
            //     'email' => 'siswa@gmail.com',
            //     'password' => Hash::make('111'),
            //     'role' => 'siswa',
            //     'status' => 'active',
            //     'created_at' => Carbon::now(),
            // ],

        ]);
    }
}
