<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventarisBarang extends Model
{
    use HasFactory;
    protected $table = 'inventaris_barang';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_barang', 
        'nama_barang', 
        'jumlah_barang', 
        'merek_barang', 
        'kategori_barang', 
        'tanggal_pembelian', 
        'kondisi'
     ];
    protected $guarded = [];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }

    public function inventarisruangan()
    {
        return $this->belongsTo(InventarisRuangan::class);
    }
    
    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class);
    }
}
