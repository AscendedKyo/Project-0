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
        Schema::create('absen_mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prodi_id');
            $table->foreignId('kelas_id');
            $table->foreignId('mahasiswa_id');
            $table->string('absen')->nullable();
            $table->string('bukti_hadir')->nullable();
            $table->string('bukti_sakit')->nullable();
            $table->string('bukti_izin')->nullable();
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
        Schema::dropIfExists('absen_mahasiswas');
    }
};
