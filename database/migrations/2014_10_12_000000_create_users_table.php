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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            // Data Pegawai
            $table->string('nik')->unique()->nullable();
            $table->string('nidn')->unique()->nullable();
            $table->string('nitk')->unique()->nullable();
            // Data Identitas Pegawai
            $table->string('jabatan')->nullable();
            $table->string('nomor_telepon')->nullable();
            $table->string('foto_profil')->default('images/profile/default.jpg');
            $table->string('jenis_kelamin')->nullable();
            $table->string('agama')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            // Data Domisili Pegawai
            $table->string('alamat_rumah')->nullable();
            $table->string('nama_kelurahan')->nullable();
            $table->string('nama_kecamatan')->nullable();
            $table->string('nama_kota')->nullable();
            $table->string('nama_provinsi')->nullable();
            $table->string('nama_negara')->default('Indonesia');
            // Data Kontak Darurat
            $table->string('nama_ibu')->nullable();
            $table->string('nomor_telepon_ibu')->nullable()->unique();
            $table->string('nama_ayah')->nullable();
            $table->string('nomor_telepon_ayah')->nullable()->unique();
            $table->string('alamat_orang_tua')->nullable()->unique();
            // Data Informasi Login
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('type')->default(0);
            /* Users: 0=>Pegawai Biasa, 1=>Pegawai Sarpras, 2=>Pegawai Keuangan, 3=>Pegawai Akademik, 4=>Pegawai Admin, 5=>Developer */
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
