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
        Schema::create('user', function (Blueprint $table) {
            //$table->integer('id');
            $table->increments('id');
            $table->integer('Nis')->nullable();
            $table->string('Nama',30);
            $table->string('Kelas',5);
            $table->string('Jurusan',10);
            $table->string('Group',2);
            $table->string('RFID_ID',15)->nullable();
            $table->string('Walas_id',15)->nullable();
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
        Schema::dropIfExists('user');
    }
};
