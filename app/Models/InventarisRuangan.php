<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventarisRuangan extends Model
{
    use HasFactory;
    protected $table = 'inventaris_ruangan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'ruangan_id', 
        'inventaris_barang_id', 
        'kode_barang', 
        'nama_barang', 
        'jumlah_barang', 
        'merek_barang', 
        'kategori_barang', 
        'tanggal_pembelian', 
        'kondisi'
     ];
    protected $guarded = [];

    public function inventarisbarang()
    {
        return $this->belongsTo(InventarisBarang::class);
    }
    
    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class);
    }
}
