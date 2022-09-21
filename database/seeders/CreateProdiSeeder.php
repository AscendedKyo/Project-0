<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prodi;

class CreateProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prodi = [
            [
               'nama_prodi'=>'Teknik Informatika',
               'slug'=>'teknik-informatika',
               'nama_kaprodi'=>'Dosen A',
            ],
            [
               'nama_prodi'=>'Sistem Informasi',
               'slug'=>'sistem-informasi',
               'nama_kaprodi'=>'Dosen B',
            ],
            [
               'nama_prodi'=>'Rekayasa Perangkat Lunak',
               'slug'=>'rekayasa-perangkat-lunak',
               'nama_kaprodi'=>'Dosen C',
            ],
            [
               'nama_prodi'=>'Manajemen Informasi',
               'slug'=>'manajemen-informasi',
               'nama_kaprodi'=>'Dosen D',
            ],
            [
               'nama_prodi'=>'Komputerisasi Akuntansi',
               'slug'=>'komputerisasi-akuntansi',
               'nama_kaprodi'=>'Dosen E',
            ],
        ];
    
        foreach ($prodi as $key => $prodi) {
            Prodi::create($prodi);
        }
    }
}
