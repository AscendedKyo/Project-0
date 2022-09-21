<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_kelas', 'kode_kelas'];
    protected $guarded = [];
    
    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }
    public function absenmahasiswa()
    {
        return $this->belongsTo(AbsenMahasiswa::class);
    }
}
