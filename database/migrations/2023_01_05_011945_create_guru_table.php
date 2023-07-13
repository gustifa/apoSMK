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
        Schema::create('gurus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama',80);
            $table->string('nik', 16);
            $table->string('nuptk',16)->nullable();
            $table->string('nip')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('tempat_lahir',50)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->integer('mapel_id')->nullable();
            $table->integer('agama_id')->nullable();
            $table->integer('jurusan_id')->nullable();
            $table->string('alamat')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('desa_kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('email')->nullable();
            $table->string('photo')->nullable();
            //$table->primary('id');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guru');
    }
};
