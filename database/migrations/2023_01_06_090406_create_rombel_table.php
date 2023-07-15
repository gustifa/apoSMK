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
        Schema::create('rombels', function (Blueprint $table) {
            $table->increments('id');
            //$table->string('nama');
            //$table->integer('sekolah_id');
            //$table->integer('pembelajaran_id');
            //$table->integer('semester_id');
            $table->integer('kelas_id');
            $table->integer('jurusan_id');
            $table->integer('group_id');
            $table->uuid('guru_id')->unique();
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
        Schema::dropIfExists('rombel');
    }
};
