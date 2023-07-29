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
        Schema::create('kasus_pelanggaran', function (Blueprint $table) {
            $table->id();
            $table->string('bobot_pelanggaran_id');
            $table->string('guru_id');
            $table->string('peserta_didik_id');
            $table->string('bobot');
            $table->text('keterangan');
            $table->string('dokumentasi');
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
        Schema::dropIfExists('kasus_pelanggarans');
    }
};
