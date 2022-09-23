<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MataKuliah;
use App\Models\JadwalKuliah;
use App\Models\AbsenMahasiswa;
use App\Models\Mahasiswa;
use App\Models\Ruangan;
use App\Models\Kelas;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class JadwalKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwalkuliah = JadwalKuliah::all();
        $ruangan = Ruangan::all();
        $kelas = Kelas::all();
        $dosen = User::all();
        $matakuliah = MataKuliah::all();
        $ti = JadwalKuliah::where('prodi_id', 'like', '1')->get();
        $si = JadwalKuliah::where('prodi_id', 'like', '2')->get();
        $rpl = JadwalKuliah::where('prodi_id', 'like', '3')->get();
        $mi = JadwalKuliah::where('prodi_id', 'like', '4')->get();
        $ka = JadwalKuliah::where('prodi_id', 'like', '5')->get();
        $data = [
            "title" => "Manajemen Jadwal Kuliah",
            "subtitle" => "Fitur untuk mengatur jadwal kuliah",
            "menu" => "Jadwal Kuliah",
            "submenu" => "Index",
        ];
        $data['title'] = 'Manajemen Jadwal Kuliah';
        $data['desc'] = 'Fitur Melihat Jadwal';
        return view('developer.jadwalkuliah.index',$data ,compact('dosen', 'ti', 'mi','rpl', 'si','ka', 'jadwalkuliah','ruangan','kelas', 'matakuliah'));
    }

    public function absen()
    {
        $jadwalkuliah = JadwalKuliah::all();
        $ruangan = Ruangan::all();
        $kelas = Kelas::all();
        $dosen = User::all();
        $absensi = AbsenMahasiswa::all();
        $matakuliah = MataKuliah::all();
        $jk_matkul = JadwalKuliah::select('matakuliah_id')->orderBy('matakuliah_id', 'asc')->first();
        $jk_pertemuan = JadwalKuliah::select('pertemuan')->orderBy('pertemuan', 'asc')->first();
        $am_matkul = AbsenMahasiswa::select('matakuliah_id')->orderBy('matakuliah_id', 'asc')->first();
        $am_pertemuan = AbsenMahasiswa::select('pertemuan')->orderBy('pertemuan', 'asc')->first();
        // $absentime = AbsenMahasiswa::select('waktu_absen')->orderBy('waktu_absen', 'desc')->first();
        // $limiterstart = DB::table('jadwal_kuliah')->select('jam_mulai')->latest()->get();
        // $limiterend = DB::table('jadwal_kuliah')->select('jam_selesai')->latest()->get();
        $data = [
            "title" => "Manajemen Jadwal Kuliah",
            "subtitle" => "Fitur untuk mengatur jadwal kuliah",
            "menu" => "Jadwal Kuliah",
            "submenu" => "Index",
        ];
        $data['title'] = 'Manajemen Jadwal Kuliah';
        $data['desc'] = 'Fitur Melihat Jadwal';
        return view('developer.jadwalkuliah.absen.index',$data ,compact('dosen','absensi' ,'jk_matkul', 'jk_pertemuan','am_matkul', 'am_pertemuan'  , 'jadwalkuliah','ruangan','kelas', 'matakuliah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jadwalkuliah = JadwalKuliah::all();
        $ruangan = Ruangan::all();
        $kelas = Kelas::all();
        $prodi = Prodi::all();
        $dosen = User::all();
        $matakuliah = MataKuliah::all();
        $absen = AbsenMahasiswa::all();
        $data['title'] = 'Manajemen Jadwal Kuliah';
        $data['desc'] = 'Fitur Melihat Jadwal';
        return view('developer.jadwalkuliah.create',$data ,compact('dosen','prodi', 'absen', 'jadwalkuliah','ruangan','kelas', 'matakuliah'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jadwalkuliah = new JadwalKuliah();
        $jadwalkuliah->pertemuan = $request->pertemuan;
        $jadwalkuliah->matakuliah_id = $request->matakuliah_id;
        $jadwalkuliah->prodi_id = $request->prodi_id;
        $jadwalkuliah->kelas_id = $request->kelas_id;
        $jadwalkuliah->dosen_id = $request->dosen_id;
        $jadwalkuliah->sks = $request->sks;
        $jadwalkuliah->metode = $request->metode;
        $jadwalkuliah->ruangan_id = $request->ruangan_id;
        $jadwalkuliah->hari = $request->hari;
        $jadwalkuliah->tanggal = $request->tanggal;
        $jadwalkuliah->jam_mulai = $request->jam_mulai;
        $jadwalkuliah->jam_selesai = $request->jam_selesai;
        // $jadwalkuliah->link_absen = $request->link_absen;
        $jadwalkuliah->slug = \Str::random(16);
        $jadwalkuliah->save();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['title'] = 'Data Absen Mahasiswa';
        $data['desc'] = 'Data Absen Mahasiswa';
        // $data['tag'] = $tag;
        $absen = AbsenMahasiswa::findOrFail($id);
        $jadwalkuliah = JadwalKuliah::all();
        $ruangan = Ruangan::all();
        $kelas = Kelas::all();
        $prodi = Prodi::all();
        $dosen = User::all();
        $matakuliah = MataKuliah::all();
        // $ti = AbsenMahasiswa::where('nama', 'like', 'Teknik Informatika')->with('matakuliah.pertemuan')->get();
        // $absen = AbsenMahasiswa::all();
        return view('developer.jadwalkuliah.absen.show', compact('dosen','prodi', 'absen', 'jadwalkuliah','ruangan','kelas', 'matakuliah'), $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
