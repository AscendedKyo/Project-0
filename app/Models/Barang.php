<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';

    public function gedung()
    {
        return $this->belongsTo(Gedung::class);
    }

    public function inventaris()
    {
        return $this->belongsToMany(Inventaris::class);
    }
}
