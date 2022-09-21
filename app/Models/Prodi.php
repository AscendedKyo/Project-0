<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
    protected $table = 'prodi';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_prodi', 'nama_kaprodi'];
    protected $guarded = [];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
    public function absenmahasiswa()
    {
        return $this->belongsTo(AbsenMahasiswa::class);
    }
}
