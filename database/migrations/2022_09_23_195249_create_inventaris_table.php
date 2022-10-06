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
        Schema::create('inventaris', function (Blueprint $table) {
            // Nomor
            $table->id();
            // Relasi
            $table->foreignId('gedung_id')->default(0);
            $table->foreignId('ruangan_id')->default(0);
            $table->string('kode_barang');
            // Spesifikasi
            $table->string('nama_barang');
            $table->string('jenis_barang');
            $table->string('merek_barang');
            $table->string('type_barang');
            $table->string('detail_barang');
            $table->string('jumlah_barang');
            $table->integer('kondisi_bagus')->default(0);
            $table->integer('kondisi_kurang')->default(0);
            $table->integer('kondisi_rusak')->default(0);
            // Lainnya
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
        Schema::dropIfExists('inventaris');
    }
};
