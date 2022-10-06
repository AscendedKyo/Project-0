<?php

namespace App\Http\Controllers\Mahasiswa;

use Auth;
use App\Models\{Prodi, Kelas, Mahasiswa};
use App\Models\MataKuliah;
use App\Models\JadwalKuliah;
use App\Models\AbsenMahasiswa;
use App\Models\ProdiMahasiswa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;


class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:mahasiswa');
    }

    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        $prodi = Prodi::all();
        $kelas = Kelas::all();
        $matakuliah = MataKuliah::all();
        $now = Carbon::now();
        $today = Carbon::today();
        $jadwaltoday = JadwalKuliah::all()->get('');
        $jadwalkuliah = JadwalKuliah::with('mahasiswas')->get();
        $data['title'] = 'Dashboard';
        $data['subtitle'] = 'Index';
        $data['desc'] = 'Selamat Datang '. Auth::guard('mahasiswa')->user()->name;
        return view('mahasiswa.pages.dashboard',$data, compact('mahasiswa', 'now', 'prodi', 'kelas', 'jadwalkuliah','jadwaltoday' , 'today'));
        
    }

    public function absen()
    {
        $mahasiswa = Mahasiswa::all();
        $prodi = Prodi::all();
        $kelas = Kelas::all();
        $now = Carbon::now();
        $absenmahasiswa = AbsenMahasiswa::all();
        // $limiterdate = DB::table('jadwal_kuliah')->select('tanggal')->orderBy('tanggal', 'desc')->first();
        $limiterdate = JadwalKuliah::select('tanggal')->orderBy('tanggal', 'desc')->first();
        $limiterstart = DB::table('jadwal_kuliah')->select('jam_mulai')->get();
        $limiterend = DB::table('jadwal_kuliah')->select('jam_selesai')->get();
        $jadwalkuliah = JadwalKuliah::all();
        $matakuliah = MataKuliah::all();
        $data['title'] = 'Dashboard';
        $data['subtitle'] = 'Absensi';
        $data['desc'] = 'Selamat Datang '. Auth::guard('mahasiswa')->user()->name;
        return view('mahasiswa.pages.absen.index',$data, compact('mahasiswa','limiterdate', 'limiterstart', 'limiterend','now', 'prodi', 'kelas', 'absenmahasiswa', 'jadwalkuliah', 'matakuliah'));
    }

    public function profile()
    {
        $mahasiswas = Mahasiswa::find(Auth::id());
        $prodi = Prodi::all();
        $kelas = Kelas::all();
        $data['title'] = 'Dashboard';
        $data['subtitle'] = 'Profile';
        $data['desc'] = 'Selamat Datang '. Auth::guard('mahasiswa')->user()->name;
        return view('mahasiswa.pages.profile.index',$data, compact('mahasiswas', 'prodi', 'kelas'));
    }

    public function updatedata(Request $request)
    {
        # Validation
        $request->validate([
            'tanggal_lahir' => 'required',
            'tanggal_lahir' => 'required',
        ]);


        // #Match The Old Password
        // if(!Hash::check($request->old_password, auth()->user()->password)){
        //     return back()->with("error", "Old Password Doesn't match!");
        // }

        // #Update the new Password
        // if($request->File('foto_profil')){
        //     $filename = $request->file->getClientOriginalName();
        //     $request->image->storeAs('images/profile/',$filename,'public');
        //     Auth()->guard('mahasiswa')->user()->update(['foto_profil'=>$filename]);
        // }

        if($request->file('foto_profil')) {
 
            $mahasiswa = Mahasiswa::find(Auth::id());
            $filename = $request->file('foto_profil')->getClientOriginalName();
            $request->foto_profil->storeAs('images/profile' ,$filename ,'public');
            $this->deleteOldImage(); 
            $mahasiswa->foto_profil = $filename;
            $mahasiswa->save();
        }
        
        Mahasiswa::whereId(auth()->guard('mahasiswa')->user()->id)->update([
            'agama' => $request->agama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir
        ]);

        return back()->with("status", "Password changed successfully!");
    }

    // public function updatesimple(Request $request)
    // {
    //     # Validation
    //     $request->validate([
    //         'prodi_id' => 'required',
    //         'kelas_id' => 'required',
    //     ]);
            

    //     #Update the new Password
    //     Mahasiswa::whereId(auth()->guard('mahasiswa')->user()->id)->update([
    //         'prodi_id' => $request->prodi_id,
    //         'kelas_id' => $request->kelas_id,
    //     ]);

    //     return back()->with("status", "Password changed successfully!");
    // }

    public function updateinfo(Request $request)
    {
        # Validation
        $request->validate([
            'nim' => 'required',
        ]);

        $mahasiswa = Mahasiswa::find(Auth::id());
        $mahasiswa->nim = $request->nim;
        $mahasiswa->save();

        $mahasiswa->kelas()->attach($request->kelas); 
        // $mahasiswa->kelas()->attach($request->kelas); 
        

        echo "Ubah Data Sukses";
        // return back()->with("status", "Password changed successfully!");
    }

    public function absenaction(Request $request)
    {
        # Validation
        $request->validate([
            'absen' => 'required',
            'bukti' => 'required',
        ]);
            
        $absen = new AbsenMahasiswa();
        if($request->file('bukti')) {
 
            $filename = $request->file('bukti')->getClientOriginalName();
            $request->bukti->storeAs('images/bukti-absen' ,$filename ,'public');
            $absen->bukti = $filename;
            $absen->save();
        }
        $absen->prodi_id            = Auth::guard('mahasiswa')->user()->prodi_id;
        $absen->kelas_id            = Auth::guard('mahasiswa')->user()->kelas_id;
        $absen->mahasiswa_id        = Auth::guard('mahasiswa')->user()->id;
        $absen->matakuliah_id       = $request->matakuliah_id;
        $absen->pertemuan           = $request->pertemuan;
        $absen->absen               = $request->absen;
        $absen->tanggal_perkuliahan = $request->tanggal_perkuliahan;
        $absen->waktu_absen         = $request->waktu_absen;
        $absen->save();



        return back()->with("status", "Password changed successfully!");
    }


    protected function deleteOldImage()
    {
      if (auth()->guard('mahasiswa')->user()->foto_profil){
        Storage::delete('/public/images/profile/'.auth()->guard('mahasiswa')->user()->foto_profil);
      }
     }
}
