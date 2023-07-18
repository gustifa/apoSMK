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
        Schema::create('rombongan_belajar', function (Blueprint $table) {
            $table->uuid('rombongan_belajar_id');
            $table->integer('kelas_id')->nullable();
            $table->integer('jurusan_id')->nullable();
            $table->integer('group_id')->nullable();
            // $table->uuid('peserta_didik_id')->nullable();
            // $table->uuid('jurusan_sp_id')->nullable();
            // $table->integer('kurikulum_id')->nullable();
            $table->string('nama');
            $table->uuid('guru_id')->nullable();
            // $table->uuid('ptk_id')->nullable();
            // $table->integer('tingkat')->nullable();
            // $table->decimal('jenis_rombel', 2, 0);
            // $table->uuid('rombel_id_dapodik');
            // $table->integer('kunci_nilai')->default('0');
            $table->timestamps();
            $table->softDeletes();
            $table->primary('rombongan_belajar_id');
            $table->foreign('guru_id')->references('guru_id')->on('guru')
                ->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('kelas_id')->references('id')->on('kelas')
                ->onUpdate('CASCADE')->onDelete('CASCADE');
             $table->foreign('jurusan_id')->references('id')->on('jurusan')
                ->onUpdate('CASCADE')->onDelete('CASCADE');
             $table->foreign('group_id')->references('id')->on('group')
                ->onUpdate('CASCADE')->onDelete('CASCADE');
             // $table->foreign('peserta_didik_id')->references('peserta_didik_id')->on('peserta_didik')
             //    ->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rombongan_belajar');
    }
};
