<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kelas;

class CreateKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kelas = [
            [
                'nama_kelas'=>'TI-2021-KIP-P1',
                'kode_kelas'=>'TI-2021-KIP-P1',
            ],
            [
                'nama_kelas'=>'SI-2021-KIP-P1',
                'kode_kelas'=>'Dosen B',
            ],
            [
                'nama_kelas'=>'RPL-2021-KIP-P1',
                'kode_kelas'=>'Dosen C',
            ],
            [
                'nama_kelas'=>'MI-2021-KIP-P1',
                'kode_kelas'=>'Dosen D',
            ],
            [
                'nama_kelas'=>'KA-2021-KIP-P1',
                'kode_kelas'=>'Dosen E',
            ],
        ];

        foreach ($kelas as $key => $kelas) {
            Kelas::create($kelas);
        }
    }
}
