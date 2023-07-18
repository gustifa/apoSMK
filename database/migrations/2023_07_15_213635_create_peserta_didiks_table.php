<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta_didik', function (Blueprint $table) {
            $table->uuid('peserta_didik_id');
            $table->string('nama');
            $table->string('no_induk');
            $table->string('nisn')->nullable();
            $table->string('nik', 16)->unique()->nullable();
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->integer('agama_id');
            $table->string('status');
            $table->integer('anak_ke');
            $table->string('alamat')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('desa_kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('sekolah_asal')->nullable();
            $table->string('diterima_kelas')->nullable();
            $table->string('diterima')->nullable();
            $table->string('email')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->integer('kerja_ayah')->nullable();
            $table->integer('kerja_ibu')->nullable();
            $table->string('nama_wali')->nullable();
            $table->string('alamat_wali')->nullable();
            $table->string('telp_wali')->nullable();
            $table->integer('kerja_wali')->nullable();
            $table->string('photo')->nullable();
            $table->string('rfid_id')->nullable();
            $table->decimal('active', 1,0)->nullable()->default('1');
            $table->uuid('peserta_didik_id_migrasi')->nullable();
            $table->timestamps();
            $table->primary('peserta_didik_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peserta_didiks');
    }
};
