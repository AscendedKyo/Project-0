<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenMahasiswa extends Model
{
    use HasFactory;
    protected $table = 'absen_mahasiswa';
    protected $primaryKey = 'id';
    protected $fillable = ['jadwalkuliah_id','prodi_id', 'matakuliah_id','kelas_id', 'jadwalkuliah_id', 'mahasiswa_id', 'absen', 'bukti_hadir', 'bukti_sakit', ];
    protected $guarded = [];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function jadwalkuliah()
    {
        return $this->belongsTo(JadwalKuliah::class);
    }
    public function matakuliah()
    {
        return $this->belongsTo(MataKuliah::class);
    }
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}
