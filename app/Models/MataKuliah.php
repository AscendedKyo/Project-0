<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;
    protected $table = 'matakuliah';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_matakuliah', 'kode_matakuliah', 'jumlah_sks', 'dosen_id'];
    protected $guarded = [];

    public function dosen()
    {
        return $this->belongsTo(User::class);
    }
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
    public function absenmahasiswa()
    {
        return $this->belongsTo(AbsenMahasiswa::class);
    }

    public function jadwalkuliah()
    {
        return $this->belongsTo(JadwalKuliah::class);
    }

    public function inventaris_ruangan()
    {
        return $this->hasMany(InventarisRuangan::class);
    }
    
    public function inventaris_barang()
    {
        return $this->hasMany(InventarisBarang::class);
    }
}
