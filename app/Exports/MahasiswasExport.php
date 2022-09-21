<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class MahasiswasExport implements FromCollection,WithCustomCsvSettings, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }
    
    public function collection()
    {
        return Mahasiswa::select("id", "name", "prodi_id", "kelas_id", "nim", "jenis_kelamin", "agama", "tempat_lahir", "tanggal_lahir", "alamat_rumah", "nama_kelurahan", "nama_kecamatan", "nama_kota", "nama_provinsi", "nama_negara", "nomor_telepon", "nama_ayah", "nomor_telepon_ayah", "nama_ibu", "nomor_telepon_ibu" , "email","password")->get();
    }

    public function headings(): array
    {
        return ["ID", "Name", "Prodi ID", "Kelas ID", "NIM", "Jenis Kelamin", "Agama", "Tempat Lahir", "Tanggal Lahir", "Alamat Rumah", "Nama Kelurahan", "Nama Kecamatan", "Nama Kota", "Nama Provinsi", "Nama Negara", "Nomor Telepon", "Nama Ayah", "Nomor Telepon Ayah", "Nama Ibu", "Nama Telepon Ibu" , "Email","Password"];
    }
}
