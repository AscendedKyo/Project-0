<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class CreateMahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mahasiswa = [
            [
                'nim'=>'0000001',
                'name'=>'Muhamad Jaya Kusuma',
                'email'=>'mahasiswa@example.com',
                'password'=> bcrypt('123456'),
            ],
        ];

        foreach ($mahasiswa as $key => $mahasiswa) {
            Mahasiswa::create($mahasiswa);
        }
    }
}
