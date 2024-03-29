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
        Schema::create('user_rfid', function (Blueprint $table) {
            $table->id();
            $table->string('rfid_id')->unique()->nullable();
            // $table->uuid('peserta_didik_id')->nullable();
            // $table->uuid('rombongan_belajar_id')->nullable();
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
        Schema::dropIfExists('user_rfid_siswas');
    }
};
