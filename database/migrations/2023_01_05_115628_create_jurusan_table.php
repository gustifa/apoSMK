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
        Schema::create('jurusan', function (Blueprint $table) {
            // $table->id('');
            // $table->string('nama_jurusan', 100);
            // $table->string('nama_jurusan_en', 100)->nullable();
            // $table->decimal('untuk_sma', 1, 0);
            // $table->decimal('untuk_smk', 1, 0);
            // $table->decimal('untuk_pt', 1, 0);
            // $table->decimal('untuk_slb', 1, 0);
            // $table->decimal('untuk_smklb', 1, 0);
            // $table->decimal('jenjang_pendidikan_id', 1, 0)->nullable();
            // $table->string('jurusan_induk', 25)->nullable();
            // $table->string('level_bidang_id', 5);
            // $table->timestamps();
            // $table->softDeletes();
            $table->increments('id');
            $table->string('nama');
            $table->string('kode');
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
        Schema::dropIfExists('jurusan');
    }
};
