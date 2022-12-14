<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Ruangan extends Model
{
    use HasFactory;
    protected $table = 'ruangans';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_ruangan', 'kode_ruangan', 'lokasi_ruangan', 'isActive'];
    protected $guarded = [];

    protected function isActive(): Attribute
    {
        return new Attribute(
            get: fn ($value) => ["Tidak Digunakan", "Sedang Digunakan"][$value],
        );
    }

    public function inventaris()
    {
        return $this->has_many(Inventaris::class);
    }
    
    public function gedung()
    {
        return $this->belongsTo(Gedung::class);
    }
}
