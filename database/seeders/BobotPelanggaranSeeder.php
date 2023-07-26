<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class BobotPelanggaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bobot_pelanggaran')->insert([
            //admin
            [
                'jenis_pelanggaran' => 'Disiplin',
                'nama_pelanggaran' => 'Berkuku Panjang',
                'bobot' => '5',
                'created_at' => Carbon::now(),
            ],

            [
                'jenis_pelanggaran' => 'Disiplin',
                'nama_pelanggaran' => 'Memakai Cincin, Gelang, Kalung, bagi Peserta Didik Laki- laki dan juga bagi Peserta Didik Perempuan ',
                'bobot' => '5',
                'created_at' => Carbon::now(),
            ],

            [
                'jenis_pelanggaran' => 'Disiplin',
                'nama_pelanggaran' => 'Memakai lipstik, lip tint, lip balm, dan atau sejenisnya yang berwarna serta memakai make up bagi peserta didik perempuan',
                'bobot' => '5',
                'created_at' => Carbon::now(),
            ],

            [
                'jenis_pelanggaran' => 'Disiplin',
                'nama_pelanggaran' => 'Memakai kaos oblong di dalam baju seragam Sekolah',
                'bobot' => '5',
                'created_at' => Carbon::now(),
            ],

            [
                'jenis_pelanggaran' => 'Disiplin',
                'nama_pelanggaran' => 'Terlambat Masuk Sekolah 15 menit sampai 20 menit',
                'bobot' => '10',
                'created_at' => Carbon::now(),
            ],

            [
                'jenis_pelanggaran' => 'Disiplin',
                'nama_pelanggaran' => 'Terlambat masuk pada pergantian jam pelajaran lebih dari 15 menit',
                'bobot' => '10',
                'created_at' => Carbon::now(),
            ],

            [
                'jenis_pelanggaran' => 'Disiplin',
                'nama_pelanggaran' => 'Memakai sandal atau sepatu dan tali sepatu bukan warna hitam di lingkungan sekolah (disita pengambilan oleh Orangtua)',
                'bobot' => '5',
                'created_at' => Carbon::now(),
            ],

             [
                'jenis_pelanggaran' => 'Disiplin',
                'nama_pelanggaran' => 'Tidak memasang atribut (Lokasi Sekolah, Lambang Osis, Papan Nama, Lambang Jurusan, Dasi dan Topi Sekolah)',
                'bobot' => '10',
                'created_at' => Carbon::now(),
            ],

            [
                'jenis_pelanggaran' => 'Disiplin',
                'nama_pelanggaran' => 'Tidak berpakai rapi atau baju keluar bagi Peserta Didik Laki-laki',
                'bobot' => '10',
                'created_at' => Carbon::now(),
            ],

            [
                'jenis_pelanggaran' => 'Budi Pekerti',
                'nama_pelanggaran' => 'Berkata Kotor di Lingkungan Sekolah atau diluar Lingkungan Sekolah',
                'bobot' => '10',
                'created_at' => Carbon::now(),
            ],

            [
                'jenis_pelanggaran' => 'Kriminal',
                'nama_pelanggaran' => 'Berkelahi atau Tawuran didalam atau diluar Sekolah (Berpakaian Seragam Sekolah)',
                'bobot' => '300',
                'created_at' => Carbon::now(),
            ],



        ]);
    }
}
