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
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->default(0);
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->string('merk_barang');
            $table->string('kuantitas');
            $table->string('nama_satuan');
            $table->string('tahun_perolehan');
            $table->string('asal_barang');
            $table->string('keadaan_barang');
            $table->string('harga');
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
        Schema::dropIfExists('barang');
    }
};
