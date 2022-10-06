<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class Mahasiswa extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guard = "mahasiswa";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'prodi_id',
        'kelas_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function kelas()
    {
        return $this->belongsToMany(Kelas::class);
    }

    public function matakuliah()
    {
        return $this->belongsTo(MataKuliah::class);
    }

    public function jadwalkuliah()
    {
        return $this->belongsTo(JadwalKuliah::class);
    }
    public function absenmahasiswa()
    {
        return $this->belongsTo(AbsenMahasiswa::class);
    }
}
