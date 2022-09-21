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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            // Data Mahasiswa
            $table->foreignId('prodi_id')->default(0);
            $table->foreignId('kelas_id')->default(0);
            $table->string('nim')->unique()->default(0000001);
            // Data Identitas Mahasiswa
            $table->string('foto_profil')->default('default.jpg');
            $table->string('jenis_kelamin')->nullable()->default(0);
            $table->string('agama')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            // Data Domisili Mahasiswa Lokal
            $table->string('alamat_rumah')->nullable();
            $table->string('nama_kelurahan')->nullable();
            $table->string('nama_kecamatan')->nullable();
            $table->string('nama_kota')->nullable();
            $table->string('nama_provinsi')->nullable();
            $table->string('nama_negara')->default('Indonesia');
            // Data Domisili Mahasiswa ( Dari Luar Kota / Negeri )
            $table->string('alamat_rumah_lk')->nullable();
            $table->string('asal_kelurahan')->nullable();
            $table->string('asal_kecamatan')->nullable();
            $table->string('asal_kota')->nullable();
            $table->string('asal_provinsi')->nullable();
            $table->string('asal_negara')->nullable();
            // Data Orang Tua Mahasiswa
            $table->string('nama_ibu')->nullable();
            $table->string('nomor_telepon_ibu')->nullable()->unique();
            $table->string('nama_ayah')->nullable();
            $table->string('nomor_telepon_ayah')->nullable()->unique();
            // Data Kontak Mahasiswa
            $table->string('nomor_telepon')->nullable()->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('status')->default(1);
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('mahasiswas');
    }
};
