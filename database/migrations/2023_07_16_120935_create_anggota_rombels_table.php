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
        Schema::create('anggota_rombel', function (Blueprint $table) {
            $table->uuid('anggota_rombel_id');
            $table->uuid('rombongan_belajar_id');
            $table->uuid('peserta_didik_id')->unique();
            $table->uuid('anggota_rombel_id_migrasi')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->primary('anggota_rombel_id');
            $table->foreign('peserta_didik_id')->references('peserta_didik_id')->on('peserta_didik')
                ->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('rombongan_belajar_id')->references('rombongan_belajar_id')->on('rombongan_belajar')
                ->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggota_rombels');
    }
};
