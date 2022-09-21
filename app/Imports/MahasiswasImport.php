<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;

class MahasiswasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Mahasiswa([
            'name'                => $row['name'],
            'prodi_id'            => $row['prodi_id'],
            'kelas_id'            => $row['kelas_id'],
            'nim'                 => $row['nim'], 
            'jenis_kelamin'       => $row['jenis_kelamin'], 
            'agama'               => $row['agama'], 
            'tempat_lahir'        => $row['tempat_lahir'], 
            'tanggal_lahir'       => $row['tanggal_lahir'], 
            'alamat_rumah'        => $row['alamat_rumah'], 
            'nama_kelurahan'      => $row['nama_kelurahan'], 
            'nama_kecamatan'      => $row['nama_kecamatan'], 
            'nama_kota'           => $row['nama_kota'], 
            'nama_provinsi'       => $row['nama_provinsi'], 
            'nama_negara'         => $row['nama_negara'], 
            'nomor_telepon'       => $row['nomor_telepon'], 
            'nama_ayah'           => $row['nama_ayah'], 
            'nomor_telepon_ayah'  => $row['nomor_telepon_ayah'], 
            'nama_ibu'            => $row['nama_ibu'], 
            'nomor_telepon_ibu'   => $row['nomor_telepon_ibu'], 
            'password'            => Hash::make($row['password']),
        ]);
    }
}
