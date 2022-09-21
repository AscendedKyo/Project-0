<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKuliah extends Model
{
    use HasFactory;
    protected $table = 'jadwal_kuliah';
    protected $primaryKey = 'id';
    protected $fillable = ['matakuliah_id', 'kelas_id', 'ruangan_id', 'sks', 'pertemuan', 'metode', 'tanggal', 'jam_mulai', 'jam_selesai'];
    protected $guarded = [];

    public function dosen()
    {
        return $this->belongsTo(User::class);
    }

    public function matakuliah()
    {
        return $this->belongsTo(MataKuliah::class);
    }
    public function mahasiswas()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class);
    }
    
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
    public function absenmahasiswa()
    {
        return $this->belongsTo(AbsenMahasiswa::class);
    }
}
