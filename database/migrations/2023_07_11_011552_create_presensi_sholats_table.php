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
        Schema::create('presensi_sholat', function (Blueprint $table) {
            $table->uuid('id')->primary();
            // $table->uuid('siswa_id')->nullable();
            $table->string('rfid_id')->nullable();
            $table->string('presensi')->default(0);
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
        Schema::dropIfExists('presensi_sholat');
    }
};
