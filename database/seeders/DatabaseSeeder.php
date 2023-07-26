<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(SekolahTableSeeder::class);
        $this->call(AgamaSeeder::class);
        $this->call(JurusanSeeder::class);
        $this->call(KelasSeeder::class);
        $this->call(TahunAjaranSeed::class);
        $this->call(GroupSeeder::class);
        $this->call(BobotPelanggaranSeeder::class);
        // $this->call(GuruSeeder::class);
        //$this->call(PresensiTableSeeder::class);
         //\App\Models\User::factory(10)->create();
         //\App\Models\Presensi::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
